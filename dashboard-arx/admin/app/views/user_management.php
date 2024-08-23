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



        <div class="container-fluid">
          <!-- datatables example -->
          <h1 class="h3 mb-2 text-gray-800">Gestión de Usuarios</h1>
          <p class="mb-4">Aquí podrás gestionar las cuentas, cambiar la información, establecer permisos y controlar quién tiene acceso a qué.</p>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addUserModal">
                  <i class="fas fa-plus"></i> Agregar nuevo usuario
                </button>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>DNI</th>
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
                        echo '<td>' . htmlspecialchars($row['dni']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['password']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['usertype']) . '</td>';
                        echo '<td>';
                        echo '<form action="../controllers/user_controller.php" method="post" style="display:inline-block;">';
                        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($row['id']) . '">';
                        echo '<button type="submit" name="delete_btn" class="btn btn-danger mr-1" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                        echo '</form>';
                        echo '<a href="user_edit.php?token=' . htmlspecialchars($encodedId) . '" class="btn btn-warning mr-1" title="Editar"><i class="fas fa-edit"></i></a>';
                        echo '<a href="user_view.php?token=' . htmlspecialchars($encodedId) . '" class="btn btn-info" title="Ver"><i class="fas fa-eye"></i></a>';
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

      <!-- Modales -->
      <?php include 'plugins/user_modals.php'; ?>

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