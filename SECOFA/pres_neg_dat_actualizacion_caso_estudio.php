<?php
       include ("cabecera_admin.php");
        include ("slider.php");


      class caso_estudio 
      {
      	public function actualizar($id_caso_estudio)
      	{
          include ("conexion.php");
  

          $sql = "SELECT * FROM caso_estudio WHERE id_caso_estudio='$id_caso_estudio'";
          if(!$result=$db->query($sql)){
            die ('Hay un error en la primera conslua!! ['. $db->error.']');
          } 

          while ($row=$result->fetch_assoc()){
            $documento=stripslashes($row["documento"]);
            $nombrepdf=stripslashes($row["nombrepdf"]);
            $descripcion=stripslashes($row["descripcion"]);
            $fk_id_departamento=stripslashes($row["fk_id_departamento"]);  
       }
      		
       
        

        echo "<form name='Actualizar' action='neg_dat_actualizar_caso_estudio.php' method='POST' requiered>";
        echo "<input name='id_caso_estudio' type='hidden' value='$id_caso_estudio'> </br>";
        echo "documento </br>";  
        echo "<input name='documento' type='text' value='$documento'></br>";
        echo "nombrepdf </br>";
        echo "<input name='nombrepdf' type='text' value='$nombrepdf'></br>";
        echo "descripcion</br>";
        echo "<input name='descripcion' type='text' value='$descripcion'></br>";
        echo "id_departamento </br>";
        echo "<input name='fk_id_departamento' type='text' value='$fk_id_departamento'></br>";
        echo "<input type='submit' value='actualizar'><br/>";
        echo "</form>";
        } 
 }

    $nuevo=new caso_estudio();
    $nuevo->actualizar($_POST["id_caso_estudio"]);

     include ("footer.php");
        ?>
    </body>
</html>

        