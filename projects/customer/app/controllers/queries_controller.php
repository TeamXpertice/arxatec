<?php
require_once '../models/queries_model.php';

class QueriesController
{
    private $queriesModel;

    public function __construct()
    {
        $this->queriesModel = new QueriesModel();
    }

    // Obtener todas las consultas que estén en estado 'pendiente', 'confirmada' o 'en proceso'
    public function getEstadoConsultas()
    {
        return $this->queriesModel->getConsultasByEstado(['pendiente', 'confirmada', 'en proceso']);
    }

    // Obtener todas las consultas que estén en estado 'cancelada' o 'finalizada'
    public function getHistorialConsultas()
    {
        return $this->queriesModel->getConsultasByEstado(['cancelada', 'finalizada']);
    }
    // Obtener todos los abogados
    public function getAbogados()
    {
        return $this->queriesModel->getAllAbogados();
    }

    // Enviar consulta con el tipo de consulta (público o privado)
    public function enviarConsulta($asunto, $descripcion, $fecha, $hora, $abogadoDni, $tipoConsulta)
    {
        $clienteDni = $_SESSION['dni']; // Obtener el DNI del cliente de la sesión

        if (!$clienteDni) {
            return false;
        }

        // Si el tipo de consulta es privado y no hay abogado, retornar falso
        if ($tipoConsulta === 'privado' && empty($abogadoDni)) {
            return false; // No se ha seleccionado un abogado para una consulta privada
        }

        // Si es consulta pública, asignar NULL al abogado
        if ($tipoConsulta === 'publico') {
            $abogadoDni = NULL;
        }

        return $this->queriesModel->insertConsulta($clienteDni, $abogadoDni, $asunto, $descripcion, $fecha, $hora, $tipoConsulta);
    }
}

// Si se hace una solicitud POST (envío de formulario)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start(); // Asegurarse de que la sesión esté iniciada
    $controller = new QueriesController();

    if (isset($_POST['asunto'], $_POST['descripcion'], $_POST['fecha'], $_POST['hora'], $_POST['abogado'], $_POST['tipo_consulta'])) {
        $asunto = $_POST['asunto'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $abogadoDni = $_POST['abogado']; // Podría estar vacío si es consulta pública
        $tipoConsulta = $_POST['tipo_consulta'];

        if ($controller->enviarConsulta($asunto, $descripcion, $fecha, $hora, $abogadoDni, $tipoConsulta)) {
            echo "Consulta enviada exitosamente";
        } else {
            echo "Error al enviar la consulta";
        }
    }
}
