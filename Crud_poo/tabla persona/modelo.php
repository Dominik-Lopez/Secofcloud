<?php
 class persona
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

public function Inser_persona($id_Persona,$Nombre,$Seg_nombre,$Apellido,$Seg_apellido,$Direccion,$Email,$telefono,$Tipo_Documento_Tipo_Doc)
{

    $sql="INSERT INTO persona (id_persona,Nom_persona,Seg_nombre,apellido_per,seg_apellido,direccion,email,telefono,tipo_documento_tipo_doc)
    VALUES ('$id_Persona','$Nombre','$Seg_nombre','$Apellido','$Seg_apellido','$Direccion','$Email','$telefono','$Tipo_Documento_Tipo_Doc')";


     $this->pdo->query($sql);

print"<script>alert(\"Registro Agregado Exitosamente.\") ;window.location='view.php'</script>";
}
    
         public function Update_persona($id_Persona,$id_Persona2,$Nombre,$Seg_nombre,$Apellido,$Seg_apellido,$Direccion,$Email,$telefono,$Tipo_Documento_Tipo_Doc)
         {
             $sql ="UPDATE persona SET
             id_persona = '$id_Persona',
             Nom_Persona ='$Nombre',
             Seg_nombre ='$seg_nombre',
             apellido_per='$Apellido',
             seg_apellido='$Seg_apellido',
             direccion ='$Direccion',
             email ='$Email',
             telefono =$telefono,
             tipo_documento_dipo_doc='$Tipo_Documento_Tipo_Doc'
             WHERE Persona ='$id_Persona2'";
         
         $this->pdo->query($sql);

         print"<script>alert(\"Registro Actualizado Exitosamente.\");window.location='view.php'</script>";
         }
         
         
         public function Delete_pesona($id_Persona)
         {
             $sql="DELETE FROM persona  WHERE id_persona='$id_Persona'";

             $this->pdo->query($sql);

             print"<script>alert(\"Registro eliminado Exitosamente.\") ;window.location='view.php'</script>";
         }
     } 


?>


