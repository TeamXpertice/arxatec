<?php
session_start();

if (!isset($_SESSION['id'])) {
    // No está autenticado, redirigir al login
    header('Location: ../../../../auth/views/login.php');
    exit();
}

// Opcional: Verifica el rol del usuario si es necesario
if ($_SESSION['usertype'] != 'admin') {
    // Si el usuario no es admin, redirigir a una página de error o acceso denegado
    header('Location: ../../../../auth/views/access_denied.php');
    exit();
}
