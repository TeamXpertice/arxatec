<?php
include 'app/models/registration_model.php';

class RegistrationController
{
    private $model;

    public function __construct($connection)
    {
        $this->model = new RegistrationModel($connection);
    }

    // Método para manejar la solicitud de registro
    public function handleRegistrationRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['page']) && $_GET['page'] == 'register') {
            $data = [
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'correo_electronico' => $_POST['correo_electronico'],
                'contraseña' => $_POST['contraseña'],
                'tipo_usuario' => $_POST['tipo_usuario'],
                'dni' => $_POST['dni']
            ];

            // Intentar registrar usuario
            $message = $this->register($data);
            if ($message) {
                echo '<p style="color: red;">' . $message . '</p>';
            }
        }
    }

    public function register($data)
    {
        // Comprobar si el correo electrónico ya existe
        if ($this->model->checkEmailExists($data['correo_electronico'])) {
            return "El correo electrónico ya está en uso.";
        }

        // Registrar al usuario
        $registrationSuccess = $this->model->registerUser($data);

        if ($registrationSuccess) {
            // Iniciar sesión automáticamente
            $this->loginUser($data['correo_electronico']);

            // Redirigir a la página de clientes
            header("Location: ../projects/customer/");
            exit();
        } else {
            return "Ocurrió un error al registrar al usuario.";
        }
    }

    // Función para iniciar sesión automáticamente después del registro
    private function loginUser($email)
    {
        session_start();
        // Guardar los detalles mínimos del usuario en la sesión
        $_SESSION['user_email'] = $email;
        $_SESSION['logged_in'] = true;
        // Aquí podrías agregar más datos de usuario si es necesario
    }
}
