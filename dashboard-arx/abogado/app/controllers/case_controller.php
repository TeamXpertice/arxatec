<?php
require_once '../../../shared/config/connect.php';
require_once '../models/case_model.php';

class CaseController
{
    private $caseModel;

    public function __construct()
    {
        global $connection;
        $this->caseModel = new CaseModel($connection);
    }

    public function showCasesForLawyer($dni)
    {
        return $this->caseModel->getCasesByLawyerDni($dni);
    }
}
