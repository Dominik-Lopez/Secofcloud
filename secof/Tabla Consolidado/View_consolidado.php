<?php
//consolidado
//idConsolidado	Tamano	fecha_subida	Version_
// VARIABLES
//$idcon $tam $fsub $ver
require_once 'modelo_consolidado.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new consolidado();
  $update->Update_consolidado($_POST["idConsolidado"], $_POST["idConsolidado2"] , $_POST["Tamano"], $_POST["fecha_subida"], $_POST["Version_"]);
   break;

   case 'registrar';

   $insert=new consolidado();
   $insert->Inser_consolidado($_POST["idConsolidado"],$_POST["Tamano"], $_POST["fecha_subida"], $_POST["Version_"]);
   break;

    case 'ELIMINAR';
   $delete=new consolidado();
   $delete-> Delete_consolidado($_GET["idConsolidado"]);

     break;

  // CASO PARA METODO EDITAR 
       case 'editar':
      $capt = $_GET["idConsolidado"];
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
 <br><a href="?action=ver&m=1" class="btn1">Consolidado</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>tabla consolidado</h2>
     <label> consolidado</label>
    <br>
     <input type="number" name="idConsolidado" placeholder="id" >
     <div>
    <br>
     <label></label> 
     <input type="Text" name="Tamano"  placeholder="tamaño">
    <br>
     <label></label>
     <input type="date" name="fecha_subida"  placeholder="fecha subida">
    <br>
     <label></label>
     <input type="number" name="Version_"  placeholder="Version">

<!--     </div>
     <label>Estado:</label>
     <br>Activate <input type="radio" name="estado" value="1" checked>
     inactive <input type="radio" name="estado" value="0">-->
        <p><input class="submit - button" type="submit" value="save" onclick="this.form.action = '?action=registrar';"/>
    </form>
</div>  
<?php } ?> <!--FIN - Formulario nuevo registro --> 

<!-- Formulario actualizaar registro -->
     <?php if( !empty($_GET['idConsolidado']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 
<form action="#" method="POST" enctype="multipart/form-data">

<?php $sql1= "SELECT * FROM consolidado WHERE idConsolidado = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>Actualizar Consilidado</h2>
<!--<img src="<?php //echo $row["image_m_a"]; ?>" width="100" height="100"><p>-->
<label> Consolidado </label> 
<input type="number" name="idConsolidado2" value="<?php echo $row["idConsolidado"];?>" style="display: none">
<input type="number" name="idConsolidado" value="<?php echo $row["idConsolidado"];?>" placeholder="id" required>


<input type="text" name="Tamano" value="<?php echo $row["Tamano"];?>" placeholder="" required>

<input type="date" name="fecha_subida" value="<?php echo $row["fecha_subida"];?>" placeholder="" required>

<input type="number" name="Version_" value="<?php echo $row["Version_"];?>" placeholder="" required>





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
 $sql1 = "SELECT * FROM consolidado";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <!--<img src="<?php// echo $row["tip_doc"]; ?>"<br>-->
 <?php echo $row['idConsolidado']."      ";
       echo $row['Tamano']."     ";
       echo $row['fecha_subida']."     ";
       echo $row['Version_']."     ";


 //if ($row['Usuario_tipodoc']== 1){ 
 //echo "Active" . "<br>";
 //  }else{
 //echo "inactive" . "<br>";
 //}?>

<a href="?action=editar&idConsolidado=<?php echo $row["idConsolidado"];?>">update</a>

<a href="?action=ELIMINAR&idConsolidado=<?php echo $row["idConsolidado"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>

</body>
</html>
