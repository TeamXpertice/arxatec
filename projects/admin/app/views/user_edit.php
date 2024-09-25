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
        <?php
        include '../../assets/includes/navbar.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                include '../../assets/includes/topbar.php';
                ?>

                <!-- Edit User Form -->
                <div class="container-fluid">
                    <!-- Form to Edit User -->
                    <h1 class="h3 mb-2 text-gray-800">Editar Usuario</h1>
                    <p class="mb-4">Modifica los datos del usuario y guarda los cambios.</p>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Formulario de Edición</h6>
                        </div>
                        <div class="card-body">
                            <form action="../controllers/user_controller.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">Nombre Completo</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="dni">DNI</label>
                                        <input type="text" class="form-control" id="dni" name="dni" value="<?php echo htmlspecialchars($user['dni']); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Dirección</label>
                                        <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone_number">Teléfono</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($user['phone_number']); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="additional_phone">Teléfono Adicional</label>
                                        <input type="text" class="form-control" id="additional_phone" name="additional_phone" value="<?php echo htmlspecialchars($user['additional_phone']); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="usertype">Tipo de Usuario</label>
                                    <select class="form-control" id="usertype" name="usertype" required>
                                        <option value="admin" <?php if ($user['usertype'] === 'admin') echo 'selected'; ?>>Administrador</option>
                                        <option value="cliente" <?php if ($user['usertype'] === 'cliente') echo 'selected'; ?>>Cliente</option>
                                        <option value="abogado" <?php if ($user['usertype'] === 'abogado') echo 'selected'; ?>>Abogado</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="update_user">Actualizar</button>
                                <a href="../views/user_management.php" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End of Form to Edit User -->
            </div>
            <!-- End of Main Content -->
            <?php
            include '../../assets/includes/footer.php';
            ?>
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