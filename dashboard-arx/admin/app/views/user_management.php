<?php
require_once('../../../../auth/php/security.php');
require_once '../controllers/user_controller.php';
include '../../assets/includes/header.php';


// Crear una instancia del controlador
$userController = new UserController();

// Obtener la lista de usuarios
$users = $userController->getAllUsers();
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

        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Agregar Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../controllers/user_controller.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="username">Nombre Completo</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese los nombres" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Correo Electrónico</label>
                      <input type="email" class="form-control checking_email" id="email" name="email" placeholder="Ingrese el correo" required>
                      <small class="error_email" style="color: red;"></small>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="password">Contraseña</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="confirm_password">Confirma la Contraseña</label>
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repita la contraseña" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="dni">DNI</label>
                      <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Dirección</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Ingrese la dirección">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="phone_number">Teléfono</label>
                      <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Ingrese el teléfono">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="additional_phone">Teléfono Adicional</label>
                      <input type="text" class="form-control" id="additional_phone" name="additional_phone" placeholder="Ingrese el teléfono adicional">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="date_of_birth">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                  </div>
                  <div class="form-group">
                    <label for="usertype">Tipo de Usuario</label>
                    <select class="form-control" id="usertype" name="usertype" required>
                      <option value="admin">Administrador</option>
                      <option value="cliente">Cliente</option>
                      <option value="abogado">Abogado</option>
                    </select>
                    <div class="mt-2">
                      <a href="https://eldni.com/pe/buscar-por-dni" target="_blank" style="color: #00BFFF; font-weight: bold;">Buscar datos por DNI</a> -
                      <a href="https://dni-peru.com/fecha-de-nacimiento-con-dni/" target="_blank" style="color: #FF0000; background-color: #FFFFFF; font-weight: bold;">Buscar fecha de nacimiento con DNI</a>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary" name="add_user">Guardar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <!-- datatables example -->
          <h1 class="h3 mb-2 text-gray-800">Gestión de Usuarios</h1>
          <p class="mb-4">Aquí podrás gestionar las cuentas, cambiar la información, establecer permisos y controlar quién tiene acceso a qué.</p>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">
                  Agregar nuevo usuario
                </button>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Contraseña</th>
                      <th>Tipo de Usuario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($users) {
                      while ($row = mysqli_fetch_assoc($users)) {
                        $encodedId = urlencode(base64_encode($row['id']));
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['password']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['usertype']) . '</td>';
                        echo '<td>';
                        echo '<form action="../controllers/user_controller.php" method="post" style="display:inline-block;">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($row['id']) . '">';
                        echo '<button type="submit" name="delete_btn" class="btn btn-danger mr-1">Borrar</button>';
                        echo '</form>';
                        echo '<a href="user_edit.php?token=' . htmlspecialchars($encodedId) . '" class="btn btn-warning mr-1">Editar</a>';
                        echo '<a href="user_view.php?token=' . htmlspecialchars($encodedId) . '" class="btn btn-info">Ver</a>';
                        echo '</td>';
                        echo '</tr>';
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
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