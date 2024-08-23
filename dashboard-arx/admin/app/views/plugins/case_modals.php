<!-- Modal para agregar nuevo caso -->
<div class="modal fade" id="addCaseModal" tabindex="-1" role="dialog" aria-labelledby="addCaseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCaseModalLabel">Agregar Nuevo Caso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controllers/case_controller.php" method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="caseName">Nombre del Caso</label>
                            <input type="text" class="form-control" id="caseName" name="case_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="expedienteNumber">Número de Expediente</label>
                            <input type="text" class="form-control" id="expedienteNumber" name="expediente_number" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Descripción del Caso</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Estado</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="INICIO">INICIO</option>
                                <option value="NOTIFICACIÓN">NOTIFICACIÓN</option>
                                <option value="EN TRÁMITE">EN TRÁMITE</option>
                                <option value="EVALUACIÓN">EVALUACIÓN</option>
                                <option value="SENTENCIA">SENTENCIA</option>
                                <option value="EJECUCIÓN">EJECUCIÓN</option>
                                <option value="ARCHIVO">ARCHIVO</option>
                                <option value="APELACIÓN">APELACIÓN</option>
                                <option value="CUMPLIMIENTO">CUMPLIMIENTO</option>
                                <option value="CONCLUSIÓN">CONCLUSIÓN</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="clientDNI">DNI del Cliente</label>
                            <input type="text" class="form-control" id="clientDNI" name="client_dni" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="lawyerDNI">DNI del Abogado</label>
                            <input type="text" class="form-control" id="lawyerDNI" name="lawyer_dni" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Caso</button>
                </form>
            </div>
        </div>
    </div>
</div>