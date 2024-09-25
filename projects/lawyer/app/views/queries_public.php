<?php
require_once('../../../../auth/php/security.php');
include '../../assets/includes/header.php';
require_once('../../../../database/connection/connect.php');

// Verificar si se ha enviado el formulario para tomar una consulta
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['consulta_id'])) {
    $consulta_id = $_POST['consulta_id'];

    // Obtener el DNI del abogado logueado desde la sesión
    if (isset($_SESSION['dni'])) {
        $abogado_dni = $_SESSION['dni'];

        // Actualizar la consulta en la base de datos para asignar el abogado y cambiar el estado a 'confirmada'
        $query_update = "UPDATE historial_servicios 
                         SET abogado_dni = '$abogado_dni', 
                             estado = 'confirmada', 
                             tipo_consulta = 'propio' 
                         WHERE id = $consulta_id";

        if (mysqli_query($connection, $query_update)) {
            echo "<div class='alert alert-success'>Consulta tomada exitosamente. Estado cambiado a 'confirmada'.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al tomar la consulta: " . mysqli_error($connection) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No se encontró el DNI del abogado en la sesión.</div>";
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
                    <h2 class="h3 mb-4 text-gray-800">Consultas Públicas</h2>
                    <p>En esta sección se muestran las consultas legales que aún no han sido asignadas a un abogado. Como abogado, tienes la oportunidad de revisar y tomar una de estas consultas para brindar tu asesoramiento y asistencia legal. Selecciona una consulta y colabora en la resolución de las inquietudes jurídicas de los usuarios.</p>

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
                                            <th>Cliente DNI</th>
                                            <th>Asunto</th>
                                            <th>Tipo de Servicio</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Consulta SQL para obtener las consultas sin abogado asignado
                                        $query = "SELECT hs.id, hs.cliente_dni, hs.asunto, hs.tipo_servicio, hs.fecha_servicio, hs.hora_servicio, hs.descripcion, hs.estado
                                                  FROM historial_servicios hs
                                                  WHERE hs.abogado_dni IS NULL AND hs.estado = 'pendiente'";

                                        // Ejecutar la consulta
                                        $result = mysqli_query($connection, $query);

                                        // Verificar si hay resultados
                                        if (mysqli_num_rows($result) > 0) {
                                            // Mostrar cada fila en la tabla
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['cliente_dni']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['asunto']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['tipo_servicio']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['fecha_servicio']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['hora_servicio']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['descripcion']) . "</td>";
                                                echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
                                                // Botón para tomar la consulta
                                                echo "<td>";
                                                echo "<form method='POST' action=''>";
                                                echo "<input type='hidden' name='consulta_id' value='" . $row['id'] . "'>";
                                                echo "<button type='submit' class='btn btn-success'>Tomar Consulta</button>";
                                                echo "</form>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'>No hay consultas pendientes sin abogado asignado</td></tr>";
                                        }

                                        // Cerrar la conexión a la base de datos
                                        mysqli_close($connection);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del código agregado -->

            </div>
            <!-- End of Main Content -->

            <?php include '../../assets/includes/footer.php'; ?>
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