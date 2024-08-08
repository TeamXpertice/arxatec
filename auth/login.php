<?php
session_start();
include('assets/includes/header.php');
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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                                        <?php

                                        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                            echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                                            unset($_SESSION['status']);
                                        }
                                        ?>
                                    </div>
                                    <form class="user" action="login_code.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingrese su correo...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuerdame
                                                </label>
                                            </div>
                                        </div>

                                        <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Ingresar</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">¿Olvidaste tu contraseña?</a>
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
    include 'assets/includes/scripts.php';
    ?>

</body>

</html>