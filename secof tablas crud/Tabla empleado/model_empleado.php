<?php
//empelado
//empelado_idpersona, empelado_tipo_documento, empelado_idDepartamento
// VARIABLES
//$empid $emptd $empidep 
class empelado
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
   
            public function Inser_empelado($empid,$emptd,$empidep)
            {

                $sql="INSERT INTO empelado (empelado_idpersona,empelado_tipo_documento,empelado_idDepartamento)
                VALUES ('$empid','$emptd','$empidep')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='View_empleado.php'</script>";
            }
                public function Update_empelado($empid,$empid2,$emptd,$empidep)
                {
                    $sql ="UPDATE empelado SET
                    empelado_idpersona = '$empid',
                    empelado_tipo_documento ='$emptd',
                    empelado_idDepartamento ='$empidep'
                    WHERE empelado_idpersona ='$empid2'";
                
                $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='View_empleado.php.'</script>";
                }
                
                
                public function Delete_empelado($empid)
                {
                    $sql="DELETE FROM empelado WHERE empelado_idpersona='$empid'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='View_empleado.php'</script>";
                }
                }
  ?>
