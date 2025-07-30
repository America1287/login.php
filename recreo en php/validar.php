<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "Tomas.010716", "colegio");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Consulta SQL para buscar el usuario
$sql = "SELECT * FROM usuario WHERE nombre_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $fila = $resultado->fetch_assoc();
    $hash_guardado = $fila['contraseña'];

    // Verificar contraseña
    if (password_verify($clave, $hash_guardado)) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $fila['nombre_usuario'];
        header("Location: perfil.php");
        exit();
    } else {
        echo "<script>alert('Contraseña incorrecta'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Usuario no encontrado'); window.location.href='login.php';</script>";
}

$stmt->close();
$conexion->close();
?>
