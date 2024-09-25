<?php
session_start();

include_once('../../database/connection/connect.php');

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['id'])) {
    // Redirigir al dashboard según el tipo de usuario si ya está autenticado
    $usertype = $_SESSION['usertype'];
    if ($usertype == 'admin') {
        header('Location: ../../projects/admin/index.php');
    } else if ($usertype == 'cliente') {
        header('Location: ../../projects/customer/index.php');
    } else if ($usertype == 'abogado') {
        header('Location: ../../projects/lawyer/index.php');
    }
    exit();
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
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if ($user['status'] == 'activo') {
            $_SESSION['id'] = $user['id'];
            $_SESSION['dni'] = $user['dni'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['usertype'] = $user['usertype'];
            $_SESSION['profile_image'] = $user['profile_image'];
    
            if ($user['usertype'] == 'admin') {
                header('Location: ../../projects/admin/index.php');
            } else if ($user['usertype'] == 'cliente') {
                header('Location: ../../projects/customer/index.php');
            } else if ($user['usertype'] == 'abogado') {
                header('Location: ../../projects/lawyer/index.php');
            }
            exit();
        } else if ($user['status'] == 'suspendido') {
            header('Location: ../views/suspended.php');
            exit();
        }
    } else {
        $_SESSION['login_error'] = 'Correo o contraseña incorrectos';
        header('Location: ../views/login.php');
        exit();
    }
    
    
}
