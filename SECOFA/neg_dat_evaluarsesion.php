<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=uft-8"/>
        <title>SECOFA</title>
    </head>
    <body>
        <?php
        include("Banner.php");
        include ("slider.php");


      class usuario 
      {
          public funtion validar($documento,$contraseña);
          {
               include("conexion.php");

               $sql ="SELECT * FROM usuario WHERE documento='$documento' AND contraseña='$contraseña'";
               if(!result = $db->query($sql)){
                    die ('Hay un error en la primera consulta!!['. $db->error.']');
               }

               $cont="0";
               while ($row = result->fetch_assoc())
               {
                    $cont=$cont+1;
               }

              if ($cont=="0")
              {
               echo "Usuario Incorrecto";
               $_SESSION ['Logueado'] ="0";
              }

              if ($cont!="0")

              {
               echo "Usuario Correcto";
               $_SESSION ['Logueado']="1";
               $_SESSION ['Usuario Actual']=$documento;

               header("location:dashboard.php");
              }
          }
      }

      $nuevo=new usuario();
      $nuevo->validar($_POST['documento'],$_POST['contraseña']);
     include ("footer.php");
        ?>
    </body>
</html>