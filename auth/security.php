<?php
session_start();

if (!isset($_SESSION['username'])) {
    // No está autenticado, redirigir al login
    header('Location: ../../../../auth/login.php');
    exit();
}
