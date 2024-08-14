<?php
require_once '../models/user.php';
require_once('../../../../auth/php/security.php');

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // Obtener todos los usuarios
    public function getAllUsers()
    {
        return $this->userModel->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->userModel->getUserById($id);
    }

    // Agregar un nuevo usuario
    public function addUser($data)
    {
        // Validar que las contraseñas coincidan
        if ($data['password'] !== $data['confirm_password']) {
            echo "Las contraseñas no coinciden.";
            exit();
        }

        // Eliminar el campo de confirmación de contraseña
        unset($data['confirm_password']);

        // Copiar la imagen por defecto con el nombre del DNI
        $defaultImagePath = '../../uploads/profile_images/default.png';
        $newFileName = $data['dni'] . '.png';
        $dest_path = '../../uploads/profile_images/' . $newFileName;
        if (!copy($defaultImagePath, $dest_path)) {
            echo "Error al copiar la imagen por defecto.";
            exit();
        }

        $data['profile_image'] = $dest_path; // Guardar la ruta completa en la base de datos

        // Agregar el usuario
        $result = $this->userModel->addUser($data);
        if ($result) {
            header("Location: ../views/user_management.php");
            exit();
        } else {
            echo "Error al agregar el usuario.";
        }
    }

    // Actualizar un usuario
    public function updateUser($id, $data)
    {
        // Obtener la información actual del usuario
        $currentUser = $this->getUserById($id);

        // Verificar si el DNI ha cambiado
        if ($data['dni'] !== $currentUser['dni']) {
            // Eliminar la imagen antigua si no es la predeterminada
            $oldImagePath = $currentUser['profile_image'];
            if (file_exists($oldImagePath) && $oldImagePath !== '../../uploads/profile_images/default.png') {
                unlink($oldImagePath);
            }

            // Copiar la imagen nueva con el nuevo DNI
            $defaultImagePath = '../../uploads/profile_images/default.png';
            $newFileName = $data['dni'] . '.png';
            $dest_path = '../../uploads/profile_images/' . $newFileName;
            if (!copy($defaultImagePath, $dest_path)) {
                echo "Error al copiar la imagen por defecto.";
                exit();
            }
            $data['profile_image'] = $dest_path; // Guardar la ruta completa en la base de datos
        } else {
            // Mantener la imagen existente si el DNI no cambia
            $data['profile_image'] = $currentUser['profile_image'];
        }

        // Actualizar el usuario
        $result = $this->userModel->updateUser($id, $data);
        if ($result) {
            header("Location: ../views/user_management.php");
            exit();
        } else {
            echo "Error al actualizar el usuario.";
        }
    }

    public function deleteUser($id)
    {
        // Obtener la ruta de la imagen del usuario antes de eliminarlo
        $user = $this->getUserById($id);
        $profileImagePath = $user['profile_image'];

        // Eliminar el usuario
        $result = $this->userModel->deleteUser($id);
        if ($result) {
            // Eliminar la imagen del perfil del usuario
            if (file_exists($profileImagePath) && $profileImagePath !== '../../uploads/profile_images/default.png') {
                unlink($profileImagePath);
            }
            header("Location: ../views/user_management.php");
            exit();
        } else {
            echo "Error al eliminar el usuario.";
        }
    }

    public function changePassword($id, $currentPassword, $newPassword, $confirmPassword)
    {
        // Obtener la información actual del usuario
        $user = $this->getUserById($id);

        // Verificar la contraseña actual
        if ($currentPassword !== $user['password']) {
            $_SESSION['message'] = "La contraseña actual es incorrecta.";
            header("Location: ../views/profile.php");
            exit();
        }

        // Verificar que las nuevas contraseñas coincidan
        if ($newPassword !== $confirmPassword) {
            $_SESSION['message'] = "Las nuevas contraseñas no coinciden.";
            header("Location: ../views/profile.php");
            exit();
        }

        // Actualizar la contraseña
        $result = $this->userModel->changePassword($id, $newPassword);

        if ($result) {
            $_SESSION['message'] = "Contraseña actualizada correctamente.";
        } else {
            $_SESSION['message'] = "Error al actualizar la contraseña.";
        }

        header("Location: ../views/profile.php");
        exit();
    }
    // Método para actualizar la información de contacto
    public function updateContactInfo($userId, $address, $phoneNumber, $additionalPhone)
    {
        return $this->userModel->updateContactInfo($userId, $address, $phoneNumber, $additionalPhone);
    }

    // Método para actualizar la información adicional (género)
    public function updateAdditionalInfo($userId, $gender)
    {
        return $this->userModel->updateAdditionalInfo($userId, $gender);
    }
}

// Ejemplo de cómo llamar a las funciones en otro lugar de tu código:
// Creas una instancia del controlador y llamas directamente a la función que necesites.

$controller = new UserController();

if (isset($_POST['add_user'])) {
    $data = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'confirm_password' => $_POST['confirm_password'],
        'dni' => $_POST['dni'],
        'address' => $_POST['address'],
        'phone_number' => $_POST['phone_number'],
        'additional_phone' => $_POST['additional_phone'],
        'date_of_birth' => $_POST['date_of_birth'],
        'usertype' => $_POST['usertype'],
        'gender' => isset($_POST['gender']) ? $_POST['gender'] : 'Ninguno'
    ];
    $controller->addUser($data);
}

if (isset($_POST['update_user'])) {
    $id = intval($_POST['id']);
    $data = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'dni' => $_POST['dni'],
        'address' => $_POST['address'],
        'phone_number' => $_POST['phone_number'],
        'additional_phone' => $_POST['additional_phone'],
        'usertype' => $_POST['usertype']
    ];
    $controller->updateUser($id, $data);
}

if (isset($_POST['delete_btn'])) {
    $id = intval($_POST['delete_id']);
    $controller->deleteUser($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $userId = $_POST['user_id'];

    $userController = new UserController();

    if (isset($_POST['change_password'])) {
        $id = $_SESSION['id']; // Obtener el ID del usuario desde la sesión
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $controller->changePassword($id, $currentPassword, $newPassword, $confirmPassword);
    }

    if ($action == 'updateContactInfo') {
        $address = $_POST['address'];
        $phoneNumber = $_POST['phone_number'];
        $additionalPhone = $_POST['additional_phone'];

        if ($userController->updateContactInfo($userId, $address, $phoneNumber, $additionalPhone)) {
            $_SESSION['message'] = 'Información de contacto actualizada con éxito.';
        } else {
            $_SESSION['message'] = 'Error al actualizar la información de contacto.';
        }
        header('Location: ../views/profile.php');
    }

    if ($action == 'updateAdditionalInfo') {
        $gender = $_POST['gender'];

        if ($userController->updateAdditionalInfo($userId, $gender)) {
            $_SESSION['message'] = 'Información adicional actualizada con éxito.';
        } else {
            $_SESSION['message'] = 'Error al actualizar la información adicional.';
        }
        header('Location: ../views/profile.php');
    }
}
