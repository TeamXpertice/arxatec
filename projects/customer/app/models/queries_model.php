<?php
require_once '../../../../database/connection/connect.php';
require_once('../../../../auth/php/security.php');

class QueriesModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = $GLOBALS['connection'];
    }

    // Obtener consultas filtradas por estado
    public function getConsultasByEstado($estados)
    {
        $in = implode("','", $estados);
        $query = "SELECT * FROM historial_servicios WHERE estado IN ('$in')";
        $result = mysqli_query($this->connection, $query);
        $consultas = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $consultas[] = $row;
        }

        return $consultas;
    }

    // Obtener todos los abogados
    public function getAllAbogados()
    {
        $query = "SELECT username, dni, profile_image FROM usuarios WHERE usertype = 'abogado'";
        $result = mysqli_query($this->connection, $query);
        $abogados = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $abogados[] = $row;
        }

        return $abogados;
    }

    // Insertar consulta, permitiendo que abogado_dni sea NULL si es consulta pública
    public function insertConsulta($clienteDni, $abogadoDni, $asunto, $descripcion, $fecha, $hora, $tipoConsulta)
    {
        $query = "INSERT INTO historial_servicios (cliente_dni, abogado_dni, asunto, tipo_servicio, descripcion, fecha_servicio, hora_servicio, tipo_consulta) 
                  VALUES (?, ?, ?, 'consulta', ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        // Si no hay abogado (consulta pública), el parámetro para abogado_dni será NULL
        $stmt->bind_param("sssssss", $clienteDni, $abogadoDni, $asunto, $descripcion, $fecha, $hora, $tipoConsulta);

        return $stmt->execute();
    }
}
