<?php   

// include ('seguridad.php');

// Hacemos la conexion con la bd local
$connection = mysqli_connect("localhost","root","","arxatec");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];


    if($password === $cpassword)
    {
        $query = "INSERT INTO register (username,email,password,usertype) VALUES  ('$username','$email','$password','$usertype')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            // echo "Saved";
            $_SESSION['success'] = "Agregado correctamente";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "No se pudo registrar";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "El password y el cpassword no son iguales, corriguelo amiguito xd";
        header('Location: register.php');  
    }

    
}

// Funcion Editar

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username']; 
    $email = $_POST['edit_email']; 
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['update_usertype'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertypeupdate' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "El dato fue actualizado correctamente";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "El dato no fue actualizado";
        header('Location: register.php');
    }
}



// Funcion Borrar

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "El dato fue eliminado pipi";
        
    }
    else
    {
        $_SESSION['status'] = "El dato no se pudo eliminar ";
       
    }   

    header('Location: register.php');   

}





?>




