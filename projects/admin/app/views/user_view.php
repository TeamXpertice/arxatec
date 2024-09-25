<?php
require_once('../../../../auth/php/security.php');
require_once '../controllers/user_controller.php';
include '../../assets/includes/header.php';


// Crear una instancia del controlador
$userController = new UserController();

// Verificar si se ha proporcionado un token
if (isset($_GET['token'])) {
    // Decodificar el token de base64
    $id = intval(base64_decode($_GET['token']));

    // Obtener el usuario por ID
    $user = $userController->getUserById($id);
} else {
    // Redirigir si no hay token
    header("Location: user_management.php");
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

                <div class="container-fluid">
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3 ">
                            <h6 class="m-0 font-weight-bold text-primary">Detalles del Usuario</h6>
                        </div>
                        <div class="card-body">
                            <?php if ($user): ?>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div class="form-group">
                                            <label>Imagen de Perfil</label>
                                            <div class="mb-3">
                                                <?php if (!empty($user['profile_image'])): ?>
                                                    <img src="../../../shared/uploads/profile_images/<?php echo htmlspecialchars($user['profile_image']); ?>" alt="Imagen de Perfil" class="img-fluid rounded-circle border" style="max-width: 200px; max-height: 200px;">
                                                <?php else: ?>
                                                    <img src="../../../shared/uploads/profile_images/default.png" alt="Imagen de Perfil" class="img-fluid rounded-circle border" style="max-width: 200px; max-height: 200px;">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nombre Completo</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Correo Electrónico</label>
                                                <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>DNI</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['dni']); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Dirección</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['address']); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Teléfono</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['phone_number']); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Teléfono Adicional</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['additional_phone']); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" value="<?php echo htmlspecialchars($user['date_of_birth']); ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Tipo de Usuario</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['usertype']); ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Género</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['gender']); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <p class="text-center text-danger">No se encontró el usuario.</p>
                            <?php endif; ?>
                            <a href="user_management.php" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
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