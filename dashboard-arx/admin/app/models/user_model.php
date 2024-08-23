<?php
require_once '../../../shared/config/connect.php';
require_once('../../../../auth/php/security.php');

class User
{
    private $connection;

    public function __construct()
    {
        $this->connection = $GLOBALS['connection'];
    }

    // Obtener todos los usuarios
    public function getAllUsers()
    {
        $query = "SELECT * FROM usuarios";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    public function getUserById($id)
    {
        $id = intval($id); // Sanitiza la entrada
        $query = "SELECT * FROM usuarios WHERE id = $id";
        $result = mysqli_fetch_assoc(mysqli_query($this->connection, $query));
        return $result;
    }

    // Agregar un nuevo usuario
    public function addUser($data)
    {
        $query = "INSERT INTO usuarios (username, email, password, usertype, dni, address, phone_number, additional_phone, date_of_birth, profile_image, gender, status) 
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'activo')";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("sssssssssss", $data['username'], $data['email'], $data['password'], $data['usertype'], $data['dni'], $data['address'], $data['phone_number'], $data['additional_phone'], $data['date_of_birth'], $data['profile_image'], $data['gender']);
        return $stmt->execute();
    }

    // Actualizar un usuario
    public function updateUser($id, $data)
    {
        $query = "UPDATE usuarios SET username = ?, email = ?, dni = ?, address = ?, phone_number = ?, additional_phone = ?, usertype = ?, profile_image = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssssssssi", $data['username'], $data['email'], $data['dni'], $data['address'], $data['phone_number'], $data['additional_phone'], $data['usertype'], $data['profile_image'], $id);
        return $stmt->execute();
    }

    public function deleteUser($id)
    {
        $id = intval($id); // Sanitiza la entrada
        $query = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Otros métodos relacionados con usuarios
}
