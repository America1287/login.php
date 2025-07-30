<?php
$host = "localhost";
$user = "root";
$password = "Tomas.010716";
$database = "colegio";

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>