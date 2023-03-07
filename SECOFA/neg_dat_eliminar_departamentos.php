<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=uft-8"/>
        <title>SECOFA</title>
    </head>
    <body>
        <?php
        include("Banner.php");
        include ("slider.php");
        
        class Departamentos 
        {
            public function eliminar($id_departamento)
            { 


            include ("conexion.php");

            mysqli_query($db,"DELETE FROM departamentos WHERE id_departamento='$id_departamento'");
            header("location: neg_dat_consultar_departamentos.php");

            }
        }

        $nuevo=new Departamentos();
        $nuevo->eliminar($_POST["id_departamento"]);
        
            
        include ("footer.php");
        ?>
    </body>
</html>