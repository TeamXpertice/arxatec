<?php
session_start();

include "conexion_be.php";

$correo_electronico = $_POST["correo_electronico"];
$contraseña = $_POST["contraseña"];
$contraseña_encriptada = hash("sha512", $contraseña);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios_arxatec WHERE correo_electronico = '$correo_electronico' AND contraseña = '$contraseña_encriptada'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $correo_electronico;
    header("location: ../bienvenido.php");
    exit;
} else {
    echo "
        <script>
            alert('Usuario no existente, por favor verifique los datos introducidos');
            window.location = '../index.php';
        </script>
    ";
    exit;
}
?>
