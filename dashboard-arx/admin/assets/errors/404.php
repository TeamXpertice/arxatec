<?php
include '../includes/header.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include '../includes/navbar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include '../includes/topbar.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Página no encontrada</p>
                        <p class="text-gray-500 mb-0">Parece que ha ocurrido un error inesperado...</p>
                        <a href="../../index.php">&larr; Volver al Dashboard</a>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
            include '../includes/footer.php';
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php
    include '../includes/scrolltop.php';
    include '../includes/logout.php';
    include '../includes/scripts.php';
    ?>

</body>

</html>