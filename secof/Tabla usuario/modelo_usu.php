<?php
class usuario
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
   
            public function Inser_usuario($usu_idper,$usu_tip_doc,$usu_empresa)
            {

                $sql="INSERT INTO usuario (Persona_idpersona,Usuario_tipo_documento,usu_idempresa_contra)
                VALUES('$usu_idper','$usu_tip_doc','$usu_empresa')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='view_usu.php'</script>";
            }
                public function Update_usuario($usu_idper,$usu_idper2,$usu_tip_doc,$usu_empresa)
                {
                    $sql ="UPDATE usuario SET
                    Persona_idpersona = '$usu_idper',
                    Usuario_tipo_documento ='$usu_tip_doc',
                    usu_idempresa_contra ='$usu_empresa' 
                    WHERE Persona_idpersona ='$usu_idper2'";
                
                    $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_usu.php'</script>";
                }
                
                
                public function Delete_usuario($usu_idper)
                {
                    $sql="DELETE FROM usuario WHERE Persona_idpersona='$usu_idper'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='view_usu.php'</script>";
                }
                }
  ?>


