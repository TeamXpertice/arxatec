<?php
require_once '../controllers/case_controller.php';
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';

// Obtener el token desde la URL y decodificarlo
$encoded_id = $_GET['token'];
$case_id = base64_decode($encoded_id);

$case_controller = new CaseController();

// Obtener los detalles del caso para prellenar el formulario
$case = $case_controller->get_case_by_id($case_id);

if (!$case) {
    echo "Caso no encontrado.";
    exit();
}
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include '../../assets/includes/navbar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include '../../assets/includes/topbar.php'; ?>

                <!-- Agrega aquí el código -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Editar Caso</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($case['id']); ?>">
                                <div class="form-group">
                                    <label for="case_name">Nombre del Caso</label>
                                    <input type="text" class="form-control" id="case_name" name="case_name" value="<?php echo htmlspecialchars($case['case_name']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Estado</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="INICIO" <?php echo $case['status'] == 'INICIO' ? 'selected' : ''; ?>>INICIO</option>
                                        <option value="NOTIFICACIÓN" <?php echo $case['status'] == 'NOTIFICACIÓN' ? 'selected' : ''; ?>>NOTIFICACIÓN</option>
                                        <option value="EN TRÁMITE" <?php echo $case['status'] == 'EN TRÁMITE' ? 'selected' : ''; ?>>EN TRÁMITE</option>
                                        <option value="EVALUACIÓN" <?php echo $case['status'] == 'EVALUACIÓN' ? 'selected' : ''; ?>>EVALUACIÓN</option>
                                        <option value="SENTENCIA" <?php echo $case['status'] == 'SENTENCIA' ? 'selected' : ''; ?>>SENTENCIA</option>
                                        <option value="EJECUCIÓN" <?php echo $case['status'] == 'EJECUCIÓN' ? 'selected' : ''; ?>>EJECUCIÓN</option>
                                        <option value="ARCHIVO" <?php echo $case['status'] == 'ARCHIVO' ? 'selected' : ''; ?>>ARCHIVO</option>
                                        <option value="APELACIÓN" <?php echo $case['status'] == 'APELACIÓN' ? 'selected' : ''; ?>>APELACIÓN</option>
                                        <option value="CUMPLIMIENTO" <?php echo $case['status'] == 'CUMPLIMIENTO' ? 'selected' : ''; ?>>CUMPLIMIENTO</option>
                                        <option value="CONCLUSIÓN" <?php echo $case['status'] == 'CONCLUSIÓN' ? 'selected' : ''; ?>>CONCLUSIÓN</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                <a href="case_management.php?id=<?php echo htmlspecialchars($case['id']); ?>" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fin del código agregado -->
            </div>
            <!-- End of Main Content -->
            <?php include '../../assets/includes/footer.php'; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?php
    include '../../assets/includes/scrolltop.php';
    include '../../assets/includes/logout.php';
    include '../../assets/includes/scripts.php';
    ?>
</body>

</html>