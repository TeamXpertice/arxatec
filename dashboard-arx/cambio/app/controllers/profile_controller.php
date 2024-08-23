<?php
require_once '../models/profile_model.php';
require_once('../../../../auth/php/security.php');

class ProfileController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new Profile();
    }

    public function getUserById($id)
    {
        return $this->userModel->getUserById($id);
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

    public function updateContactInfo($userId, $address, $phoneNumber, $additionalPhone)
    {
        return $this->userModel->updateContactInfo($userId, $address, $phoneNumber, $additionalPhone);
    }

    public function updateAdditionalInfo($userId, $gender)
    {
        return $this->userModel->updateAdditionalInfo($userId, $gender);
    }

    public function updateProfileImage($userId, $file)
    {
        // Verificar si se ha subido un archivo
        if ($file['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $file['tmp_name'];
            $fileName = $file['name'];
            $fileSize = $file['size'];
            $fileType = $file['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Validar extensión y tamaño de archivo
            $allowedExts = array('jpg', 'jpeg', 'png');
            $maxFileSize = 5 * 1024 * 1024; // 5 MB

            if (in_array($fileExtension, $allowedExts) && $fileSize <= $maxFileSize) {
                // Obtener el usuario actual
                $user = $this->getUserById($userId);
                $oldImagePath = $user['profile_image'];
                $dni = $user['dni']; // Suponiendo que 'dni' es el campo del DNI

                // Obtener el nuevo nombre de archivo
                $newFileName = $dni . '.' . $fileExtension;
                $destPath = '../../uploads/profile_images/' . $newFileName;

                // Eliminar la imagen antigua si no es la predeterminada
                if (file_exists($oldImagePath) && $oldImagePath !== '../../uploads/profile_images/default.png') {
                    unlink($oldImagePath);
                }

                // Mover el archivo subido
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    // Actualizar la base de datos
                    $result = $this->userModel->updateUserProfileImage($userId, $destPath);
                    if ($result) {
                        $_SESSION['message'] = 'Imagen de perfil actualizada con éxito.';
                    } else {
                        $_SESSION['message'] = 'Error al actualizar la imagen de perfil en la base de datos.';
                    }
                } else {
                    $_SESSION['message'] = 'Error al mover el archivo.';
                }
            } else {
                $_SESSION['message'] = 'Tipo de archivo no permitido o tamaño de archivo excedido.';
            }
        } else {
            $_SESSION['message'] = 'Error al subir el archivo.';
        }

        header('Location: ../views/profile.php');
        exit();
    }
}


// Ejemplo de cómo llamar a las funciones en otro lugar de tu código:
// Creas una instancia del controlador y llamas directamente a la función que necesites.

$controller = new ProfileController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $userId = intval($_POST['user_id']);

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

        if ($controller->updateContactInfo($userId, $address, $phoneNumber, $additionalPhone)) {
            $_SESSION['message'] = 'Información de contacto actualizada con éxito.';
        } else {
            $_SESSION['message'] = 'Error al actualizar la información de contacto.';
        }
        header('Location: ../views/profile.php');
    }

    if ($action == 'updateAdditionalInfo') {
        $gender = $_POST['gender'];

        if ($controller->updateAdditionalInfo($userId, $gender)) {
            $_SESSION['message'] = 'Información adicional actualizada con éxito.';
        } else {
            $_SESSION['message'] = 'Error al actualizar la información adicional.';
        }
        header('Location: ../views/profile.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $userId = intval($_POST['user_id']);

    if ($action == 'updateProfileImage') {
        $file = $_FILES['profile_image'];
        $controller->updateProfileImage($userId, $file);
    }
}
