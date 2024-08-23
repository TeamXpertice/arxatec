<?php
require_once '../../../shared/config/connect.php';
require_once('../../../../auth/php/security.php');

class CaseModel
{
    private $connection;

    public function __construct()
    {
        global $connection;
        $this->connection = $connection;
    }

    public function fetch_all_cases()
    {
        $query = "SELECT * FROM cases";
        $result = $this->connection->query($query);

        if ($result === false) {
            // Manejo de errores de consulta
            error_log("Error en la consulta: " . $this->connection->error);
            return [];
        }

        $cases = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cases[] = $row;
            }
        }

        return $cases;
    }

    public function insert_case($case_name, $expediente_number, $description, $status, $client_dni, $lawyer_dni)
    {
        $stmt = $this->connection->prepare("INSERT INTO cases (case_name, expediente_number, description, status, client_dni, lawyer_dni) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            // Manejo de errores de preparación
            error_log("Error en la preparación de la consulta: " . $this->connection->error);
            return false;
        }

        $stmt->bind_param("ssssss", $case_name, $expediente_number, $description, $status, $client_dni, $lawyer_dni);
        $success = $stmt->execute();
        if (!$success) {
            // Manejo de errores de ejecución
            error_log("Error en la ejecución de la consulta: " . $stmt->error);
        }

        return $success;
    }

    public function fetch_case_by_id($id)
    {
        $stmt = $this->connection->prepare("
            SELECT cases.*, 
                   client.username AS client_name, 
                   lawyer.username AS lawyer_name 
            FROM cases
            LEFT JOIN usuarios AS client ON cases.client_dni = client.dni
            LEFT JOIN usuarios AS lawyer ON cases.lawyer_dni = lawyer.dni
            WHERE cases.id = ?
        ");
        if ($stmt === false) {
            // Manejo de errores de preparación
            error_log("Error en la preparación de la consulta: " . $this->connection->error);
            return null;
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            // Manejo de errores de resultado
            error_log("Error al obtener el resultado: " . $this->connection->error);
            return null;
        }

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function update_case($id, $case_name, $status)
    {
        $stmt = $this->connection->prepare("UPDATE cases SET case_name = ?, status = ? WHERE id = ?");
        if ($stmt === false) {
            // Manejo de errores de preparación
            error_log("Error en la preparación de la consulta: " . $this->connection->error);
            return false;
        }

        $stmt->bind_param("ssi", $case_name, $status, $id);
        $success = $stmt->execute();
        if (!$success) {
            // Manejo de errores de ejecución
            error_log("Error en la ejecución de la consulta: " . $stmt->error);
        }

        return $success;
    }
}
