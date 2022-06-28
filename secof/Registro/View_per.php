<?php
//persona
//id_persona, username, Passsword, Nom_persona, Seg_nombre, apellido_per, seg_apellido, direccion, email, telefono, tipo_documento_tipo_doc, fk_rol
require_once 'modelo_per.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new persona();
  $update->Update_persona($_POST["id_persona"], $_POST["id_Persona2"],$_POST["username"], $_POST["Passsword"], $_POST["Nombre"], $_POST["seg_nombre"], $_POST["Apellido"], $_POST["Seg_apellido"], $_POST["Direccion"], $_POST["Email"], $_POST["telefono"], $_POST["Tipo_Documento_Tipo_Doc"], $_POST["fk_rol"]);
   break;

   case 'registrar';

   $inser=new persona();
   $inser->Inser_persona($_POST["id_persona"],$_POST["username"], $_POST["Passsword"], $_POST["Nom_Persona"], $_POST["Seg_nombre"], $_POST["Apellido_per"], $_POST["Seg_apellido"], $_POST["Direccion"], $_POST["Email"], $_POST["Telefono"], $_POST["Tipo_Documento_Tipo_Doc"], $_POST["fk_rol"]);
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
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link rel="stylesheet"  href="registro.css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
 <!--<br><a href="?action=ver&m=1" class="btn1">tabla Persona</a><br><br>-->

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>

<div class="sidenav">
         <div class="login-main-text">
            <h2>Pagina Registro</h2>
            <p>Registrate para el acceso</p>
         </div>
 </div>
  <div class="main">
    <div class="col-md-6 col-sm-12">
      <div class="login-form">
          <form action='#' method="POST" enctype="Multipart/form-data">
          <h2>Registro</h2> &nbsp;<div class="form-group">
            <p><label> Documento:</label>
            <p><input type="text" name="id_persona" class="form-control" placeholder="Numero Documento" >
          </div>
          <div class="form-group">
            <label>Tipo Documento:</label>
            <p><input type="Text" name="Tipo_Documento_Tipo_Doc" class="form-control" placeholder="Tipo Documento">
          </div>
          <div class="form-group">
            <label> Nombre</label>
            <p><input type="Text" name="Nom_Persona" class="form-control"  placeholder="Primer Nombre">
          </div>
          <div class="form-group">
            <label>Segundo Nombre:</label>
            <p><input type="Text" name="Seg_nombre" class="form-control"  placeholder="Segundo Nombre">
          </div>
          <div class="form-group">
            <label>Apellido:</label>
            <p><input type="Text" name="Apellido_per" class="form-control" placeholder="Primer Apellido">
          </div>
          <div class="form-group">
            <label>Segundo Apellido:</label>
            <p><input type="Text" name="Seg_apellido" class="form-control" placeholder="Segundo Apellido">
          </div>
          <div class="form-group">
            <label>Direccion:</label>
            <p><input type="Text" name="Direccion" class="form-control" placeholder="Direccion">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <p><input type="Text" name="Email" class="form-control" placeholder="Correo electronico">
          </div>
          <div class="form-group">
            <label>telefono:</label>
            <p><input type="Text" name="Telefono" class="form-control" placeholder="Numero de celular">
          </div>
          <div class="form-group">
            <label>Usuario:</label>
            <p><input type="Text" name="username" class="form-control" placeholder="Usuario">
          </div>
          <div class="form-group">
            <label>Contraseña:</label>
            <p><input type="Text" name="Passsword" class="form-control" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <label>Rol:</label>
            <p><input type="Text" name="fk_rol" class="form-control" placeholder="Rol al que pertenece">
          </div>
          <p><input class="btn btn-black" type="submit" value="Registrar" onclick="this.form.action = '?action=registrar';"/>

          </form>
        </div>
    </div>
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

<input type="Bigint" name="username" value="<?php echo $row["username"];?>" placeholder="username" required>

<input type="Bigint" name="Passsword" value="<?php echo $row["Passsword"];?>" placeholder="Passswordr" required>

<input type="Bigint" name="fk_rol" value="<?php echo $row["fk_rol"];?>" placeholder="fk_rol" required>

 <p><input class="submit-button" type="submit" value= "update" onclick= "this.form.action = '?action=actualizar';"/>

</form>
</div>
<?php
    } 
 }
 $sql1 = "SELECT * FROM persona";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <!--<h1>Tabla</h1><br>-->   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <?php //echo $row['id_persona']."      ";
       //echo $row['tipo_documento_tipo_doc']."     ";
       //echo $row['Nom_persona']."     ";
       //echo $row['Seg_nombre']."     ";
       //echo $row['apellido_per']."     ";
       //echo $row['seg_apellido']."     ";
       //echo $row['direccion']."     ";
       //echo $row['email']."     ";
       //echo $row['telefono']."     ";
       //echo $row['username']."     ";
       //echo $row['Passsword']."     ";
       //echo $row['fk_rol']."     ";
 ?>

<!--<a href="?action=Editar&id_persona=<?php //echo $row["id_persona"];?>">update</a>

<a href="?action=ELIMINAR&id_Persona=<?php //echo $row["id_persona"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>-->
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>






</body>
</html>
