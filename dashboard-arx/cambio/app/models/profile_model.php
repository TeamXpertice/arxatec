<?php
require_once '../config/connect.php';
require_once('../../../../auth/php/security.php');

class Profile
{
    private $connection;

    public function __construct()
    {
        $this->connection = $GLOBALS['connection'];
    }

    public function getUserById($id)
    {
        $id = intval($id); // Sanitiza la entrada
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = mysqli_fetch_assoc(mysqli_query($this->connection, $query));
        return $result;
    }

    public function changePassword($id, $newPassword)
    {
        $query = "UPDATE usuarios SET password = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("si", $newPassword, $id);
        return $stmt->execute();
    }

    // Método para actualizar la información de contacto
    public function updateContactInfo($userId, $address, $phoneNumber, $additionalPhone)
    {
        $query = "UPDATE usuarios SET address = ?, phone_number = ?, additional_phone = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sssi", $address, $phoneNumber, $additionalPhone, $userId);
        return $stmt->execute();
    }

    // Método para actualizar la información adicional (género)
    public function updateAdditionalInfo($userId, $gender)
    {
        $query = "UPDATE usuarios SET gender = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("si", $gender, $userId);
        return $stmt->execute();
    }

    public function updateUserProfileImage($userId, $imagePath)
    {
        $query = "UPDATE usuarios SET profile_image = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("si", $imagePath, $userId);
        return $stmt->execute();
    }

    // Otros métodos relacionados con usuarios
}
