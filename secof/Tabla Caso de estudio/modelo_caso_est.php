<?php
//caso_de_estudio
//idCaso_de_estudio,Usuario_idPersona,Usuario_tipodoc

class tipo_documento
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
   
            public function Inser_tipo_documento($tip_doc,$desc,$estado)
            {

                $sql="INSERT INTO caso_de_estudio (idCaso_de_estudio,Usuario_idPersona,Usuario_tipodoc)
                VALUES ('$tip_doc','$desc','$estado')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='view_caso_est.php'</script>";
            }
                public function Update_tipo_documento($tip_doc,$tip_doc2,$desc,$estado)
                {
                    $sql ="UPDATE caso_de_estudio SET
                    idCaso_de_estudio = '$tip_doc',
                    Usuario_idPersona ='$desc',
                    Usuario_tipodoc ='$estado'
                    WHERE idCaso_de_estudio ='$tip_doc2'";
                
                $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_caso_est.php.'</script>";
                }
                
                
                public function Delete_tipo_documento($tip_doc)
                {
                    $sql="DELETE FROM caso_de_estudio WHERE idCaso_de_estudio='$tip_doc'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='view_caso_est.php'</script>";
                }
                }
  ?>
