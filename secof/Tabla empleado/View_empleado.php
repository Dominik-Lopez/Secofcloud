<?php
//empelado
//empelado_idpersona, empelado_tipo_documento, empelado_idDepartamento
// VARIABLES
//$empid $emptd $empidep 
require_once 'model_empleado.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new empelado();
  $update->Update_empelado($_POST["empelado_idpersona"], $_POST["empelado_idpersona2"] , $_POST["empelado_tipo_documento"], $_POST["empelado_idDepartamento"]);
   break;

   case 'registrar';

   $insert=new empelado();
   $insert->Inser_empelado($_POST["empelado_idpersona"],$_POST["empelado_tipo_documento"], $_POST["empelado_idDepartamento"]);
   break;

    case 'ELIMINAR';
   $delete=new empelado();
   $delete-> Delete_empelado($_GET["empelado_idpersona"]);

     break;

  // CASO PARA METODO EDITAR 
       case 'editar':
      $capt = $_GET["empelado_idpersona"];
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
<?php include_once "../nav_proyect/Cabecera_admin.php"; ?>
 <br><a href="?action=ver&m=1" class="btn1">Consolidado</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>tabla consolidado</h2>
     <label> consolidado</label>
    <br>
     <input type="Number" name="empelado_idpersona" placeholder="id" >
     <div>
    <br>
     <label></label> 
     <input type="Text" name="empelado_tipo_documento"  placeholder="tipo documento">
    <br>
     <label></label>
     <input type="text" name="empelado_idDepartamento"  placeholder="id Dep">
    <br>


<!--     </div>
     <label>Estado:</label>
     <br>Activate <input type="radio" name="estado" value="1" checked>
     inactive <input type="radio" name="estado" value="0">-->
        <p><input class="submit - button" type="submit" value="save" onclick="this.form.action = '?action=registrar';"/>
    </form>
</div>  
<?php } ?> <!--FIN - Formulario nuevo registro --> 

<!-- Formulario actualizaar registro -->
     <?php if( !empty($_GET['empelado_idpersona']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 
<form action="#" method="POST" enctype="multipart/form-data">

<?php $sql1= "SELECT * FROM empelado WHERE empelado_idpersona = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>Actualizar Consilidado</h2>
<!--<img src="<?php //echo $row["image_m_a"]; ?>" width="100" height="100"><p>-->
<label> Consolidado </label> 
<input type="number" name="empelado_idpersona2" value="<?php echo $row["empelado_idpersona"];?>" style="display: none">
<input type="number" name="empelado_idpersona" value="<?php echo $row["empelado_idpersona"];?>" placeholder="id" required>


<input type="text" name="empelado_tipo_documento" value="<?php echo $row["empelado_tipo_documento"];?>" placeholder="" required>

<input type="date" name="empelado_idDepartamento" value="<?php echo $row["empelado_idDepartamento"];?>" placeholder="" required>







<!--<label> MACHINE - Accesory photo</label>
<p><input type="file" name="image_m_a" required>-->
<!--<p><label>MACHINE - ACCESSORY STATE:</label>

 <br> Active<input type="radio" name="estado" value="1"<?php //echo $row['Usuario_tipodoc'] == '1' ? 'checked' : ''?> >
 inactive<input type="radio" name="estado" value="0"<?php //echo $row['Usuario_tipodoc'] == '0' ? 'checked' : ''?> >-->

 <p><input class="submit-button" type="submit" value="update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM empelado";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <!--<img src="<?php// echo $row["tip_doc"]; ?>"<br>-->
 <?php echo $row['empelado_idpersona']."      ";
       echo $row['empelado_tipo_documento']."     ";
       echo $row['empelado_idDepartamento']."     ";


 //if ($row['Usuario_tipodoc']== 1){ 
 //echo "Active" . "<br>";
 //  }else{
 //echo "inactive" . "<br>";
 //}?>

<a href="?action=editar&empelado_idpersona=<?php echo $row["empelado_idpersona"];?>">update</a>

<a href="?action=ELIMINAR&empelado_idpersona=<?php echo $row["empelado_idpersona"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>

</body>
</html>
