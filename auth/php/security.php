<?php
session_start();

if (!isset($_SESSION['id'])) {
    // No está autenticado, redirigir al login
    header('Location: ../../../../auth/views/login.php');
    exit();
}
