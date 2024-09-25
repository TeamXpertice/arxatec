<?php
require_once('../../../../auth/php/security.php');
require_once('../../assets/includes/header.php');
require_once('../../../../database/connection/connect.php');
?>

<body id="page-top">
    <div id="wrapper">
        <?php include '../../assets/includes/navbar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../../assets/includes/topbar.php'; ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Gestión de Consultas</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mis Consultas</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Consulta</th>
                                            <th>Asunto</th>
                                            <th>Estado</th>
                                            <th>Fecha de Creación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Verificar que el DNI del abogado está en la sesión
                                        if (isset($_SESSION['dni'])) {
                                            $abogado_dni = $_SESSION['dni'];

                                            // Consulta preparada para obtener las consultas
                                            $stmt = $connection->prepare("SELECT * FROM historial_servicios WHERE abogado_dni = ? AND tipo_consulta = 'propio' AND estado NOT IN ('cancelada', 'pendiente')");
                                            $stmt->bind_param("s", $abogado_dni);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            // Comprobar si hay resultados
                                            if ($result->num_rows > 0) {
                                                while ($consulta = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>{$consulta['id']}</td>";
                                                    echo "<td>{$consulta['asunto']}</td>";
                                                    echo "<td>{$consulta['estado']}</td>";
                                                    echo "<td>{$consulta['fecha_creacion']}</td>";
                                                    echo "<td>
                                                            <a href='editar_consulta.php?id={$consulta['id']}' class='btn btn-primary btn-sm'>Editar</a>
                                                            <a href='ver_consulta.php?id={$consulta['id']}' class='btn btn-info btn-sm'>Ver</a>
                                                          </td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No hay consultas propias disponibles.</td></tr>";
                                            }
                                            $stmt->close();
                                        } else {
                                            echo "<tr><td colspan='5'>No se encontró el DNI del abogado en la sesión.</td></tr>";
                                        }

                                        $connection->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include '../../assets/includes/footer.php'; ?>
        </div>
    </div>

    <?php
    include '../../assets/includes/scrolltop.php';
    include '../../assets/includes/logout.php';
    include '../../assets/includes/scripts.php';
    ?>
</body>

</html>