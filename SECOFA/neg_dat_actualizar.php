
        <?php
      include ("cabecera_admin.php");
       


      class usuario 
      {
      	public function actualizar($documento,$username,$Nom_persona,$Seg_nombre,$apellido_per,$seg_apellido,$direccion,$correo,$telefono)
      	{
      		include ("conexion.php");
          mysqli_query($db,"UPDATE usuario SET username='$username' WHERE documento='$documento'");
          mysqli_query($db,"UPDATE usuario SET Nom_persona='$Nom_persona' WHERE documento='$documento'");
          mysqli_query($db,"UPDATE usuario SET Seg_nombre='$Seg_nombre' WHERE documento='$documento'");
          mysqli_query($db,"UPDATE usuario SET apellido_per='$apellido_per' WHERE documento='$documento'");
          mysqli_query($db,"UPDATE usuario SET seg_apellido='$seg_apellido' WHERE documento='$documento'");
          mysqli_query($db,"UPDATE usuario SET direccion='$direccion' WHERE documento='$documento'");
          mysqli_query($db,"UPDATE usuario SET correo='$correo' WHERE documento='$documento'");
          mysqli_query($db,"UPDATE usuario SET telefono='$telefono' WHERE documento='$documento'");
          

          echo "Actualizacion Correcta";
          echo "<br/>";  echo "<br/>";  echo "<br/>";
          }
           }
 $nuevo=new Usuario();
    $nuevo->actualizar($_POST["documento"],$_POST["username"],$_POST["Nom_persona"],$_POST["Seg_nombre"],$_POST["apellido_per"],$_POST["seg_apellido"],$_POST["direccion"],$_POST["Correo"],$_POST["telefono"]);

     
        ?>
    </body>
</html>