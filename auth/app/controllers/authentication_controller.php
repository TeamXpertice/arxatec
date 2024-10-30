<?php
// Incluir el modelo
include 'app/models/authentication_model.php';

class AuthenticationController
{
    private $model;

    public function __construct($connection)
    {
        $this->model = new AuthenticationModel($connection);
    }

    // Método para manejar la solicitud de inicio de sesión
    public function handleLoginRequest()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Intentar iniciar sesión
            $loginSuccess = $this->login($email, $password);

            if (!$loginSuccess) {
                echo '<p style="color: red;">Correo electrónico o contraseña incorrectos.</p>';
            }
        }
    }

    public function login($email, $password)
    {
        session_start(); // Iniciar la sesión

        $user = $this->model->getUserByEmailAndPassword($email, $password);

        if ($user) {
            // Guardar la información del usuario en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_type'] = $user['tipo_usuario'];

            // Redirigir según el tipo de usuario
            switch ($user['tipo_usuario']) {
                case 'admin':
                    header("Location: ../projects/admin/");
                    exit();
                case 'abogado':
                    header("Location: ../projects/lawyer/");
                    exit();
                case 'cliente':
                    header("Location: ../projects/customer/");
                    exit();
            }
        } else {
            // Usuario no encontrado
            return false;
        }
    }
}
