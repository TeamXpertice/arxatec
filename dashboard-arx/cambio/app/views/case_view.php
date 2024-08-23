<?php
require_once '../controllers/case_controller.php';
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';

// Obtener el token desde la URL y decodificarlo
$encoded_id = $_GET['token'];
$case_id = base64_decode($encoded_id);

// Instanciar el controlador y obtener los detalles del caso
$case_controller = new CaseController();
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
                    <h1 class="h3 mb-4 text-gray-800">Detalles del Caso</h1>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID del Caso</th>
                                    <td><?php echo htmlspecialchars($case['id']); ?></td>
                                </tr>
                                <tr>
                                    <th>Nombre del Caso</th>
                                    <td><?php echo htmlspecialchars($case['case_name']); ?></td>
                                </tr>
                                <tr>
                                    <th>Estado</th>
                                    <td><?php echo htmlspecialchars($case['status']); ?></td>
                                </tr>
                                <tr>
                                    <th>Fecha de Creación</th>
                                    <td><?php echo htmlspecialchars($case['creation_date']); ?></td>
                                </tr>
                                <tr>
                                    <th>Fecha de Actualización</th>
                                    <td><?php echo htmlspecialchars($case['updated_at']); ?></td>
                                </tr>
                                <tr>
                                    <th>Nombre del Cliente</th>
                                    <td><?php echo htmlspecialchars($case['client_name']); ?></td>
                                </tr>
                                <tr>
                                    <th>DNI del Cliente</th>
                                    <td><?php echo htmlspecialchars($case['client_dni']); ?></td>
                                </tr>
                                <tr>
                                    <th>Nombre del Abogado</th>
                                    <td><?php echo htmlspecialchars($case['lawyer_name']); ?></td>
                                </tr>
                                <tr>
                                    <th>DNI del Abogado</th>
                                    <td><?php echo htmlspecialchars($case['lawyer_dni']); ?></td>
                                </tr>
                            </table>
                            <a href="case_management.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
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