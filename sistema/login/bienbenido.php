<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo "
        <script>
            alert('Por favor debes iniciar sesión');
            window.location = '../index.php';
        </script>
    ";
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido!</title>
    <link rel="stylesheet" href="../web/css/style.css"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>
