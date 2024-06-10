<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "login_register";

// Crear la conexión
$conexion = new mysqli($host, $user, $password, $dbname);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Configurar la codificación de caracteres
if (!$conexion->set_charset("utf8")) {
    die("Error al cargar el conjunto de caracteres utf8: " . $conexion->error);
}
?>
