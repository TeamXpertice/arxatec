<?php
session_start();

// Hacemos la conexion con la bd local
$connection = mysqli_connect("localhost", "root", "", "arxatec");

if (isset($_POST['login_btn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($connection, $query);
    $user = mysqli_fetch_array($query_run);

    if ($user) {
        $_SESSION['username'] = $user['username']; // Almacenar el nombre de usuario
        $_SESSION['usertype'] = $user['usertype'];

        if ($user['usertype'] == "admin") {
            header('Location: ../dashboard-arx/admin/index.php');
        } else if ($user['usertype'] == "user") {
            header('Location: ../dashboard-arx/user/index.php');
        }
    } else {
        $_SESSION['status'] = 'Correo y contraseña invalidos';
        header('Location: login.php');
    }
}
