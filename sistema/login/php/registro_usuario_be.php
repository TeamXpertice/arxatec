<?php
include "conexion_be.php";

$nombre_de_usuario = $_POST["nombre_de_usuario"];
$correo_electronico = $_POST["correo_electronico"];
$contraseña = $_POST["contraseña"];

// Encriptamiento de contraseña
$contraseña_encriptada = hash("sha512", $contraseña);

// Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios_arxatec WHERE correo_electronico = '$correo_electronico'");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo "
    <script>
        alert('Este correo ya está registrado, intenta con otro diferente');
        window.location='../index.php';
    </script>
    ";
    exit();
}

// Verificar que el nombre de usuario no se repita en la base de datos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios_arxatec WHERE nombre_de_usuario = '$nombre_de_usuario'");

if (mysqli_num_rows($verificar_usuario) > 0) {
    echo "
    <script>
        alert('Este usuario ya está registrado, intenta con otro diferente');
        window.location='../index.php';
    </script>
    ";
    exit();
}

// Insertar usuario en la base de datos
$query = "INSERT INTO usuarios_arxatec(nombre_de_usuario, correo_electronico, contraseña) VALUES('$nombre_de_usuario', '$correo_electronico', '$contraseña_encriptada')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo "
        <script>
            alert('Usuario almacenado exitosamente');
            window.location='../index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Inténtalo nuevamente, usuario no almacenado');
            window.location='../index.php';
        </script>
    ";
}

mysqli_close($conexion);
?>
