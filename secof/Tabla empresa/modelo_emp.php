<?php
class empresa_contra
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
   
            public function Inser_empresa_contra($id_emp,$Nombre,$Direccion,$Telefono,$Email)
            {

                $sql="INSERT INTO empresa_contra (idempresa_contra,Nombre,direccion,telefono,email)
                VALUES('$id_emp','$Nombre','$Direccion','$Telefono','$Email')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='view_emp.php'</script>";
            }
                public function Update_empresa_contra($id_emp,$id_emp2,$Nombre,$Direccion,$Telefono,$Email)
                {
                    $sql ="UPDATE empresa_contra SET
                    idempresa_contra = '$id_emp',
                    Nombre ='$Nombre',
                    direccion ='$Direccion',
                    telefono='$Telefono',
                    email ='$Email' 
                    WHERE idempresa_contra ='$id_emp2'";
                
                $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_emp.php'</script>";
                }
                
                
                public function Delete_empresa_contra($id_emp)
                {
                    $sql="DELETE FROM empresa_contra WHERE idempresa_contra='$id_emp'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='view_emp.php'</script>";
                }
                }
  ?>


