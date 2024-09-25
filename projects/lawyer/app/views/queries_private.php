<?php
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';
require_once('../../../../database/connection/connect.php');

// Verificar si se ha enviado el formulario para tomar una consulta
$updateMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $consulta_id = $_POST['id'];

    // Obtener el DNI del abogado logueado desde la sesión
    if (isset($_SESSION['dni'])) {
        $abogado_dni = $_SESSION['dni'];

        // Actualizar la consulta en la base de datos para asignar el abogado y cambiar el estado a 'confirmada' y tipo de consulta a 'propio'
        $query_update = "UPDATE historial_servicios 
                         SET abogado_dni = '$abogado_dni', 
                             estado = 'confirmada', 
                             tipo_consulta = 'propio' 
                         WHERE id = $consulta_id";

        if (mysqli_query($connection, $query_update)) {
            $updateMessage = "Consulta tomada exitosamente. Estado cambiado a 'propio' y 'confirmada'.";
        } else {
            $updateMessage = "Error al tomar la consulta: " . mysqli_error($connection);
        }
    } else {
        $updateMessage = "No se encontró el DNI del abogado en la sesión.";
    }
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
                    <h2 class="h3 mb-4 text-gray-800">Consultas Privadas</h2>
                    <p>En esta sección se mostrarán las consultas cuando los clientes te hayan elegido como su abogado. Aquí podrás revisar y gestionar las consultas asignadas personalmente para brindar tu asesoramiento y asistencia legal directa.</p>


                    <!-- Tabla de consultas privadas -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Consulta</th>
                                            <th>Cliente</th>
                                            <th>Asunto</th>
                                            <th>Descripción</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Consulta para obtener solo las consultas privadas pendientes
                                        $query = "SELECT hs.id, u.username as cliente, hs.asunto, hs.descripcion 
                                                  FROM historial_servicios hs 
                                                  JOIN usuarios u ON hs.cliente_dni = u.dni 
                                                  WHERE hs.tipo_consulta = 'privado' AND hs.estado = 'pendiente'";

                                        $result = mysqli_query($connection, $query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['cliente']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['asunto']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
                                                echo "<td>";
                                                echo "<form method='POST' action=''>";
                                                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                                echo "<button type='submit' class='btn btn-success'>Aceptar</button>";
                                                echo "</form>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No hay consultas pendientes disponibles.</td></tr>";
                                        }

                                        mysqli_close($connection);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para mostrar mensaje -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel">Actualización de Estado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php if ($updateMessage): ?>
                                    <p><?php echo $updateMessage; ?></p>
                                <?php else: ?>
                                    <p>Actualización exitosa.</p>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include '../../assets/includes/footer.php'; ?>
        </div>
    </div>

    <?php include '../../assets/includes/scrolltop.php'; ?>
    <?php include '../../assets/includes/logout.php'; ?>
    <?php include '../../assets/includes/scripts.php'; ?>
</body>

</html>