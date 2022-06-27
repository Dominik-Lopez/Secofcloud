<?php
//departamento
//idDepartamento	Nombre_dep	Numero_empleados	email	telefono
// VARIABLES
//$idep $nomdep $numemp $em $tel 
class departamento
        {
                private $pdo;
                public function __CONSTRUCT()
            {
            try{
                $this->pdo=database::conectar();
            }
            catch(exception $ex){
                die($e->getMessage());
            }

        }
   
            public function Inser_departamento($idep, $nomdep, $numemp, $em, $tel)
            {

                $sql="INSERT INTO departamento (idDepartamento,Nombre_dep,Numero_empleados,email,telefono)
                VALUES ('$idep','$nomdep','$numemp','$em','$tel')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='View_dep.php'</script>";
            }
                public function Update_departamento($idep, $idep2, $nomdep, $numemp, $em, $tel)
                {
                    $sql ="UPDATE departamento SET
                    idDepartamento = '$idep',
                    Nombre_dep = '$nomdep',
                    Numero_empleados = '$numemp',
                    email = '$em',
                    telefono = '$tel'
                    WHERE idDepartamento ='$idep2'";
                
                $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='View_dep.php.'</script>";
                }
                
                
                public function Delete_departamento($idep)
                {
                    $sql="DELETE FROM departamento WHERE idDepartamento ='$idep'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='View_dep.php'</script>";
                }
                }
  ?>
