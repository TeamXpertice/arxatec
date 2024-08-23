<?php
require_once '../models/case_model.php';
require_once('../../../../auth/php/security.php');

class CaseController
{
    private $case_model;

    public function __construct()
    {
        $this->case_model = new CaseModel();
    }

    public function get_all_cases()
    {
        return $this->case_model->fetch_all_cases();
    }

    public function add_case($case_name, $status, $client_dni, $lawyer_dni)
    {
        return $this->case_model->insert_case($case_name, $status, $client_dni, $lawyer_dni);
    }

    public function get_case_by_id($id)
    {
        return $this->case_model->fetch_case_by_id($id);
    }

    public function update_case($id, $case_name, $status)
    {
        return $this->case_model->update_case($id, $case_name, $status);
    }
}

// Instanciar el controlador
$case_controller = new CaseController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'add') {
        $case_name = $_POST['case_name'];
        $status = $_POST['status'];
        $client_dni = $_POST['client_dni'];
        $lawyer_dni = $_POST['lawyer_dni'];

        // Agregar el nuevo caso
        $success = $case_controller->add_case($case_name, $status, $client_dni, $lawyer_dni);

        if ($success) {
            header("Location: ../views/case_management.php");
            exit();
        } else {
            echo "Error al agregar el caso.";
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'edit') {
        $case_id = $_POST['id'];
        $case_name = $_POST['case_name'];
        $status = $_POST['status'];

        // Actualizar el caso
        $success = $case_controller->update_case($case_id, $case_name, $status);

        if ($success) {
            header("Location: case_management.php?token=" . base64_encode($case_id));
            exit();
        } else {
            echo "Error al actualizar el caso.";
        }
    }
}

// Obtener todos los casos
$cases = $case_controller->get_all_cases();
