<?php
require_once '../config/connect.php';
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

        $cases = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cases[] = $row;
            }
        }

        return $cases;
    }

    public function insert_case($case_name, $status, $client_dni, $lawyer_dni)
    {
        $stmt = $this->connection->prepare("INSERT INTO cases (case_name, status, client_dni, lawyer_dni) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $case_name, $status, $client_dni, $lawyer_dni);

        return $stmt->execute();
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
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function update_case($id, $case_name, $status)
    {
        $stmt = $this->connection->prepare("UPDATE cases SET case_name = ?, status = ? WHERE id = ?");
        $stmt->bind_param("ssi", $case_name, $status, $id);
        return $stmt->execute();
    }
}
