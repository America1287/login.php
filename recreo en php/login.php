<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECREO - Ingreso</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <h1 class="encabezado"><strong>Registro Estudiantil de Convivencia, Retardos y Observaciones (RECREO)</strong></h1>
    </header>

    <!-- Formulario de login -->
    <form class="login" id="content" action="validar.php" method="post">
        <img src="Imagenes/Imagen final.PNG" alt="Escudo del colegio" width="120px"><br>

        <!-- Usuario -->
        <img src="Imagenes/usuario1.PNG" alt="Icono usuario" width="50px" id="icon1">
        <input type="text" name="usuario" required><br>
        <label><strong>Usuario</strong></label><br>

        <!-- Contraseña -->
        <img src="Imagenes/contrasena.PNG" alt="Icono contraseña" width="30px" id="icon2">
        <input type="password" name="clave" required><br>
        <label><strong>Contraseña</strong></label><br>

        <!-- Botón de envío -->
        <input type="submit" value="Iniciar Sesión" id="logeo">

        <article><a href="registro.php" style="color:black;">Registrarse</a></article> 
          
    </form>

    <footer>
        <p>B.O. Soluciones en Software Educativo</p>
    </footer>

</body>
</html>
