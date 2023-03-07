<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=uft-8"/>
        <title>SECOFA</title>
    </head>
    <body>
        <?php
        include("Banner.php");
        include ("slider.php");
        
        class Roles
        {
            public  function registrar($id_rol,$rol)
        { 
        include ("conexion.php");
        mysqli_query($db,"INSERT INTO roles (id_rol,rol) VALUES ('$id_rol','$rol')");
        
        echo "Registro Correcto";
        echo "<br/>";  echo "<br/>";  echo "<br/>";

        echo "<a href='pres_registro_roles.php'> Realizar otro registro</a>";
        }
    }

    $nuevo=new Roles();
    $nuevo->registrar ($_POST["id_rol"],$_POST["rol"]);


        include ("footer.php");
        ?>
    </body>
</html>