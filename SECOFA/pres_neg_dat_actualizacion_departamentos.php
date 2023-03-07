<?php
       include ("cabecera_admin.php");
        include ("slider.php");


      class Departamentos
      {
      	public function actualizar($id_departamento)
      	{
          include ("conexion.php");
  

          $sql = "SELECT * FROM departamentos WHERE id_departamento='$id_departamento'";
          if(!$result=$db->query($sql)){
            die ('Hay un error en la primera conslua!! ['. $db->error.']');
          } 

          while ($row=$result->fetch_assoc()){
            $cod_departamento=stripslashes($row["cod_departamento"]);
            $Nombre_dep=stripslashes($row["Nombre_dep"]);
            $desc_departamento=stripslashes($row["desc_Departamento"]);
            $email=stripslashes($row["email"]);
            $telefono=stripslashes($row["telefono"]);
       }
      		
       
        

        echo "<form name='Actualizar' action='neg_dat_actualizar_departamentos.php' method='POST' requiered>";
        echo "<input name='id_departamento' type='hidden' value='$id_departamento'> </br>";
        echo "Username </br>";  
        echo "<input name='cod_departamento' type='text' value='$cod_departamento'></br>";
        echo "<input name='Nombre_dep' type='text' value='$Nombre_dep'></br>";
        echo "<input name='desc_departamento' type='text' value='$desc_departamento'></br>";
        echo "<input name='email' type='text' value='$email'></br>";
        echo "<input name='telefono' type='text' value='$telefono'></br>";
        echo "<input type='submit' value='Actualizar'><br/>";
        echo "</form>";
        } 
 }

    $nuevo=new Departamentos();
    $nuevo->actualizar($_POST["id_departamento"]);

     include ("footer.php");
        ?>
    </body>
</html>

        