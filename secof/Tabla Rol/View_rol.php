<?php

//rol
//rol_usu, estado_rol

require_once 'modelo_rol.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new rol();
  $update->Update_rol($_POST["rol_usu"], $_POST["rol_usu2"] , $_POST["estado_rol"]);
   break;

   case 'registrar';

   $insert=new rol();
   $insert->Inser_rol($_POST["rol_usu"],$_POST["estado_rol"]);
   break;

    case 'ELIMINAR';
   $delete=new rol();
   $delete-> Delete_rol($_GET["rol_usu"]);

     break;

  // CASO PARA METODO EDITAR 
       case 'editar':
      $capt = $_GET["rol_usu"];
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
 <br><a href="?action=ver&m=1" class="btn1">tabla documento</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>Tab Rol</h2>
     <label> NUEVO ROL:</label>
     <input type="text" name="rol_usu" placeholder="rol_usu" >
     <div>
     <label></label>
     <p><input type="Text" name="estado_rol"  placeholder="estado_rol">
     </div>

        <p><input class="submit - button" type="submit" value="save" onclick="this.form.action = '?action=registrar';"/>
    </form>
</div>  
<?php } ?> <!--FIN - Formulario nuevo registro --> 

<!-- Formulario actualizaar registro -->
     <?php if( !empty($_GET['rol_usu']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 <form action="#" method="POST" enctype="multipart/form-data">
<?php $sql1= "SELECT * FROM rol WHERE rol_usu = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>Actualizar Rol</h2>

<label> Rol </label> 
<input type="text" name="rol_usu2" value="<?php echo $row["rol_usu"];?>" style="display: none">

<input type="text" name="rol_usu" value="<?php echo $row["rol_usu"];?>" placeholder="rol_usu" required>

<input type="text" name="estado_rol" value="<?php echo $row["estado_rol"];?>" placeholder="estado_rol" required>

 <p><input class="submit-button" type="submit" value= "update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM rol";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <?php echo $row['rol_usu']."      ";
       echo $row['estado_rol']."     ";

 //if ($row['Estado_tdoc']== 1){ 
 //echo "Active" . "<br>";
 //  }else{
 //echo "inactive" . "<br>";
 //}?>

<a href="?action=editar&rol_usu=<?php echo $row["rol_usu"];?>">update</a>

<a href="?action=ELIMINAR&rol_usu=<?php echo $row["rol_usu"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>

</body>
</html>
