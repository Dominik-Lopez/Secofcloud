<?php

require_once 'modelo_emp.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new empresa_contra();
  $update->Update_empresa_contra($_POST["id_emp"], $_POST["id_emp2"] , $_POST["Nombre"], $_POST["Direccion"],$_POST["Telefono"],$_POST["Email"]);
   break;

   case 'registrar';

   $insert=new empresa_contra();
   $insert->Inser_empresa_contra($_POST["id_emp"], $_POST["Nombre"], $_POST["Direccion"],$_POST["Telefono"],$_POST["Email"]);
   break;

    case 'ELIMINAR';
   $delete=new empresa_contra();
   $delete-> Delete_empresa_contra($_GET["id_emp"]);

     break;

  // CASO PARA METODO EDITAR 
       case 'editar':
      $capt = $_GET["id_emp"];
    break;   
    }
  }

?>
<!DOCTYPE html>
<html lanag="es">
<head>
 <title>SECOFCLOUD</title>
 <link rel="stylesheet" type="text/css" href="../css/style_crud.css">

</head>
<body>
 <br><a href="?action=ver&m=1" class="btn1">tabla Empresa</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>tabla Empresa</h2>
     <label> ID Empresa:</label>
     <input type="text" name="id_emp" placeholder="ID Empresa" >
     <div>
     <label> Nombre</label>
     <p><input type="Text" name="Nombre"  placeholder="Nombre Empresa">
     </div>
     <p><label>Direccion:</label>
     <p><input type="Text" name="Direccion"  placeholder=" Direccion">
     <p><label>Telefono:</label>
     <p><input type="Text" name="Telefono"  placeholder=" Telefono">
     <p><label>Email:</label>
     <p><input type="Text" name="Email"  placeholder=" Correo electronico">
     <p><input class="submit - button" type="submit" value="save" onclick="this.form.action = '?action=registrar';"/>
    </form>
</div>  
<?php } ?> <!--FIN - Formulario nuevo registro --> 

<!-- Formulario actualizaar registro -->
     <?php if( !empty($_GET['id_emp']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 <form action="#" method="POST" enctype="multipart/form-data">
<?php $sql1= "SELECT * FROM empresa_contra WHERE idempresa_contra = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>UPDATE Tabla</h2>
<!--<img src="<?php //echo $row["image_m_a"]; ?>" width="100" height="100"><p>-->
<label> ID Empresa </label> 
<input type="text" name="id_emp2" value="<?php echo $row["idempresa_contra"];?>" style="display: none">
<input type="text" name="id_emp" value="<?php echo $row["idempresa_contra"];?>" placeholder="ID Empresa" required>


<input type="text" name="Nombre" value="<?php echo $row["Nombre"];?>" placeholder="Nombre" required>

<input type="text" name="Direccion" value="<?php echo $row["direccion"];?>" placeholder="Direccion" required>

<input type="text" name="Telefono" value="<?php echo $row["telefono"];?>" placeholder="telefono" required>

<input type="text" name="Email" value="<?php echo $row["email"];?>" placeholder="Correo" required>
 <p><input class="submit-button" type="submit" value= "update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM empresa_contra";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 
 <?php echo $row['idempresa_contra']."      ";
       echo $row['Nombre']."     ";
       echo $row['direccion']."     ";
       echo $row['telefono']."     ";
       echo $row['email']."     ";


?>

<a href="?action=editar&idempresa_contra=<?php echo $row["idempresa_contra"];?>">update</a>

<a href="?action=ELIMINAR&id_emp=<?php echo $row["idempresa_contra"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>




