<?php
session_start();

// Hacemos la conexión con la base de datos local
$connection = mysqli_connect("localhost", "root", "", "arxatec");

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['id'])) {
    // Redirigir al dashboard si el usuario ya está autenticado
    $usertype = $_SESSION['usertype']; // Obtener el tipo de usuario
    if ($usertype == 'admin') {
        header('Location: ../../dashboard-arx/admin/index.php');
    } else if ($usertype == 'user') {
        header('Location: ../../dashboard-arx/user/index.php');
    }
    exit(); // Asegúrate de que no se ejecute ningún código adicional después de la redirección
}

// Procesar el formulario de inicio de sesión
if (isset($_POST['login_btn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    // Validar que los campos no estén vacíos
    if (empty($email_login) || empty($password_login)) {
        $_SESSION['status'] = 'Por favor, complete todos los campos.';
        header('Location: ../views/login.php');
        exit();
    }

    // Preparar la consulta para evitar SQL Injection
    $query = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($connection, $query);

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        $_SESSION['status'] = 'Error en el servidor. Inténtelo de nuevo más tarde.';
        header('Location: ../views/login.php');
        exit();
    }

    // Asociar parámetros y ejecutar la consulta
    mysqli_stmt_bind_param($stmt, "ss", $email_login, $password_login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC); // Usar MYSQLI_ASSOC para obtener un array asociativo

    if ($user) {
        // Almacenar datos del usuario en la sesión
        $_SESSION['id'] = $user['id'];
        $_SESSION['dni'] = $user['dni'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['usertype'] = $user['usertype'];
        $_SESSION['profile_image'] = $user['profile_image'];

        // Redirigir según el tipo de usuario
        if ($user['usertype'] == 'admin') {
            header('Location: ../../dashboard-arx/admin/index.php');
        } else if ($user['usertype'] == 'user') {
            header('Location: ../../dashboard-arx/user/index.php');
        }
        exit(); // Asegúrate de que no se ejecute ningún código adicional después de la redirección
    } else {
        $_SESSION['status'] = 'Correo y contraseña inválidos';
        header('Location: ../views/login.php');
        exit();
    }
}
