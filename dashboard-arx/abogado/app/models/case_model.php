<?php
class CaseModel
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getCasesByLawyerDni($dni)
    {
        $query = "SELECT c.id, c.case_name, c.status, c.creation_date, c.updated_at, 
                         u1.username AS client_name, u1.dni AS client_dni, 
                         u2.username AS lawyer_name, u2.dni AS lawyer_dni
                  FROM cases c
                  JOIN usuarios u1 ON c.client_dni = u1.dni
                  LEFT JOIN usuarios u2 ON c.lawyer_dni = u2.dni
                  WHERE c.lawyer_dni = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
