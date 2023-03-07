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
            public  function registrar($documento,$nombrepdf,$descripcion,$fk_id_departamento)
        { 
        include ("conexion.php");
        mysqli_query($db,"INSERT INTO caso_estudio (documento,nombrepdf,descripcion,fk_id_departamento) VALUES ('$documento','$nombrepdf','$descripcion','$fk_id_departamento')");
        

        $nuevo=new caso_estudio();
        $nuevo->registrar ($_POST["documento"],$_POST["nombrepdf"],$_POST["descripcion"],$_POST["fk_id_departamento"]);


        include ("footer.php");
        ?>
    </body>
</html>