<?php
//departamento
//idDepartamento	Nombre_dep	Numero_empleados	email	telefono
// VARIABLES
//$idep $nomdep $numemp $em $tel 
require_once 'model_dep.php';
require_once '../conexion/conexion.php';

$db = database::conectar();

if(isset($_REQUEST['action']))
{ switch ($_REQUEST['action'])
    {
  case 'actualizar':

  $update=new departamento();
  $update->Update_departamento($_POST["idDepartamento"], $_POST["idDepartamento2"] , $_POST["Nombre_dep"], $_POST["Numero_empleados"], $_POST["email"], $_POST["telefono"]);
   break;

   case 'registrar';

   $insert=new departamento();
   $insert->Inser_departamento($_POST["idDepartamento"],$_POST["Nombre_dep"], $_POST["Numero_empleados"], $_POST["email"], $_POST["telefono"]);
   break;

    case 'ELIMINAR';
   $delete=new departamento();
   $delete-> Delete_departamento($_GET["idDepartamento"]);

     break;

  // CASO PARA METODO EDITAR 
       case 'editar':
      $capt = $_GET["idDepartamento"];
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
 <br><a href="?action=ver&m=1" class="btn1">Dep</a><br><br>

 <?php if( !empty($_GET['m']) and !empty($_GET['action']) ){ ?>


    <form action='#' method="POST" enctype="Multipart/form-data">
     <h2>tabla Departameto</h2>
     <label> Dep</label>
    <br>
     <input type="Number" name="idDepartamento" placeholder="id" >
     <div>
    <br>
     <label></label> 
     <input type="Text" name="Nombre_dep"  placeholder="Nombre Depart">
    <br>
     <label></label>
     <input type="Number" name="Numero_empleados"  placeholder="Numero Empleados">
    <br>
    <label></label>
     <input type="text" name="email"  placeholder="Email">
    <br>
    <label></label>
     <input type="Number" name="telefono"  placeholder="Tel">
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
     <?php if( !empty($_GET['idDepartamento']) && !empty($_GET['action']) ){ ?>
<div>
<!-- multipart/form-data es necesario si sus usuarios deben subir un archhivo a travez del formulario-->
 
<form action="#" method="POST" enctype="multipart/form-data">

<?php $sql1= "SELECT * FROM departamento WHERE idDepartamento = '$capt'";
$query = $db->query($sql1);

   while ($row=$query->fetch(PDO::FETCH_ASSOC))
{
?>
<h2>Actualizar Consilidado</h2>
<!--<img src="<?php //echo $row["image_m_a"]; ?>" width="100" height="100"><p>-->
<label> Consolidado </label> 
<input type="number" name="idDepartamento2" value="<?php echo $row["idDepartamento"];?>" style="display: none">
<input type="number" name="idDepartamento" value="<?php echo $row["idDepartamento"];?>" placeholder="id" required>


<input type="text" name="Nombre_dep" value="<?php echo $row["Nombre_dep"];?>" placeholder="" required>

<input type="number" name="Numero_empleados" value="<?php echo $row["Numero_empleados"];?>" placeholder="" required>

<input type="text" name="email" value="<?php echo $row["email"];?>" placeholder="" required>

<input type="number" name="telefono" value="<?php echo $row["telefono"];?>" placeholder="" required>






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
 $sql1 = "SELECT * FROM departamento";
 $query=$db->query($sql1);
 
 if($query->rowcount()>0):?>
 <h1>Tabla</h1><br>   

 <?php while ($row=$query->fetch(PDO::FETCH_ASSOC)): ?>

 <div class="ex2">
 <!--<img src="<?php// echo $row["tip_doc"]; ?>"<br>-->
 <?php echo $row['idDepartamento']."      ";
       echo $row['Nombre_dep']."     ";
       echo $row['Numero_empleados']."     ";
       echo $row['email']."     ";
       echo $row['telefono']."     ";


 //if ($row['Usuario_tipodoc']== 1){ 
 //echo "Active" . "<br>";
 //  }else{
 //echo "inactive" . "<br>";
 //}?>

<a href="?action=editar&idDepartamento=<?php echo $row["idDepartamento"];?>">update</a>

<a href="?action=ELIMINAR&idDepartamento=<?php echo $row["idDepartamento"];?>" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">Delete</a><p>
</div>
<?php endwhile; ?>

<?php else:?>
<h4 class="alert alert-danger">NO EXISTEN REGISTROS</h4>
<?php endif;?>

</body>
</html>
