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
                    <div class="form-group">
                        <label for="caseName">Nombre del Caso</label>
                        <input type="text" class="form-control" id="caseName" name="case_name" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Abierto">Abierto</option>
                            <option value="Cerrado">Cerrado</option>
                            <option value="Pendiente">Pendiente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="clientDNI">DNI del Cliente</label>
                        <input type="text" class="form-control" id="clientDNI" name="client_dni" required>
                    </div>
                    <div class="form-group">
                        <label for="lawyerDNI">DNI del Abogado</label>
                        <input type="text" class="form-control" id="lawyerDNI" name="lawyer_dni" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Caso</button>
                </form>
            </div>
        </div>
    </div>
</div>