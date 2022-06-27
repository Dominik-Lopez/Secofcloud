<?php

require_once 'modelo.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new tipo_documento();
  $update->Update_tipo_documento($_POST["tip_doc"], $_POST["tip_doc2"] , $_POST["desc"], $_POST["estado"]);
   break;

   case 'registrar';

   $insert=new tipo_documento();
   $insert->Inser_tipo_documento($_POST["tip_doc"],$_POST["desc"], $_POST["estado"]);
   break;

    case 'ELIMINAR';
   $delete=new tipo_documento();
   $delete-> Delete_tipo_documento($_GET["tip_doc"]);

     break;

  // CASO PARA METODO EDITAR 
       case 'editar':
      $capt = $_GET["tip_doc"];
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
     <h2>tabla documento</h2>
     <label> Tipo de documento:</label>
     <input type="text" name="tip_doc" placeholder="Tipo Documento" >
     <div>
     <label> Descripcion</label>
     <p><input type="Text" name="desc"  placeholder="">
     </div>
     <p><label>Estado:</label>
     <br>Activate <input type="radio" name="estado" value="1" checked>
     inactive <input type="radio" name="estado" value="0">
        <p><input class="submit - button" type="submit" value="save" onclick="this.form.action = '?action=registrar';"/>
    </form>
</div>  
<?php } ?> <!--FIN - Formulario nuevo registro --> 

<!-- Formulario actualizaar registro -->
     <?php if( !empty($_GET['tip_doc']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 <form action="#" method="POST" enctype="multipart/form-data">
<?php $sql1= "SELECT * FROM tipo_documento WHERE tipo_documento = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>UPDATE Tabla</h2>

<label> Tipo Documento </label> 
<input type="text" name="tip_doc2" value="<?php echo $row["tipo_documento"];?>" style="display: none">
<input type="text" name="tip_doc" value="<?php echo $row["tipo_documento"];?>" placeholder="Tipo de documento" required>


<input type="text" name="desc" value="<?php echo $row["Des_tipodoc"];?>" placeholder="Descripcion" required>

<input type="text" name="estado" value="<?php echo $row["Estado_tdoc"];?>" placeholder="Tipo de documento" required>






<p><label>MACHINE - ACCESSORY STATE:</label>

 <br> Active<input type="radio" name="estado" value="1"<?php echo $row['Estado_tdoc'] == '1' ? 'checked' : ''?> >
 inactive<input type="radio" name="estado" value="0"<?php echo $row['Estado_tdoc'] == '0' ? 'checked' : ''?> >

 <p><input class="submit-button" type="submit" value= "update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM tipo_documento";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <?php echo $row['tipo_documento']."      ";
       echo $row['Des_tipodoc']."     ";
       echo $row['Estado_tdoc']."     ";


 if ($row['Estado_tdoc']== 1){ 
 echo "Active" . "<br>";
   }else{
 echo "inactive" . "<br>";
 }?>

<a href="?action=editar&tip_doc=<?php echo $row["tipo_documento"];?>">update</a>

<a href="?action=ELIMINAR&tip_doc=<?php echo $row["tipo_documento"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>

</body>
</html>
