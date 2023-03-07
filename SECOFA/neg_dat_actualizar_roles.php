<?php
      include ("cabecera_admin.php");
       


      class Roles 
      {
      	public function actualizar($id_rol,$rol)
      	{
      		include ("conexion.php");
          mysqli_query($db,"UPDATE roles SET rol='$rol' WHERE id_rol='$id_rol'");
         
          

          echo "Actualizacion Correcta";
          echo "<br/>";  echo "<br/>";  echo "<br/>";
          }
           }
 $nuevo=new Roles();
    $nuevo->actualizar($_POST["id_rol"],$_POST["rol"]);

     
        ?>
    </body>
</html>