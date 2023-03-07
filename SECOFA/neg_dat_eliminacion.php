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
            public function eliminar($documento)
            { 


            include ("conexion.php");

            mysqli_query($db,"DELETE FROM usuario WHERE documento='$documento'");
            header("location: neg_dat_consultar.php");

            }
        }

        $nuevo=new usuario();
        $nuevo->eliminar($_POST["documento"]);
        
            
        include ("footer.php");
        ?>
    </body>
</html>