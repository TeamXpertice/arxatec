<?php
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';
require_once '../controllers/case_controller.php';

// Recuperar el DNI del abogado logueado desde la sesión
$lawyer_dni = $_SESSION['dni'];

$caseController = new CaseController();
$cases = $caseController->showCasesForLawyer($lawyer_dni);
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
                    <h2 class="h3 mb-2 text-gray-800">Casos Asignados</h2>
                    <p>En esta sección, los abogados pueden ver y actualizar la información de los casos que tienen asignados. Podrán modificar detalles importantes del caso, añadir notas, y actualizar el estado del proceso para garantizar un seguimiento adecuado y actualizado de cada cliente.</p>

                    <?php if (!empty($cases)) { ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID del Caso</th>
                                        <th>Nombre del Caso</th>
                                        <th>Estado</th>
                                        <th>Fecha de Creación</th>
                                        <th>Fecha de Actualización</th>
                                        <th>Nombre del Cliente</th>
                                        <th>DNI del Cliente</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cases as $case) { ?>
                                        <tr>
                                            <td><?php echo $case['id']; ?></td>
                                            <td><?php echo $case['case_name']; ?></td>
                                            <td><?php echo $case['status']; ?></td>
                                            <td><?php echo $case['creation_date']; ?></td>
                                            <td><?php echo $case['updated_at']; ?></td>
                                            <td><?php echo $case['client_name']; ?></td>
                                            <td><?php echo $case['client_dni']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-warning" role="alert">
                            No se encontraron casos asignados a este abogado.
                        </div>
                    <?php } ?>
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