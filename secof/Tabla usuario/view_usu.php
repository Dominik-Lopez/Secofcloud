<?php

require_once 'modelo_usu.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new usuario();
  $update->Update_usuario($_POST["usu_idper"], $_POST["usu_idper2"] , $_POST["usu_tip_doc"], $_POST["usu_empresa"]);
   break;

   case 'registrar';

   $insert=new usuario();
   $insert->Inser_usuario($_POST["usu_idper"],$_POST["usu_tip_doc"],$_POST["usu_empresa"]);
   break;

    case 'ELIMINAR';
   $delete=new usuario();
   $delete-> Delete_usuario($_GET["usu_idper"]);

     break;

  // CASO PARA METODO EDITAR 
       case 'editar':
      $capt = $_GET["usu_idper"];
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
 <br><a href="?action=ver&m=1" class="btn1">tabla Usuario</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>tabla Usuario</h2>
     <label> ID Usuario:</label>
     <input type="text" name="usu_idper" placeholder="ID persona" >
     <div>
     <label> tipo documento</label>
     <p><input type="Text" name="usu_tip_doc"  placeholder="tipo documento">
     </div>
     <p><label>id empresa:</label>
     <p><input type="Text" name="usu_empresa"  placeholder=" ID empresa">
     <p><input class="submit - button" type="submit" value="save" onclick="this.form.action = '?action=registrar';"/>
    </form>
</div>  
<?php } ?> <!--FIN - Formulario nuevo registro --> 

<!-- Formulario actualizaar registro -->
     <?php if( !empty($_GET['usu_idper']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 <form action="#" method="POST" enctype="multipart/form-data">
<?php $sql1= "SELECT * FROM usuario WHERE Persona_idpersona = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>UPDATE Tabla</h2>
<!--<img src="<?php //echo $row["image_m_a"]; ?>" width="100" height="100"><p>-->
<label> Usuario </label> 
<input type="text" name="usu_idper2" value="<?php echo $row["Persona_idpersona"];?>" style="display: none">
<input <type="text" name="usu_idper" value="<?php echo $row["Persona_idpersona"];?>" placeholder="ID usuario" required>


<input type="text" name="usu_tip_doc" value="<?php echo $row["Usuario_tipo_documento"];?>" placeholder="tipo documento" required>

<input type="text" name="usu_empresa" value="<?php echo $row["usu_idempresa_contra"];?>" placeholder="ID empresa" required>

 <p><input class="submit-button" type="submit" value= "update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM usuario";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 
 <?php echo $row['Persona_idpersona']."      ";
       echo $row['Usuario_tipo_documento']."     ";
       echo $row['usu_idempresa_contra']."     ";


?>

<a href="?action=editar&usu_idper=<?php echo $row["Persona_idpersona"];?>">update</a>

<a href="?action=ELIMINAR&usu_idper=<?php echo $row["Persona_idpersona"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>




