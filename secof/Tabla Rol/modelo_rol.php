<?php
//rol
//rol_usu, estado_rol

class rol
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
   
            public function Inser_rol($rol_usu ,$estado_rol)
            {

                $sql="INSERT INTO rol (rol_usu,estado_rol)
                VALUES ('$rol_usu','$estado_rol')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='view_rol.php'</script>";
            }
                public function Update_rol($rol_usu,$rol_usu2,$estado_rol)
                {
                    $sql ="UPDATE rol SET
                    rol_usu = '$rol_usu ',
                    estado_rol ='$estado_rol'
                    WHERE rol_usu ='$rol_usu2'";
                
                $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_rol.php'</script>";
                }
                
                
                public function Delete_rol($tip_doc)
                {
                    $sql="DELETE FROM rol WHERE rol_usu ='$rol_usu'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='view_rol.php'</script>";
                }
                }
  ?>
