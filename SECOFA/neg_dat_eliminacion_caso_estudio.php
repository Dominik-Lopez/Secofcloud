<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=uft-8"/>
        <title>SECOFA</title>
    </head>
    <body>
        <?php
        include("Banner.php");
        include ("slider.php");
        
        class caso_estudio
        {
            public function eliminar($id_caso_estudio)
            { 


            include ("conexion.php");

            mysqli_query($db,"DELETE FROM caso_estudio WHERE id_caso_estudio='$id_caso_estudio'");
            header("location: neg_dat_consultar_caso_estudio.php");

            }
        }

        $nuevo=new caso_estudio();
        $nuevo->eliminar($_POST["id_caso_estudio"]);
        
            
        include ("footer.php");
        ?>
    </body>
</html>