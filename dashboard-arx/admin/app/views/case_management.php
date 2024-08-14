<?php
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';
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

                <!-- Agrega aquí el código -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Gestión de Casos</h1>

                    <!-- Caso Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de Casos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID del Caso</th>
                                            <th>Nombre del Caso</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Conectar a la base de datos
                                        $servername = "localhost"; // Cambia esto si tu servidor de base de datos está en otro lugar
                                        $username = "root"; // Usuario por defecto en MySQL
                                        $password = ""; // Sin contraseña
                                        $dbname = "arxatec";

                                        // Crear conexión
                                        $conn = new mysqli($servername, $username, $password, $dbname);

                                        // Verificar la conexión
                                        if ($conn->connect_error) {
                                            die("Conexión fallida: " . $conn->connect_error);
                                        }

                                        // Consultar casos
                                        $sql = "SELECT * FROM cases";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td>" . $row["case_name"] . "</td>";
                                                echo "<td>" . $row["status"] . "</td>";
                                                echo "<td>
                                <a href='ver_caso.php?id=" . $row["id"] . "' class='btn btn-info btn-sm'>Ver</a>
                                <a href='editar_caso.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='borrar_caso.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este caso?\")'>Eliminar</a>
                              </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>No se encontraron casos</td></tr>";
                                        }

                                        $conn->close();
                                        ?>
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