<?php
      include ("cabecera_admin.php");
       


      class caso_estudio 
      {
      	public function actualizar($id_caso_estudio,$documento,$nombrepdf,$descripcion,$fk_id_departamento)
      	{
      		include ("conexion.php");
          mysqli_query($db,"UPDATE caso_estudio SET documento='$documento' WHERE id_caso_estudio='$id_caso_estudio'");
          mysqli_query($db,"UPDATE caso_estudio SET nombrepdf='$nombrepdf' WHERE id_caso_estudio='$id_caso_estudio'");
          mysqli_query($db,"UPDATE caso_estudio SET descripcion='$descripcion' WHERE id_caso_estudio='$id_caso_estudio'");
          mysqli_query($db,"UPDATE caso_estudio SET fk_id_departamento='$fk_id_departamento' WHERE id_caso_estudio='$id_caso_estudio'");
          

          echo "Actualizacion Correcta";
          echo "<br/>";  echo "<br/>";  echo "<br/>";
          }
           }
 $nuevo=new caso_estudio();
    $nuevo->actualizar($_POST["id_caso_estudio"],$_POST["documento"],$_POST["nombrepdf"],$_POST["descripcion"],$_POST["fk_id_departamento"]);

     
        ?>
    </body>
</html>