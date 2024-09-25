<?php
require_once('../controllers/queries_controller.php');
$controller = new QueriesController();
$abogados = $controller->getAbogados();
$estadoConsultas = $controller->getEstadoConsultas();
$historialConsultas = $controller->getHistorialConsultas();
include '../../assets/includes/header.php';
?>

<body id="page-top">
    <div id="wrapper">
        <?php include '../../assets/includes/navbar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include '../../assets/includes/topbar.php'; ?>

                <div class="container mt-5" id="consultasSection">
                    <h2>Herramientas para la Gestión de Consultas</h2>
                    <div class="row">
                        <!-- Tarjeta para Solicitar Consulta -->
                        <div class="col-md-4 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-envelope fa-3x mb-3"></i>
                                    <h5 class="card-title">Solicitar Consulta</h5>
                                    <p class="card-text">Envía tu consulta.</p>
                                    <a href="#" class="btn btn-primary" id="consultarButton">consultar</a>
                                </div>
                            </div>
                        </div>

                        <!-- Tarjeta para Estado de Consultas -->
                        <div class="col-md-4 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-tasks fa-3x mb-3"></i>
                                    <h5 class="card-title">Estado de Consultas</h5>
                                    <p class="card-text">Aquí se ve el estado de la nueva consulta.</p>
                                    <button id="openMenu" class="btn btn-primary">Ver estado</button>
                                </div>
                            </div>
                        </div>

                        <!-- Overlay oscuro -->
                        <div id="overlay" class="overlay"></div>

                        <div id="offcanvasEstado" class="offcanvas">
                            <div class="offcanvas-content">
                                <span id="closeMenu" class="close-btn">&times;</span>
                                <h5>Estado de Consultas</h5>
                                <p>Estas son las consultas para su seguimiento. Si tienen un ícono de URL o están en los estados 'confirmada' o 'en proceso', significa que su consulta se va a tomar. Si ya tienen uno de esos íconos o están en esos estados, presionen la celda de estado o el fondo verde para ver más detalles sobre dónde se tomará su consulta.</p>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Asunto</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $estadoConsultas = $controller->getEstadoConsultas();
                                            if (count($estadoConsultas) > 0): ?>
                                                <?php foreach ($estadoConsultas as $consulta): ?>
                                                    <tr>
                                                        <td><?php echo $consulta['asunto']; ?></td>
                                                        <td><?php echo $consulta['fecha_servicio']; ?></td>
                                                        <td><?php echo $consulta['hora_servicio']; ?></td>
                                                        <td>
                                                            <?php if ($consulta['estado'] == 'pendiente'): ?>
                                                                <span class="badge badge-warning">Pendiente</span>
                                                            <?php elseif ($consulta['estado'] == 'confirmada'): ?>
                                                                <span class="badge badge-info estado-confirmada" data-id="<?php echo $consulta['id']; ?>">Confirmada</span>
                                                                <i class="fas fa-link ml-2 text-info"></i>
                                                            <?php elseif ($consulta['estado'] == 'en proceso'): ?>
                                                                <span class="badge badge-primary estado-en-proceso" data-id="<?php echo $consulta['id']; ?>">En Proceso</span>
                                                                <i class="fas fa-link ml-2 text-primary"></i>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">No hay consultas en estado pendiente, confirmada o en proceso.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- Tarjeta para Ver Consultas Anteriores -->
                        <div class="col-md-4 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas fa-history fa-3x mb-3"></i>
                                    <h5 class="card-title">Historial Consultas</h5>
                                    <p class="card-text">Revisa el historial de consultas enviadas.</p>
                                    <button id="openHistorial" class="btn btn-primary">Ver historial</button>
                                </div>
                            </div>
                        </div>
                        <!-- Overlay oscuro para el historial -->
                        <div id="overlayHistorial" class="overlay"></div>

                        <div id="offcanvasHistorial" class="offcanvas">
                            <div class="offcanvas-content">
                                <span id="closeHistorial" class="close-btn">&times;</span>
                                <h5>Historial de Consultas</h5>
                                <p class="text-center">
                                    Aquí solo podrás ver el historial de tus consultas finalizadas y canceladas.
                                    Revisa los detalles de cada consulta completada o las que fueron canceladas por ti o el sistema.
                                </p>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Asunto</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $historialConsultas = $controller->getHistorialConsultas();
                                            if (count($historialConsultas) > 0): ?>
                                                <?php foreach ($historialConsultas as $consulta): ?>
                                                    <tr>
                                                        <td><?php echo $consulta['asunto']; ?></td>
                                                        <td><?php echo $consulta['fecha_servicio']; ?></td>
                                                        <td><?php echo $consulta['hora_servicio']; ?></td>
                                                        <td>
                                                            <?php if ($consulta['estado'] == 'cancelada'): ?>
                                                                <span class="badge badge-danger">Cancelada</span>
                                                            <?php elseif ($consulta['estado'] == 'finalizada'): ?>
                                                                <span class="badge badge-success">Finalizada</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">No hay consultas canceladas o finalizadas.</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario para enviar consultas -->
                <div class="container mt-2 d-none" id="mensajeConsulta">
                    <div class="p-3 rounded shadow-lg bg-light border-left border-primary">
                        <h2 class="font-weight-bold text-primary">Envía tu Consulta</h2>
                        <p class="mb-1 lead font-weight-bold text-dark">
                            Completa el siguiente formulario para enviar tu consulta. Asegúrate de proporcionar toda la información necesaria para que podamos ayudarte de manera efectiva.
                        </p>
                    </div>

                    <form method="POST" action="../controllers/queries_controller.php" class="mt-4 p-4 bg-white rounded shadow-sm">
                        <div class="form-row align-items-end">
                            <div class="form-group col-md-8">
                                <label for="asunto" class="font-weight-bold">Asunto de la Consulta</label>
                                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Describe brevemente el asunto de tu consulta" required>
                            </div>

                            <div class="form-group col-md-4" id="abogadoSection">
                                <label for="abogado" class="font-weight-bold">Abogado a Cargo</label>
                                <button type="button" class="btn btn-primary btn-block" id="abogadoButton" data-toggle="tooltip" data-placement="top" title="Elige un Abogado">Elige un Abogado</button>
                                <input type="hidden" id="abogado" name="abogado" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="font-weight-bold">Descripción Detallada</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Explica en detalle tu consulta" required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fecha" class="font-weight-bold">Selecciona la Fecha en la que deseas realizar tu consulta</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hora" class="font-weight-bold">Selecciona la Hora en la que deseas realizar tu consulta</label>
                                <input type="time" class="form-control" id="hora" name="hora" required>
                            </div>
                        </div>

                        <!-- Campo oculto para el tipo de consulta (público o privado) -->
                        <input type="hidden" id="tipo_consulta" name="tipo_consulta" value="publico">

                        <!-- Alineación de botones -->
                        <div class="form-row mt-3">
                            <div class="col-12 col-md-6 text-left mb-2 mb-md-0">
                                <button id="volverButton" class="btn btn-secondary w-100 w-md-auto">Volver a Herramientas</button>
                            </div>
                            <div class="col-12 col-md-6 text-left text-md-right">
                                <button type="submit" class="btn btn-primary w-100 w-md-auto">Enviar Consulta</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal para seleccionar Abogado -->
                <div class="modal fade" id="abogadoModal" tabindex="-1" role="dialog" aria-labelledby="abogadoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="abogadoModalLabel">Abogados Disponibles</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="abogadoCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        if (count($abogados) > 0) {
                                            $active = 'active';
                                            foreach ($abogados as $abogado) {
                                                echo '
                        <div class="carousel-item ' . $active . '">
                            <img src="' . $abogado['profile_image'] . '" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Abogado ' . $abogado['username'] . '">
                            <div class="text-center mt-3">
                                <h5>' . $abogado['username'] . '</h5>
                                <p>Abogado con DNI: ' . $abogado['dni'] . '</p>
                            </div>
                        </div>';
                                                $active = '';
                                            }
                                        } else {
                                            echo '<p>No se encontraron abogados disponibles.</p>';
                                        }
                                        ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#abogadoCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" href="#abogadoCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </div>

                                <div class="text-center mt-4">
                                    <!-- Botón para seleccionar abogado -->
                                    <button class="btn btn-success seleccionar-abogado d-inline-block mr-3">Seleccionar</button>

                                    <!-- Botón para seleccionar abogado aleatorio con margen izquierdo -->
                                    <button id="randomAbogado" class="btn btn-warning d-inline-block">Aleatorio</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para éxito -->
                <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                                <h5 class="modal-title" id="successModalLabel">Consulta enviada exitosamente</h5>
                                <p>Tu consulta ha sido registrada correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="okButton">OK</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para errores -->
                <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <i class="fas fa-times-circle fa-3x text-danger mb-3"></i>
                                <h5 class="modal-title" id="errorModalLabel">Error al enviar la consulta</h5>
                                <p>Hubo un problema al registrar tu consulta. Inténtalo nuevamente.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para advertencia de selección de abogado -->
                <div class="modal fade" id="abogadoAdvertenciaModal" tabindex="-1" role="dialog" aria-labelledby="abogadoAdvertenciaModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <i class="fas fa-exclamation-circle fa-3x text-warning mb-3"></i>
                                <h5 class="modal-title" id="abogadoAdvertenciaModalLabel">Debe seleccionar un abogado o la opción "Aleatorio"</h5>
                                <p>Por favor, seleccione una opción antes de enviar la consulta.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php include '../../assets/includes/footer.php'; ?>
        </div>

        <?php include '../../assets/includes/scrolltop.php'; ?>
        <?php include '../../assets/includes/logout.php'; ?>
        <?php include '../../assets/includes/scripts.php'; ?>

        <script>
            $(document).ready(function() {
                // Función para actualizar el contenido del offcanvas
                function actualizarOffcanvas(mensaje) {
                    // Limpiar solo el contenido del offcanvas sin afectar la "X" ni el contenedor
                    $('#offcanvasEstado .offcanvas-content').find('h5, p, .table-responsive, .volver-estados').remove();

                    // Añadir nuevo contenido con detalles ficticios
                    $('#offcanvasEstado .offcanvas-content').append('<h5 class="text-center">' + mensaje + '</h5>');
                    $('#offcanvasEstado .offcanvas-content').append('<p class="text-center">La reunión se hará por este link de Meet:</p>');
                    $('#offcanvasEstado .offcanvas-content').append('<p class="text-center"><a href="https://meet.example.com/meeting-link" target="_blank">https://meet.example.com/meeting-link</a></p>');
                    $('#offcanvasEstado .offcanvas-content').append('<p class="text-center">#Sistema en proceso</p>');

                    // Añadir un botón para volver a la lista de estados
                    $('#offcanvasEstado .offcanvas-content').append('<button class="btn btn-secondary mt-3 volver-estados">Volver a mirar estados</button>');
                }

                // Función para restaurar el contenido original del offcanvas (lista de estados)
                function mostrarEstadosOriginales() {
                    // Limpiar el contenido del offcanvas y restaurar la tabla original
                    $('#offcanvasEstado .offcanvas-content').find('h5, p, .table-responsive, .volver-estados').remove();

                    // Añadir nuevamente el contenido de la tabla de estados
                    var tablaEstados = `
        <h5>Estado de Consultas</h5>
        <p>Estas son las consultas para su seguimiento. Si tienen un ícono de URL o están en los estados 'confirmada' o 'en proceso', significa que su consulta se va a tomar. Si ya tienen uno de esos íconos o están en esos estados, presionen la celda de estado o el fondo verde para ver más detalles sobre dónde se tomará su consulta.</p>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Asunto</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $estadoConsultas = $controller->getEstadoConsultas();
                    if (count($estadoConsultas) > 0): ?>
                        <?php foreach ($estadoConsultas as $consulta): ?>
                            <tr>
                                <td><?php echo $consulta['asunto']; ?></td>
                                <td><?php echo $consulta['fecha_servicio']; ?></td>
                                <td><?php echo $consulta['hora_servicio']; ?></td>
                                <td>
                                    <?php if ($consulta['estado'] == 'pendiente'): ?>
                                        <span class="badge badge-warning">Pendiente</span>
                                    <?php elseif ($consulta['estado'] == 'confirmada'): ?>
                                        <span class="badge badge-info estado-confirmada" data-id="<?php echo $consulta['id']; ?>">Confirmada</span>
                                        <i class="fas fa-link ml-2 text-info"></i>
                                    <?php elseif ($consulta['estado'] == 'en proceso'): ?>
                                        <span class="badge badge-primary estado-en-proceso" data-id="<?php echo $consulta['id']; ?>">En Proceso</span>
                                        <i class="fas fa-link ml-2 text-primary"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay consultas en estado pendiente, confirmada o en proceso.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        `;

                    $('#offcanvasEstado .offcanvas-content').append(tablaEstados);
                }

                // Aplicar color de fondo verde suave a las celdas con estado "Confirmada" o "En Proceso"
                $('td:has(.badge)').each(function() {
                    var estado = $(this).find('.badge').text().trim();

                    // Si el estado es "Confirmada" o "En Proceso", aplicar el color verde
                    if (estado === 'Confirmada' || estado === 'En Proceso') {
                        $(this).addClass('estado-verde'); // Añadir la clase de color verde suave
                    }
                });

                // Evento cuando se hace clic en las celdas que contienen los estados "Confirmada" o "En Proceso"
                $(document).on('click', 'td:has(.badge)', function() {
                    var estado = $(this).find('.badge').text().trim(); // Obtener el texto del estado

                    // Si el estado es "Confirmada" o "En Proceso", abrir el offcanvas
                    if (estado === 'Confirmada' || estado === 'En Proceso') {
                        actualizarOffcanvas("Hola Bienvenido a detalles");
                        $('#offcanvasEstado').show(); // Mostrar el offcanvas
                    }
                });

                // Cerrar el offcanvas cuando se presiona la X
                $('#closeMenu').on('click', function() {
                    $('#offcanvasEstado').hide();
                });

                // Manejar el botón "Volver a mirar estados"
                $(document).on('click', '.volver-estados', function() {
                    // Restaurar el contenido original con la tabla de estados
                    mostrarEstadosOriginales();
                });

                // Asegurarse de que el offcanvas pueda abrirse normalmente cada vez
                $('#openMenu').on('click', function() {
                    $('#offcanvasEstado').show();
                });
            });

            $(document).ready(function() {
                let abogadoSeleccionado = false; // Variable para verificar si se seleccionó un abogado o la opción aleatoria

                // Inicializar el tooltip de Bootstrap
                $('[data-toggle="tooltip"]').tooltip();

                // Manejar el click del botón de elegir abogado
                $('#abogadoButton').on('click', function(e) {
                    if (!$(this).prop('disabled')) { // Si el botón no está deshabilitado
                        $('#abogadoModal').modal('show'); // Abrir el modal
                    }
                });

                // Manejar la selección de abogado
                $('.seleccionar-abogado').click(function() {
                    abogadoSeleccionado = true; // Se ha seleccionado un abogado
                    var activeItem = $('#abogadoCarousel .carousel-item.active');
                    var dni = activeItem.find('p').text().replace('Abogado con DNI: ', '');
                    var nombre = activeItem.find('h5').text();

                    // Asignar el abogado seleccionado al formulario
                    $('#abogado').val(dni);
                    $('#tipo_consulta').val('privado'); // Cambiar el tipo de consulta a privado
                    $('label[for="abogado"]').html('El que va a tomar su consulta será el abogado <span class="text-primary">' + nombre + '</span>'); // Texto en azul
                    $('#abogadoButton').text('Cambiar de abogado').addClass('abogado-seleccionado');
                    $('#abogadoModal').modal('hide');
                });

                // Manejar la selección de abogado aleatorio
                $('#randomAbogado').click(function() {
                    abogadoSeleccionado = true; // Se ha seleccionado la opción aleatoria
                    $('#abogado').val(''); // No se asigna abogado específico
                    $('#tipo_consulta').val('publico'); // Cambiar el tipo de consulta a público
                    $('label[for="abogado"]').html('Su consulta será asignada a un abogado <span class="text-danger">Aleatorio</span>.'); // Texto en rojo
                    $('#abogadoButton').text('Elegir un Abogado').addClass('abogado-seleccionado');
                    $('#abogadoModal').modal('hide');
                });

                // Manejar el envío del formulario con validación para el abogado
                $('form[action="../controllers/queries_controller.php"]').on('submit', function(e) {
                    e.preventDefault(); // Evitar el envío del formulario

                    // Verificar si se ha seleccionado un abogado o la opción aleatoria
                    if (!abogadoSeleccionado) {
                        // Mostrar el modal de advertencia si no se ha seleccionado un abogado ni aleatorio
                        $('#abogadoAdvertenciaModal').modal('show');
                    } else {
                        var form = $(this);

                        $.ajax({
                            type: form.attr('method'),
                            url: form.attr('action'),
                            data: form.serialize(),
                            success: function(response) {
                                // Si la respuesta es exitosa, mostrar el modal de éxito
                                if (response.includes("Consulta enviada exitosamente")) {
                                    $('#successModal').modal('show');
                                } else {
                                    // Si hay un error en la respuesta, mostrar el modal de error
                                    $('#errorModal').modal('show');
                                }
                            },
                            error: function() {
                                // Si ocurre un error en el servidor, mostrar el modal de error
                                $('#errorModal').modal('show');
                            }
                        });
                    }
                });

                // Manejar el click en el botón "OK" del modal de éxito
                $('#okButton').on('click', function() {
                    // Recargar la página después de que el usuario presione "OK"
                    window.location.reload();
                });

                // Cuando se cierre el modal de éxito, redirigir a la sección de herramientas y limpiar el formulario
                $('#successModal').on('hidden.bs.modal', function() {
                    $('#mensajeConsulta').addClass('d-none');
                    $('#consultasSection').removeClass('d-none');

                    // Limpiar el formulario
                    $('form[action="../controllers/queries_controller.php"]')[0].reset();
                    $('#abogadoButton').prop('disabled', true).text('Elija un Abogado').removeClass('abogado-seleccionado');
                    $('label[for="abogado"]').text('Abogado');
                    $('#abogadoButton').tooltip('enable'); // Volver a habilitar el tooltip cuando el botón esté deshabilitado
                });

                // Manejar el botón de volver en la sección de consulta
                $('#volverButton').click(function() {
                    $('#mensajeConsulta').addClass('d-none');
                    $('#consultasSection').removeClass('d-none');

                    // Limpiar el formulario al volver
                    $('form[action="../controllers/queries_controller.php"]')[0].reset();
                    $('#abogadoButton').prop('disabled', false).text('Elegir un Abogado').removeClass('abogado-seleccionado'); // Asegúrate de habilitar el botón aquí
                    $('label[for="abogado"]').text('Abogado');
                    $('#abogadoButton').tooltip('enable'); // Volver a habilitar el tooltip cuando el botón esté habilitado
                });
            });
        </script>


        <style>
            /* Encabezado dentro del offcanvas */
            .offcanvas h5 {
                font-size: 1.8rem;
                color: #007bff;
                margin-bottom: 20px;
                text-align: center;
                font-weight: bold;
            }

            /* Descripción de instrucciones */
            .offcanvas p {
                font-size: 1.2rem;
                color: #6c757d;
                margin-bottom: 20px;
                text-align: center;
            }

            /* Media query para pantallas más pequeñas */
            @media (max-width: 768px) {

                /* Encabezado más pequeño para móviles */
                .offcanvas h5 {
                    font-size: 1.5rem;
                }

                /* Descripción más pequeña en móviles */
                .offcanvas p {
                    font-size: 1rem;
                }

                /* Ajuste de los botones */
                .offcanvas .btn {
                    font-size: 1rem;
                    padding: 10px;
                }
            }


            /* Tabla personalizada */
            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                background-color: #fff;
                border-collapse: collapse;
                border: none;
            }

            .table thead th {
                background-color: #007bff;
                color: white;
                font-weight: bold;
                text-transform: uppercase;
                padding: 15px;
            }

            .table td {
                padding: 15px;
                vertical-align: middle;
                text-align: center;
                font-size: 1rem;
                border: 1px solid #dee2e6;
            }

            /* Hover effect on rows */
            .table-hover tbody tr:hover {
                background-color: #f1f1f1;
            }

            /* Badges for the different statuses */
            .badge {
                padding: 10px;
                font-size: 0.9rem;
                border-radius: 8px;
            }

            /* Different color schemes for different statuses */
            .badge-warning {
                background-color: #ffc107;
                color: #343a40;
            }

            .badge-info {
                background-color: #17a2b8;
                color: white;
            }

            .badge-primary {
                background-color: #007bff;
                color: white;
            }

            .badge-danger {
                background-color: #dc3545;
                color: white;
            }

            .badge-success {
                background-color: #28a745;
                color: white;
            }

            /* Adding icons next to the status badges */
            .badge i {
                margin-left: 5px;
            }

            /* Green background for confirmed or in-process statuses */
            .estado-verde {
                background-color: #e8f8f5;
                color: #007bff;
                font-weight: bold;
                border-left: 4px solid #007bff;
            }

            /* Centering and spacing for buttons inside offcanvas */
            .offcanvas .btn {
                display: block;
                width: 100%;
                margin-top: 20px;
                font-size: 1.2rem;
                font-weight: bold;
                background-color: #007bff;
                color: white;
            }

            .offcanvas .btn:hover {
                background-color: #0056b3;
            }

            /* Ensuring everything is well-spaced */
            .offcanvas-content {
                padding: 20px;
            }

            .estado-verde {
                background-color: #d4edda;
                /* Verde claro */
                transition: background-color 0.3s ease;
                /* Transición suave */
            }

            .abogado-seleccionado {
                background-color: orange;
                border-color: orange;
            }

            .text-danger {
                color: red;
            }

            .text-primary {
                color: blue;
            }

            /* Estilo del botón formal */
            #abogadoButton {
                background-color: #f8f9fa;
                /* Fondo gris claro */
                color: #343a40;
                /* Texto en gris oscuro */
                border: 2px solid #343a40;
                /* Borde gris oscuro */
                border-radius: 5px;
                /* Bordes sutilmente redondeados */
                padding: 12px 20px;
                /* Espaciado interno */
                font-size: 16px;
                /* Tamaño del texto adecuado */
                font-weight: 500;
                /* Negrita moderada */
                transition: all 0.3s ease;
                /* Transición suave para hover */
            }

            /* Efecto hover formal */
            #abogadoButton:hover {
                background-color: #343a40;
                /* Fondo gris oscuro */
                color: #ffffff;
                /* Texto en blanco */
                cursor: pointer;
                /* Cambia el cursor a pointer */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                /* Sombra suave para darle profundidad */
            }

            /* Si está deshabilitado */
            #abogadoButton:disabled {
                background-color: #e9ecef;
                /* Color gris claro si está deshabilitado */
                color: #adb5bd;
                /* Texto gris claro */
                border-color: #adb5bd;
                /* Borde gris claro */
                cursor: not-allowed;
                /* Indica que no es clickable */
                opacity: 0.7;
                /* Disminuye la opacidad */
            }
        </style>
</body>

</html>