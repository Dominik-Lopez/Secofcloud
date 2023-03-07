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
            public function eliminar($id_rol)
            { 


            include ("conexion.php");

            mysqli_query($db,"DELETE FROM roles WHERE id_rol='$id_rol'");
            header("location: neg_dat_consultar_roles.php");

            }
        }

        $nuevo=new Roles();
        $nuevo->eliminar($_POST["id_rol"]);
        
            
        include ("footer.php");
        ?>
    </body>
</html>