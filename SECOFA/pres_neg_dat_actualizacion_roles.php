<?php
       include ("cabecera_admin.php");
        include ("slider.php");


      class Roles 
      {
      	public function actualizar($id_rol)
      	{
          include ("conexion.php");
  

          $sql = "SELECT * FROM roles WHERE id_rol='$id_rol'";
          if(!$result=$db->query($sql)){
            die ('Hay un error en la primera conslua!! ['. $db->error.']');
          } 

          while ($row=$result->fetch_assoc()){
            $rol=stripslashes($row["rol"]);
       }
      		
       
        

        echo "<form name='Actualizar' action='neg_dat_actualizar_roles.php' method='POST' requiered>";
        echo "<input name='id_rol' type='hidden' value='$id_rol'> </br>";
        echo "Username </br>";  
        echo "<input name='rol' type='text' value='$rol'></br>";
        echo "<input type='submit' value='actualizar'><br/>";
        echo "</form>";
        } 
 }

    $nuevo=new Roles();
    $nuevo->actualizar($_POST["id_rol"]);

     include ("footer.php");
        ?>
    </body>
</html>

        