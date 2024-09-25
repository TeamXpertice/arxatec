<?php
session_start();
include('../assets/includes/header.php');
?>

<body>

    <div class="container">
        <div class="logo-container">
            <img src="../assets/img/ARXATEC.png" alt="Logo ArxaTEC" class="logo">
        </div>
        <h1>Acceder a ArxaTEC</h1>

        <form action="../php/login_code.php" method="POST">
            <div class="input-container">
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email" class="static-label">Email</label>
            </div>

            <div class="input-container password-container">
                <input type="password" id="password" name="password" placeholder=" " required oninput="checkPassword()">
                <label for="password" class="static-label">Contraseña</label>
                <span class="toggle-password" onclick="togglePassword()" style="display: none;">
                    <i class="fas fa-eye" id="toggleIcon"></i>
                </span>
            </div>

            <button type="submit" name="login_btn">Ingresar</button>
        </form>

        <div class="footer-links">
            <a href="register.php">¿No tienes cuenta? <span>Crea una </span></a>
        </div>
    </div>

    <?php include '../assets/includes/scripts.php'; ?>

</body>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Función para mostrar/ocultar la contraseña
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("toggleIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }

    // Función para mostrar el icono solo cuando hay texto en el campo de contraseña
    function checkPassword() {
        var passwordField = document.getElementById("password");
        var togglePasswordIcon = document.querySelector(".toggle-password");

        // Mostrar el icono solo si hay texto en el campo
        if (passwordField.value.length > 0) {
            togglePasswordIcon.style.display = "block";
        } else {
            togglePasswordIcon.style.display = "none";
        }
    }
</script>

</html>