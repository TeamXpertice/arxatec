<?php
// Incluye el controlador de usuarios
require_once '../controllers/profile_controller.php';
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';

// Inicializa el controlador
$profileController = new ProfileController();

// Obtiene los datos del usuario logueado
$userId = $_SESSION['id'];
$userData = $profileController->getUserById($userId);
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

                <!-- Mensaje de Sesión -->
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-info">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif; ?>

                <!-- Contenido del perfil -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Perfil</h1>
                    <p class="mb-4">Aquí podrás ver tu información personal actualizada.</p>
                    <div class="container">
                        <div class="row">
                            <!-- Información Básica -->
                            <div class="col-lg-8 mb-4">
                                <div class="card">
                                    <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #007bff;">
                                        <h5 class="card-title mb-0" style="color: #007bff;">Información Básica</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4 text-center position-relative">
                                            <label class="form-label">Imagen de Perfil</label>
                                            <div class="d-flex justify-content-center align-items-center position-relative">
                                                <img id="profile-image-preview" src="<?php echo htmlspecialchars($userData['profile_image']) ?: 'https://via.placeholder.com/150'; ?>" class="img-fluid rounded-circle" alt="Imagen de perfil" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #ddd;">
                                                <button type="button" id="camera-button" class="btn position-absolute d-flex justify-content-center align-items-center" style="top: 85%; left: 56%; transform: translate(-50%, -50%); border: none; background: #6c757d; border-radius: 50%; width: 30px; height: 30px; padding: 0;">
                                                    <i class="fas fa-camera" style="font-size: 18px; color: white;"></i>
                                                </button>
                                                <form id="profile-image-form" action="../controllers/profile_controller.php" method="POST" enctype="multipart/form-data" style="display: none;">
                                                    <input type="hidden" name="action" value="updateProfileImage">
                                                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                                                    <input type="file" name="profile_image" id="profile-image" accept="image/*">
                                                    <button type="submit" id="submit-button">Actualizar Imagen</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="form-label">Nombre Completo</label>
                                            <input type="text" class="form-control" id="username" value="<?php echo htmlspecialchars($userData['username']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($userData['email']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="dni" class="form-label">DNI</label>
                                            <input type="text" class="form-control" id="dni" value="<?php echo htmlspecialchars($userData['dni']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Contraseña</label>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="text" class="form-control" id="password" value="Cambiar contraseña"
                                                    readonly style="cursor: pointer; color: #007bff; border: none; background: none;"
                                                    data-toggle="modal" data-target="#changePasswordModal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Información de Contacto y Información Adicional -->
                            <div class="col-lg-4 mb-4">
                                <!-- Información de Contacto -->
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #f8f9fa; border-bottom: 2px solid #28a745;">
                                        <h5 class="card-title mb-0" style="color: #28a745;">Información de Contacto</h5>
                                        <!-- Botón de Editar -->
                                        <button type="button" class="btn btn-sm btn-outline-success ml-auto" data-toggle="modal" data-target="#editContactInfoModal">
                                            Editar
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="address" value="<?php echo htmlspecialchars($userData['address']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number" class="form-label">Número de Teléfono</label>
                                            <input type="text" class="form-control" id="phone_number" value="<?php echo htmlspecialchars($userData['phone_number']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="additional_phone" class="form-label">Número Adicional</label>
                                            <input type="text" class="form-control" id="additional_phone" value="<?php echo htmlspecialchars($userData['additional_phone']); ?>" readonly>
                                        </div>
                                    </div>
                                </div>


                                <!-- Información Adicional -->
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between" style="background-color: #f8f9fa; border-bottom: 2px solid #ffc107;">
                                        <h5 class="card-title mb-0" style="color: #ffc107;">Información Adicional</h5>
                                        <button type="button" class="btn btn-sm btn-outline-warning ml-auto" data-toggle="modal" data-target="#editAdditionalInfoModal">
                                            Editar
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="gender" class="form-label">Género</label>
                                                <input type="text" class="form-control" id="gender" value="<?php
                                                                                                            $gender = htmlspecialchars($userData['gender']);
                                                                                                            echo ($gender == 'Masculino' ? 'Masculino' : ($gender == 'Femenino' ? 'Femenino' : ($gender == 'Ninguno' ? 'Ninguno' : 'Otro')));
                                                                                                            ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="date_of_birth" class="form-label">Cumpleaños</label>
                                                <input type="text" class="form-control" id="date_of_birth" value="<?php echo htmlspecialchars($userData['date_of_birth']); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin del contenido del perfil -->
                </div>
                <!-- End of Main Content -->
                <?php include '../../assets/includes/footer.php'; ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const cameraButton = document.getElementById('camera-button');
                const profileImageInput = document.getElementById('profile-image');
                const profileImageForm = document.getElementById('profile-image-form');
                const profileImagePreview = document.getElementById('profile-image-preview');

                // Mostrar el selector de archivos al hacer clic en el botón de cámara
                cameraButton.addEventListener('click', function() {
                    profileImageInput.click();
                });

                // Manejar la selección del archivo
                profileImageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            profileImagePreview.src = e.target.result;
                        };

                        reader.readAsDataURL(file);

                        // Enviar el formulario automáticamente cuando se selecciona un archivo
                        profileImageForm.submit();
                    }
                });
            });
        </script>


        <!-- Incluye todos los modales -->
        <?php include 'plugins/profile_modals.php'; ?>
        <!-- Solo modales -->

        <?php
        include '../../assets/includes/scrolltop.php';
        include '../../assets/includes/logout.php';
        include '../../assets/includes/scripts.php';
        ?>
</body>

</html>