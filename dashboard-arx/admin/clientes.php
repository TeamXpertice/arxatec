
<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');


?>

<?php
    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
    {
        echo "
        <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '".$_SESSION['success']."'
        });
        </script>
        ";
        unset($_SESSION['success']);
    }

    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
    {
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '".$_SESSION['status']."'
        });
        </script>
        ";
        unset($_SESSION['status']);
    }
    ?>



     
<!-- CRUD -->

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>

            <input type="hidden" name="usertype" value="admin" >


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="container-fluid">

<!-- datatables example -->

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Lista de clientes
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addadminprofile">
       Agregar nuevo cliente
      </button>
    </h6>
  </div>

  <div class="card-body">

  <!-- Alertas -->
  <?php 
  if(isset($_SESSION['success']) && $_SESSION['success'] !='')
  {
    echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
    unset($_SESSION['success']);
  }

  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
    echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
    unset($_SESSION['status']);
  }
  
  ?>
  
    <!-- Conexion con la bd local -->
    <div class="table-responsive">

    <?php   
    $connection = mysqli_connect("localhost","root","","arxatec");

    $query = "SELECT * FROM register";
    $query_run = mysqli_query($connection, $query);

    // Verificacion de bd

    if ($query_run === false) {
      die("Error en la consulta: " . mysqli_error($connection));
  }

    ?>

    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Contraseña</th>
          <th>UserType</th>
          <th>Editar</th>
          <th>Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
                ?>
            <tr>
            <td><?php echo $row['id']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="edit_btn" class="btn btn-success">Editar</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_btn" class="btn btn-danger">Borrar</button>
                </form>
            </td>
            
            </tr>
                <?php 
            }
        }
        else{
            echo "No Record Found";
        }
        ?>

        
      </tbody>


    </table>
    </div>
  </div>
</div>


</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
