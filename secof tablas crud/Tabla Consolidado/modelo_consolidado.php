<?php
//consolidado
//idConsolidado	Tamano	fecha_subida	Version_
// VARIABLES
//$idcon $tam $fsub $ver
class consolidado
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
   
            public function Inser_consolidado($idcon,$tam,$fsub,$ver)
            {

                $sql="INSERT INTO consolidado (idConsolidado,Tamano,fecha_subida,Version_)
                VALUES ('$idcon','$tam','$fsub','$ver')";


                 $this->pdo->query($sql);

            print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='view_consolidado.php'</script>";
            }
                public function Update_consolidado($idcon,$idcon2,$tam,$fsub,$ver)
                {
                    $sql ="UPDATE consolidado SET
                    idConsolidado = '$idcon',
                    Tamano ='$tam',
                    fecha_subida ='$fsub',
                    Version_ ='$ver'
                    WHERE idConsolidado ='$idcon2'";
                
                $this->pdo->query($sql);

                print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view_consolidado.php.'</script>";
                }
                
                
                public function Delete_consolidado($idcon)
                {
                    $sql="DELETE FROM consolidado WHERE idConsolidado='$idcon'";

                    $this->pdo->query($sql);

                    print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='view_consolidado.php'</script>";
                }
                }
  ?>
