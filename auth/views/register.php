<?php
session_start();
include('../assets/includes/header.php');
?>

<body>

    <div class="container">
        <div class="logo-container">
            <img src="../assets/img/ARXATEC.png" alt="Logo ArxaTEC" class="logo">
        </div>
        <h1>Regístrate en ArxaTEC</h1>

        <?php
        // Recuperar los datos guardados en la sesión
        $name = isset($_SESSION['register_data']['name']) ? $_SESSION['register_data']['name'] : '';
        $email = isset($_SESSION['register_data']['email']) ? $_SESSION['register_data']['email'] : '';
        $dni = isset($_SESSION['register_data']['dni']) ? $_SESSION['register_data']['dni'] : '';

        // Limpiar los datos de la sesión después de mostrarlos
        unset($_SESSION['register_data']);
        ?>

        <form action="../php/register_code.php" method="POST">
            <div class="input-container">
                <input type="text" id="name" name="name" placeholder=" " value="<?php echo $name; ?>" required>
                <label for="name" class="static-label">Nombre de usuario</label>
            </div>

            <div class="input-container">
                <input type="text" id="dni" name="dni" placeholder=" " value="<?php echo $dni; ?>" required>
                <label for="dni" class="static-label">DNI</label>
            </div>

            <div class="input-container">
                <input type="email" id="email" name="email" placeholder=" " value="<?php echo $email; ?>" required>
                <label for="email" class="static-label">Email</label>
            </div>

            <!-- Campo de Contraseña -->
            <div class="input-container password-container">
                <input type="password" id="password" name="password" placeholder=" " required oninput="checkPasswordFields()">
                <label for="password" class="static-label">Contraseña</label>
                <span class="toggle-password" onclick="toggleBothPasswords()">
                    <i class="fas fa-eye" id="toggleIconPassword"></i>
                </span>
            </div>

            <!-- Campo de Confirmar Contraseña -->
            <div class="input-container password-container">
                <input type="password" id="confirm_password" name="confirm_password" placeholder=" " required oninput="checkPasswordFields()">
                <label for="confirm_password" class="static-label">Confirmar Contraseña</label>
                <span class="toggle-password" onclick="toggleBothPasswords()">
                    <i class="fas fa-eye" id="toggleIconConfirm"></i>
                </span>
            </div>

            <button type="submit" name="register_btn">Registrar</button>
        </form>

        <div class="footer-links">
            <a href="login.php">¿Ya tienes cuenta? <span>Inicia sesión</span></a>
        </div>
    </div>

    <?php include '../assets/includes/scripts.php'; ?>

</body>

<!-- Incluye SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- FontAwesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script>
    window.onload = function() {
        <?php if (isset($_SESSION['status'])): ?>
            Swal.fire({
                icon: '<?php echo $_SESSION['status']['type'] === 'success' ? 'success' : 'error'; ?>',
                title: '<?php echo $_SESSION['status']['type'] === 'success' ? '¡Registro Exitoso!' : 'Error en el registro'; ?>',
                text: '<?php echo $_SESSION['status']['message']; ?>',
                confirmButtonText: 'OK',
                didClose: () => {
                    // Si el registro fue exitoso, redirige al login
                    <?php if ($_SESSION['status']['type'] === 'success'): ?>
                        window.location.href = 'login.php';
                    <?php endif; ?>
                }
            });
            <?php unset($_SESSION['status']); ?>
        <?php endif; ?>
    };

    // Función para alternar la visibilidad de ambos campos de contraseña
    function toggleBothPasswords() {
        var passwordField = document.getElementById("password");
        var confirmPasswordField = document.getElementById("confirm_password");
        var toggleIconPassword = document.getElementById("toggleIconPassword");
        var toggleIconConfirm = document.getElementById("toggleIconConfirm");

        // Verifica si los campos están en modo "password" y cámbialos a "text", y viceversa
        if (passwordField.type === "password") {
            passwordField.type = "text";
            confirmPasswordField.type = "text";
            toggleIconPassword.classList.remove("fa-eye");
            toggleIconPassword.classList.add("fa-eye-slash");
            toggleIconConfirm.classList.remove("fa-eye");
            toggleIconConfirm.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            confirmPasswordField.type = "password";
            toggleIconPassword.classList.remove("fa-eye-slash");
            toggleIconPassword.classList.add("fa-eye");
            toggleIconConfirm.classList.remove("fa-eye-slash");
            toggleIconConfirm.classList.add("fa-eye");
        }
    }

    // Función para mostrar el icono solo si hay texto en cualquiera de los campos de contraseña
    function checkPasswordFields() {
        var passwordField = document.getElementById("password");
        var confirmPasswordField = document.getElementById("confirm_password");
        var togglePasswordIcon1 = document.getElementById("toggleIconPassword").parentElement;
        var togglePasswordIcon2 = document.getElementById("toggleIconConfirm").parentElement;

        // Mostrar los iconos si hay texto en cualquiera de los dos campos
        if (passwordField.value.length > 0 || confirmPasswordField.value.length > 0) {
            togglePasswordIcon1.style.display = "block";
            togglePasswordIcon2.style.display = "block";
        } else {
            togglePasswordIcon1.style.display = "none";
            togglePasswordIcon2.style.display = "none";
        }
    }
</script>

</html>