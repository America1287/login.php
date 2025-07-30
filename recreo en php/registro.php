<?php
// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Validación simple
    if (empty($usuario) || empty($correo) || empty($clave)) {
        $mensaje = "⚠️ Por favor complete todos los campos.";
    } else {
        // Cifrar la contraseña
        $clave_cifrada = password_hash($clave, PASSWORD_DEFAULT);

        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "Tomas.010716", "colegio");

        if ($conexion->connect_error) {
            die("❌ Error de conexión: " . $conexion->connect_error);
        }

        // Insertar nuevo usuario con consulta preparada
        $sql = "INSERT INTO usuario (nombre_usuario, correo, contraseña) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $usuario, $correo, $clave_cifrada);

        if ($stmt->execute()) {
            $mensaje = "✅ Usuario registrado correctamente.";
        } else {
            if ($conexion->errno === 1062) {
                $mensaje = "⚠️ El nombre de usuario ya existe.";
            } else {
                $mensaje = "❌ Error al registrar usuario: " . $conexion->error;
            }
        }

        $stmt->close();
        $conexion->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="login" id="content2" method="POST" action="registro.php">
        <h2>Registrar Nuevo Usuario</h2>
        <img src="Imagenes/Imagen final.PNG" alt="Escudo del colegio" width="100px"><br>

        <img src="Imagenes/usuario1.PNG" alt="Icono usuario" width="50px" id="icon1">
        <input type="text" name="usuario" placeholder="Nombre de usuario" required><br>

        <img src="Imagenes/envelope.svg" alt="Icono correo" width="30px" id="icon3">
        <input type="email" name="correo" placeholder="Correo electrónico" required><br>

        <img src="Imagenes/contrasena.PNG" alt="Icono contraseña" width="30px" id="icon2">
        <input type="password" name="clave" placeholder="Contraseña" required><br><br>

        <input type="submit" value="Registrar" id="logeo2">
        <a href="login.php" style="color:black; text-decoration:none;">← Volver al inicio de sesión</a><br>

        <?php if (isset($mensaje)) echo "<p><strong>$mensaje</strong></p>"; ?>
    </form>
</body>
<footer>
        <p>B.O. Soluciones en Software Educativo</p>
</footer>
</html>
