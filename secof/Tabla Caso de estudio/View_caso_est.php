<?php
//caso_de_estudio
//idCaso_de_estudio,Usuario_idPersona,Usuario_tipodoc
require_once 'modelo_caso_est.php';
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
<?php include_once "../nav_proyect/Cabecera_admin.php"; ?>
 <br><a href="?action=ver&m=1" class="btn1">tabla Caso</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>Tabla Caso de Estudio</h2>
     <label> id Caso:</label>
     <p><input type="text" name="tip_doc" placeholder="Tipo Documento" >
     <div>
     <label> Id_persona</label>
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
<?php $sql1= "SELECT * FROM caso_de_estudio WHERE idCaso_de_estudio = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>UPDATE Tabla</h2>
<!--<img src="<?php //echo $row["image_m_a"]; ?>" width="100" height="100"><p>-->
<label> Tipo Documento </label> 
<input type="text" name="tip_doc2" value="<?php echo $row["idCaso_de_estudio"];?>" style="display: none">
<input type="text" name="tip_doc" value="<?php echo $row["idCaso_de_estudio"];?>" placeholder="Tipo de documento" required>


<input type="text" name="desc" value="<?php echo $row["Usuario_idPersona"];?>" placeholder="Descripcion" required>

<input type="text" name="estado" value="<?php echo $row["Usuario_tipodoc"];?>" placeholder="Tipo de documento" required>





<!--<label> MACHINE - Accesory photo</label>
<p><input type="file" name="image_m_a" required>-->
<p><label>MACHINE - ACCESSORY STATE:</label>

 <br> Active<input type="radio" name="estado" value="1"<?php echo $row['Usuario_tipodoc'] == '1' ? 'checked' : ''?> >
 inactive<input type="radio" name="estado" value="0"<?php echo $row['Usuario_tipodoc'] == '0' ? 'checked' : ''?> >

 <p><input class="submit-button" type="submit" value= "update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM caso_de_estudio";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <!--<img src="<?php// echo $row["tip_doc"]; ?>"<br>-->
 <?php echo $row['idCaso_de_estudio']."      ";
       echo $row['Usuario_idPersona']."     ";
       echo $row['Usuario_tipodoc']."     ";


 if ($row['Usuario_tipodoc']== 1){ 
 echo "Active" . "<br>";
   }else{
 echo "inactive" . "<br>";
 }?>

<a href="?action=editar&tip_doc=<?php echo $row["idCaso_de_estudio"];?>">update</a>

<a href="?action=ELIMINAR&tip_doc=<?php echo $row["idCaso_de_estudio"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>

</body>
</html>
