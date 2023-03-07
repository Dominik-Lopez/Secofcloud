
        <?php
       include ("cabecera_admin.php");
        include ("slider.php");


      class usuario 
      {
      	public function actualizar($documento)
      	{
          include ("conexion.php");
  

          $sql = "SELECT * FROM usuario WHERE documento='$documento'";
          if(!$result=$db->query($sql)){
            die ('Hay un error en la primera conslua!! ['. $db->error.']');
          } 

          while ($row=$result->fetch_assoc()){
            $username=stripslashes($row["username"]);
            $Nom_persona=stripslashes($row["Nom_persona"]);
            $Seg_nombre=stripslashes($row["Seg_nombre"]);
            $apellido_per=stripslashes($row["apellido_per"]);  
            $seg_apellido=stripslashes($row["seg_apellido"]);
            $direccion=stripslashes($row["direccion"]);
            $Correo=stripslashes($row["correo"]);
            $telefono=stripslashes($row["telefono"]);
           $fk_id_departamento=stripslashes($row["fk_id_departamento"]);
       }
      		
       
        

        echo "<form name='Actualizar' action='neg_dat_actualizar.php' method='POST' requiered>";
        echo "<input name='documento' type='hidden' value='$documento'> </br>";
        echo "Username </br>";  
        echo "<input name='username' type='text' value='$username'></br>";
        echo "Nombre </br>";
        echo "<input name='Nom_persona' type='text' value='$Nom_persona'></br>";
        echo "Segundo Nombre </br>";
        echo "<input name='Seg_nombre' type='text' value='$Seg_nombre'></br>";
        echo "Apellido </br>";
        echo "<input name='apellido_per' type='text' value='$apellido_per'></br>";
        echo "Segundo apellido </br>";
        echo "<input name='seg_apellido' type='text' value='$seg_apellido'></br>";
        echo "Direccion </br>";
        echo "<input name='direccion' type='text' value='$direccion'></br>";
        echo "Correo </br>";
        echo "<input name='Correo' type='text' value='$Correo'></br>";
        echo "Telefono </br>";
        echo "<input name='telefono' type='text' value='$telefono'></br>";
        echo "<input type='submit' value='actualizar'><br/>";
        echo "</form>";
        } 
 }

    $nuevo=new usuario();
    $nuevo->actualizar($_POST["Documento"]);

     include ("footer.php");
        ?>
    </body>
</html>

        