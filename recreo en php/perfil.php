<?php
session_start();

// Si no hay sesión iniciada, redirigir al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$nombre_usuario = $_SESSION['usuario'];
$nombre_completo = $_SESSION['nombre']; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECREO - Panel de Administración</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div id="menu">
            <p><strong>MENÚ DE ADMINISTRACIÓN</strong></p>
        </div>
    </header>

    <section id="contenedor2">
        <!-- Columna Izquierda -->
        <div class="alineacion" id="lado1">
            <p>Administrador</p>
            <img src="Imagenes/administrador.PNG" width="130px" alt="Icono Administrador">
            <p>Bienvenido, <strong><?php echo htmlspecialchars($nombre_completo); ?></strong></p>
            <p><a href="logout.php" style="color: white; text-decoration:none;" id="logeo">Cerrar sesión</a></p>
        </div>

        <!-- Columna Central: Opciones -->
        <div class="alineacion2" id="central">
            <div class="organizacion">
                <a href="#"><button class="submenu"><img src="Imagenes/student (1).svg" alt="Registrar Docente" width="100px"></button></a>
                <p><strong>Registrar Docente</strong></p>
            </div>
            <div class="organizacion">
                <a href="#"><button class="submenu"><img src="Imagenes/database.svg" alt="Base de datos" width="100px"></button></a>
                <p><strong>Base de datos</strong></p>
            </div>
            <div class="organizacion">
                <a href="#"><button class="submenu"><img src="Imagenes/note-pencil.svg" alt="Registrar Faltas" width="100px"></button></a>
                <p><strong>Registrar faltas</strong></p>
            </div>
            <div class="organizacion">
                <a href="#"><button class="submenu"><img src="Imagenes/file-magnifying-glass.svg" alt="Consultar Faltas" width="100px"></button></a>
                <p><strong>Consultar faltas</strong></p>
            </div>
            <div class="organizacion">
                <a href="#"><button class="submenu"><img src="Imagenes/printer.svg" alt="Imprimir Faltas" width="100px"></button></a>
                <p><strong>Imprimir consolidados</strong></p>
            </div>
            <div class="organizacion">
                <a href="#"><button class="submenu"><img src="Imagenes/user-switch.svg" alt="Gestionar Usuarios" width="100px"></button></a>
                <p><strong>Gestionar usuarios</strong></p>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="alineacion" id="lado2">
            <img src="Imagenes/Imagen final.PNG" width="150px" alt="Logo RECREO">
        </div>
    </section>

    <footer>
        <p>B.O. Soluciones en Software Educativo</p>
    </footer>

</body>
</html>
