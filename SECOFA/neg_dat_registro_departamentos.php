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
            public  function registrar($id_departamento,$cod_departamento,$Nombre_dep,$desc_departamento,$email,$telefono)
        { 
        include ("conexion.php");
        mysqli_query($db,"INSERT INTO departamentos (id_departamento,cod_departamento,Nombre_dep,desc_Departamento,email,telefono) VALUES ('$id_departamento','$cod_departamento','$Nombre_dep','$desc_departamento','$email','$telefono')");
        
        echo "Registro Correcto";
        echo "<br/>";  echo "<br/>";  echo "<br/>";

        echo "<a href='pres_registro_departamentos.php'> Realizar otro registro</a>";
        }
    }

    $nuevo=new Departamentos();
    $nuevo->registrar ($_POST["id_departamento"],$_POST["cod_departamento"],$_POST["Nombre"],$_POST["desc_Departamento"],$_POST["email"],$_POST["telefono"]);


        include ("footer.php");
        ?>
    </body>
</html>