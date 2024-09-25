<?php
session_start();
include_once('../../database/connection/connect.php');

// Verifica si la conexión fue exitosa
if (!$connection) {
    die("Error en la conexión: " . mysqli_connect_error());
}

if (isset($_POST['register_btn'])) {
    // Captura los datos ingresados y asegura que no haya inyección SQL
    $username = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']); // Contraseña sin encriptar
    $confirm_password = mysqli_real_escape_string($connection, $_POST['confirm_password']);
    $dni = mysqli_real_escape_string($connection, $_POST['dni']);
    $plan_id = 1; // Plan predeterminado (Free)

    // Guardar datos en sesión en caso de error
    $_SESSION['register_data'] = [
        'name' => $username,
        'email' => $email,
        'dni' => $dni
    ];

    // Verificar si las contraseñas coinciden
    if ($password !== $confirm_password) {
        $_SESSION['status'] = [
            'type' => 'error',
            'message' => 'Las contraseñas no coinciden'
        ];
        header("Location: ../views/register.php");
        exit();
    }

    // Verificar si el correo ya está registrado
    $check_email_query = "SELECT email FROM usuarios WHERE email='$email' LIMIT 1";
    $check_email_result = mysqli_query($connection, $check_email_query);

    // Verificar si el DNI ya está registrado
    $check_dni_query = "SELECT dni FROM usuarios WHERE dni='$dni' LIMIT 1";
    $check_dni_result = mysqli_query($connection, $check_dni_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $_SESSION['status'] = [
            'type' => 'error',
            'message' => 'El correo ya está registrado'
        ];
        header("Location: ../views/register.php");
    } elseif (mysqli_num_rows($check_dni_result) > 0) {
        $_SESSION['status'] = [
            'type' => 'error',
            'message' => 'El DNI ya está registrado'
        ];
        header("Location: ../views/register.php");
    } else {
        // Ruta de la imagen predeterminada en el servidor
        $default_image_path = "../../projects/shared/uploads/profile_images/default.png";

        // Nueva ruta para copiar la imagen dentro del servidor (basada en el DNI del usuario)
        $new_image_name = $dni . ".png";
        $new_image_path = "../../projects/shared/uploads/profile_images/" . $new_image_name;

        // Ruta relativa para guardar en la base de datos
        $db_image_path = "../../../shared/uploads/profile_images/" . $new_image_name;

        // Intentar copiar la imagen predeterminada con el nuevo nombre
        if (!copy($default_image_path, $new_image_path)) {
            // Si la copia falla, muestra el error
            echo "Error al copiar la imagen de perfil. Verifica la ruta o permisos. Ruta: " . realpath($default_image_path);
            exit();
        }

        // Insertar el nuevo usuario en la tabla usuarios con la nueva imagen de perfil
        $insert_user_query = "INSERT INTO usuarios (username, email, password, dni, usertype, profile_image, plan_id) 
                              VALUES ('$username', '$email', '$password', '$dni', 'cliente', '$db_image_path', '$plan_id')";

        if (mysqli_query($connection, $insert_user_query)) {
            // Obtener datos del plan Free
            $plan_query = "SELECT consultas, asesorias, procedimientos FROM planes WHERE id='$plan_id' LIMIT 1";
            $plan_result = mysqli_query($connection, $plan_query);
            $plan_data = mysqli_fetch_assoc($plan_result);

            // Insertar en la tabla clientes_servicios  
            $insert_client_service_query = "INSERT INTO clientes_servicios (dni, consultas_disponibles, asesorias_disponibles, procedimientos_disponibles) 
                                            VALUES ('$dni', {$plan_data['consultas']}, {$plan_data['asesorias']}, {$plan_data['procedimientos']})";
            mysqli_query($connection, $insert_client_service_query);

            // Registro exitoso, limpiar datos de registro
            unset($_SESSION['register_data']);  // Limpiar los datos de registro
            $_SESSION['status'] = [
                'type' => 'success',
                'message' => 'Bienvenido a ArxaTEC. Por favor, ingresa tus credenciales en el login para ingresar'
            ];
            header("Location: ../views/register.php?status=success");  // Redirige de nuevo al formulario de registro pero con el estado de éxito
            exit();
        } else {
            $_SESSION['status'] = [
                'type' => 'error',
                'message' => 'Error al registrar el usuario. Intenta de nuevo'
            ];
            header("Location: ../views/register.php");
        }
    }
} else {
    $_SESSION['status'] = [
        'type' => 'error',
        'message' => 'Acceso no autorizado'
    ];
    header("Location: ../views/register.php");
}
