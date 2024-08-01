<?php
// LOGIN
// include ('seguridad.php');

include('security.php');

// Hacemos la conexion con la bd local
$connection = mysqli_connect("localhost","root","","arxatec");

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' ";
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == "admin")
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else if($usertypes['usertype'] == "user")
    {
        $_SESSION['username'] = $email_login;
        header('Location: ../user/index.php');
    }
    else    
    {
        $_SESSION['status'] = 'Correo y contraseña invalidos';
        header('Location: login.php');
    }
}


?>
