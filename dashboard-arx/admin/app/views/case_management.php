<?php
require_once '../controllers/case_controller.php';
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';
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
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Gestión de Casos</h1>
                    <!-- Caso Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Casos</h6>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCaseModal">
                                <i class="fas fa-plus"></i> Agregar nuevo caso
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Expediente</th>
                                            <th>Nombre del Caso</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($cases)) : ?>
                                            <?php foreach ($cases as $case) : ?>
                                                <?php
                                                $encoded_id = base64_encode($case["id"]);
                                                ?>
                                                <tr>
                                                    <td><?php echo $case["expediente_number"]; ?></td>
                                                    <td><?php echo $case["case_name"]; ?></td>
                                                    <td><?php echo $case["status"]; ?></td>
                                                    <td>
                                                        <a href='case_edit.php?token=<?php echo $encoded_id; ?>' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i></a>
                                                        <a href='case_view.php?token=<?php echo $encoded_id; ?>' class='btn btn-info btn-sm'><i class='fas fa-eye'></i> </a>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan='1'>No se encontraron casos</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de la tabla de casos -->

                </div>
                <!-- Fin del código agregado -->
            </div>
            <!-- End of Main Content -->

            <!-- Modal para agregar nuevo caso -->
            <?php include 'plugins/case_modals.php'; ?>

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