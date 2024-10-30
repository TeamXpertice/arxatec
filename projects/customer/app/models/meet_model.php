<?php
// Incluir la configuración de conexión
include '../../database/connection/connect.php';

class MeetModel
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    // Función para agregar una nueva consulta
    public function addMeeting($client_dni, $lawyer_dni, $subject, $date, $time, $description)
    {
        $sql = "INSERT INTO servicio_consultas_videollamadas (dni_cliente, dni_abogado, asunto, tipo_servicio, fecha_servicio, hora_servicio, descripcion, estado)
                VALUES (?, ?, ?, 'consulta', ?, ?, ?, 'pendiente')";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssssss", $client_dni, $lawyer_dni, $subject, $date, $time, $description);
        return $stmt->execute();
    }

    // Función para obtener la lista de abogados
    public function getLawyersList()
    {
        $sql = "SELECT dni, nombres, apellidos FROM usuarios WHERE tipo_usuario = 'abogado' AND estado = 'activo'";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function getMeetings()
    {
        $sql = "SELECT 
                s.fecha_servicio, 
                s.hora_servicio, 
                s.estado, 
                s.link_videollamada, 
                s.mensaje,
                u.nombres, 
                u.apellidos
            FROM 
                servicio_consultas_videollamadas s
            INNER JOIN 
                usuarios u 
            ON 
                s.dni_abogado = u.dni
            WHERE 
                s.tipo_servicio = 'consulta'
                AND (s.estado = 'cancelada' OR s.estado = 'finalizada')";
        $result = $this->connection->query($sql);
        return $result;
    }
}
