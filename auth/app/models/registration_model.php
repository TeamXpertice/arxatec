<?php

class RegistrationModel
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function registerUser($data)
    {
        // Forzar el tipo de usuario a "cliente"
        $data['tipo_usuario'] = 'cliente';

        $sql = "INSERT INTO usuarios (nombres, apellidos, correo_electronico, contraseña, tipo_usuario, dni, estado) 
                VALUES (?, ?, ?, ?, ?, ?, 'activo')";
        $stmt = $this->connection->prepare($sql);

        // Sin encriptar la contraseña
        $stmt->bind_param(
            "ssssss",
            $data['nombres'],
            $data['apellidos'],
            $data['correo_electronico'],
            $data['contraseña'],
            $data['tipo_usuario'],
            $data['dni']
        );

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    public function checkEmailExists($email)
    {
        $sql = "SELECT * FROM usuarios WHERE correo_electronico = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows > 0;
    }
}
