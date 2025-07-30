<?php
session_start();

// Desactivar todas las variables de sesión
$_SESSION = [];

// Eliminar la cookie de sesión, si existe
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();

// Evitar caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Redirigir al login
header("Location: login.php");
exit();
?>
