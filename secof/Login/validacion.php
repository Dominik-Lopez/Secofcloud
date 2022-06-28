<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Validacion_login</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>

<?php
    //include_once "index.php";
    class Login
    {
            public function Login_user($user, $pass)
        {
            session_start();

            require_once '../conexion/conexion.php';
            // Logica

            $db = database::conectar();

            $cont=0;

            $sql2="SELECT * FROM  persona  WHERE username='$user' AND Passsword= '$pass'";
            $result2 = $db->query($sql2);

            while ($row2=$result2->fetch(PDO::FETCH_ASSOC))
            {
                $uusername=stripslashes($row2["username"]);
                $ppasword=stripslashes($row2["Passsword"]);
                $ffoto=stripcslashes($row2["foto_usu"]);
            $cont=$cont+1;
            }
            if ($cont==0)
            {
                print "<script>alert(\"Usuario y/o Password Incorrectas.\");window.location='index.php';</script>";
            }    
            if ($cont!=0)
            {
                $_SESSION['username']=$uusername;
                $_SESSI0N['foto_usu']=$ffoto;

                $sql1="SELECT fk_rol FROM persona WHERE username='$uusername'";
                $result1 = $db->query($sql1);

                while ($row1=$result1->fetch(PDO::FETCH_ASSOC))
                {
                    $role=stripslashes($row1["fk_rol"]);
                }
                if (@$role == null)
                {
                    print "<script>alert(\"El usuario no tiene asignado Rol\");window.location='index.php';</ script>";
                }
                if (@$role == 'Administrador')
                {
                $_SESSION['active']=1;
                header ('Location: ../../index_admin.php');
                }
                elseif (@$role == 'Empleado')
                {
                $_SESSION['active']=1;
                header ('Location: ../../index_empleado.php');    
                }
                elseif (@$role == 'VISITA DOMICILIARIA')
                {
                $_SESSION['active']=1;
                header ('Location: ../../index_empleado.php');    
                }
                
                elseif (@$role == 'Temporal')
                {
                    print "<script>alert(\"Usuario su Rol es Temporal, Comuniquese al Administrador\" )^window.location='index.php';</script>"; 
                }  
            }//Finalizado conteo

        }//finalizado del metodo/funcion

    }//Cerrando la clase

    $Nuevo=new login();
    $Nuevo->Login_user($_POST["user"],$_POST["pass"]);
?>


</body>
</html>