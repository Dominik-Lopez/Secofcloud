<?php
      include ("cabecera_admin.php");
       


      class Departamentos
      {
      	public function actualizar($id_departamento,$cod_departamento,$Nombre_dep,$desc_departamento,$email,$telefono)
      	{
      		include ("conexion.php");
            
          mysqli_query($db,"UPDATE departamentos SET cod_departamento='$cod_departamento' WHERE id_departamento='$id_departamento'");
          mysqli_query($db,"UPDATE departamentos SET Nombre_dep='$Nombre_dep' WHERE id_departamento='$id_departamento'");
          mysqli_query($db,"UPDATE departamentos SET desc_departamento='$desc_departamento' WHERE id_departamento='$id_departamento'");
          mysqli_query($db,"UPDATE departamentos SET email='$email' WHERE id_departamento='$id_departamento'");
          mysqli_query($db,"UPDATE departamentos SET telefono='$telefono' WHERE id_departamento='$id_departamento'");
          echo "Actualizacion Correcta";
          echo "<br/>";  echo "<br/>";  echo "<br/>";
          }
           }
 $nuevo=new Departamentos();
    $nuevo->actualizar($_POST["id_departamento"],$_POST["cod_departamento"],$_POST["Nombre_dep"] ,$_POST["desc_departamento"],$_POST["email"],$_POST["telefono"]);

     
        ?>
    </body>
</html>