<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=uft-8"/>
        <title>SECOFA</title>
    </head>
    <body>
        <?php
        include("Banner.php");
        include ("slider.php");
        
        class Usuario 
        {
            public  function registrar($documento,$username,$nom_persona,$seg_nombre,$apellido_per,$seg_apellido,$direccion,$Correo,$telefono,$departamento)
        { 
        include ("conexion.php");
        mysqli_query($db,"INSERT INTO usuario (documento,username,nom_persona,Seg_nombre,apellido_per,seg_apellido,direccion,Correo,telefono,fk_id_departamento) VALUES ('$documento','$username','$nom_persona','$seg_nombre','$apellido_per','$seg_nombre','$direccion','$Correo','$telefono','$departamento')");
        
        echo "Registro Correcto";
        echo "<br/>";  echo "<br/>";  echo "<br/>";

        echo "<a href='pres_registro.php'> Realizar otro registro</a>";
        }
    }

    $nuevo=new Usuario();
    $nuevo->registrar ($_POST["documento"],$_POST["username"],$_POST["Nom_persona"],$_POST["Seg_nombre"],$_POST["apellido_per"],$_POST["seg_apellido"],$_POST["direccion"],$_POST["correo"],$_POST["telefono"],$_POST["fk_id_departamento"]);


        include ("footer.php");
        ?>
    </body>
</html>