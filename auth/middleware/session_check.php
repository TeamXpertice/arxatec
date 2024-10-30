<?php
session_start(); // Iniciar la sesión

// Desactivar caché de navegador
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al formulario de inicio de sesión si no está autenticado
    header("Location: ../../auth/");
    exit();
}
