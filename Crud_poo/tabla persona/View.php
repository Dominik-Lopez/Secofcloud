<?php

require_once 'modelo.php';
require_once 'conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new persona();
  $update->Update_persona($_POST["id_persona"], $_POST["id_Persona2"], $_POST["Nombre"], $_POST["seg_nombre"], $_POST["Apellido"], $_POST["Seg_apellido"], $_POST["Direccion"], $_POST["Email"], $_POST["telefono"], $_POST["Tipo_Documento_Tipo_Doc"]);
   break;

   case 'registrar';

   $inser=new persona();
   $inser->Inser_persona($_POST["id_persona"], $_POST["Nom_Persona"], $_POST["Seg_nombre"], $_POST["Apellido_per"], $_POST["Seg_apellido"], $_POST["Direccion"], $_POST["Email"], $_POST["Telefono"], $_POST["Tipo_Documento_Tipo_Doc"]);
   break;

    case 'ELIMINAR';
   $delete=new persona();
   $delete->Delete_pesona($_GET["id_Persona"]);
    break;


  // CASO PARA METODO EDITAR 
       case 'Editar':
      $capt = $_GET["id_persona"];
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
 <br><a href="?action=ver&m=1" class="btn1">tabla Persona</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>Tabla Persona</h2>
     <label> id:</label>
     <input type="text" name="id_persona" placeholder="Numero Documento" >
     <div>
     <p><label>Tipo Documento:</label>
     <p><input type="Text" name="Tipo_Documento_Tipo_Doc"  placeholder="Tipo Documento">
     </div>
     <label> Nombre</label>
     <p><input type="Text" name="Nom_Persona"  placeholder="Primer Nombre">
     <p><label>Segundo Nombre:</label>
     <p><input type="Text" name="Seg_nombre"  placeholder="Segundo Nombre">
     <p><label>Apellido:</label>
     <p><input type="Text" name="Apellido_per"  placeholder="Primer Apellido">
     <p><label>Segundo Apellido:</label>
     <p><input type="Text" name="Seg_apellido"  placeholder="Segundo Apellido">
     <p><label>Direccion:</label>
     <p><input type="Text" name="Direccion"  placeholder="Direccion">
     <p><label>Email:</label>
     <p><input type="Text" name="Email"  placeholder="Correo electronico">
     <p><label>telefono:</label>
     <p><input type="Text" name="Telefono"  placeholder="Numero de celular">
     <p><input class="submit - button" type="submit" value="save" onclick="this.form.action = '?action=registrar';"/>
    </form>
</div>  
<?php } ?> <!--FIN - Formulario nuevo registro --> 

<!-- Formulario actualizaar registro -->
     <?php if( !empty($_GET['id_persona']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 <form action="#" method="POST" enctype="multipart/form-data">
<?php $sql1= "SELECT * FROM persona WHERE id_persona = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>UPDATE Tabla</h2>
<label> Persona </label> 
<input type="text" name="id_persona" value="<?php echo $row["id_persona"];?>" style="display: none">
<input type="text" name="id_persona" value="<?php echo $row["id_persona"];?>" placeholder="Numero de documento" required>


<input type="text" name="Tipo_Documento_Tipo_Doc" value="<?php echo $row["Tipo_Documento_Tipo_Doc"];?>" placeholder="Tipo Documento" required>

<input type="text" name="Nombre" value="<?php echo $row["Nom_Persona"];?>" placeholder="Primer Nombre" required>

<input type="text" name="seg_nombre" value="<?php echo $row["Seg_nombre"];?>" placeholder="Segundo Nombre" required>

<input type="text" name="Apellido" value="<?php echo $row["Apellido_per"];?>" placeholder="Primer Apellido" required>

<input type="text" name="Seg_apellido" value="<?php echo $row["Seg_apellido"];?>" placeholder="Segundo Apellido" required>

<input type="text" name="Direccion" value="<?php echo $row["Direccion"];?>" placeholder=" Direccion" required>

<input type="text" name="Email" value="<?php echo $row["Email"];?>" placeholder="Correo Electronico" required>

<input type="Bigint" name="telefono" value="<?php echo $row["Telefono"];?>" placeholder="Numero Celular" required>
 <p><input class="submit-button" type="submit" value= "update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM persona";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <?php echo $row['id_persona']."      ";
       echo $row['tipo_documento_tipo_doc']."     ";
       echo $row['Nom_persona']."     ";
       echo $row['Seg_nombre']."     ";
       echo $row['apellido_per']."     ";
       echo $row['seg_apellido']."     ";
       echo $row['direccion']."     ";
       echo $row['email']."     ";
       echo $row['telefono']."     ";
 ?>

<a href="?action=Editar&id_persona=<?php echo $row["id_persona"];?>">update</a>

<a href="?action=ELIMINAR&id_Persona=<?php echo $row["id_persona"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>






</body>
</html>
