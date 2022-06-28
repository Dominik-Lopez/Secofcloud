<?php
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

                $sql="INSERT INTO tipo_documento (tipo_documento,Des_tipodoc,Estado_tdoc)
                VALUES ('$tip_doc','$desc','$estado')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='view.php'</script>";
            }
                public function Update_tipo_documento($tip_doc,$tip_doc2,$desc,$estado)
                {
                    $sql ="UPDATE tipo_documento SET
                    tipo_documento = '$tip_doc',
                    Des_tipodoc ='$desc',
                    Estado_tdoc ='$estado'
                    WHERE tipo_documento ='$tip_doc2'";
                
                $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view.php'</script>";
                }
                
                
                public function Delete_tipo_documento($tip_doc)
                {
                    $sql="DELETE FROM tipo_documento WHERE tipo_documento='$tip_doc'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='view.php'</script>";
                }
                }
  ?>
