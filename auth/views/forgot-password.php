<?php
include '../assets/includes/header.php';
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Fila exterior -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Fila anidada dentro del cuerpo de la tarjeta -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu Contraseña?</h1>
                                        <p class="mb-4">Lo entendemos, pasan cosas. Solo ingresa tu dirección de correo electrónico a continuación
                                            y te enviaremos un enlace para restablecer tu contraseña!</p>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingresa tu dirección de correo...">
                                        </div>
                                        <a href="login.php" class="btn btn-primary btn-user btn-block">
                                            Restablecer Contraseña
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login.php">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
    include '../assets/includes/scripts.php';
    ?>

</body>

</html>