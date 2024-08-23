<?php

session_start();

if (isset($_POST['logout_btn'])) {
    // Eliminar todas las variables de sesión
    $_SESSION = array();

    // Eliminar la cookie de sesión si existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destruir la sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión
    header('Location: ../views/login.php');
    exit(); // Asegúrate de que no se ejecute ningún código adicional después de la redirección
}