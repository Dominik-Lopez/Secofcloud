
        <?php
        include("cabecera_admin.php");
        ?>
        
       
        <section class="content price"> 
    <article class="contain">
    <h2 class="title"></h2>
    </article>
</section>
<?php

      class usuario 
      {
      	public function consultar()
      	{
      		include ("conexion.php");

      		echo "<table border='1' aling='center'>";

      		$sql= "SELECT * FROM usuario";
      		if(!$result= $db->query($sql)){
      			die('Hay un error primera consulta!! ['.$db->error .']');
      		}

      		echo "<tr>";
      		echo "<td>"; echo "Documento"; echo "</td>"; 
          echo "<td>"; echo "username"; echo "</td>"; 
          echo "<td>" ; echo "Nom_persona"; echo "</td>"; 
          echo "<td>"; echo "Seg_nombre"; echo "</td>"; 
          echo "<td>"; echo "apellido_per"; echo "</td>"; 
          echo "<td>"; echo "seg_apellido"; echo "</td>"; 
          echo "<td>"; echo "direccion"; echo "</td>";
          echo "<td>"; echo "correo"; echo "</td>"; 
          echo "<td>"; echo "telefono"; echo "</td>";
          echo "<td>"; echo "fk_id_departamento"; echo "</td>";  
          echo "<td>"; echo "Accion"; echo "</td>";   
          echo "<td>"; echo "Actualizar"; echo "</td>"; 
      		echo "</tr>";

      		while($row=$result->fetch_assoc()){





      			$documento=stripslashes($row["Documento"]);
      			$username=stripslashes($row["username"]);
      			$Nom_persona=stripslashes($row["Nom_persona"]);
      			$Seg_nombre=stripslashes($row["Seg_nombre"]);
      			$apellido_per=stripslashes($row["apellido_per"]);
      			$seg_apellido=stripslashes($row["seg_apellido"]);
      			$direccion=stripslashes($row["direccion"]);
      			$correo=stripslashes($row["correo"]);
      			$telefono=stripslashes($row["telefono"]);
      			$fk_id_departamento=stripslashes($row["fk_id_departamento"]);
      			
      			
      echo "<tr>";
       echo "<td>"; echo $documento; echo"</td>";
       echo "<td>"; echo $username; echo"</td>";
       echo "<td>"; echo $Nom_persona; echo"</td>";
       echo "<td>"; echo $Seg_nombre; echo"</td>";
       echo "<td>"; echo $apellido_per; echo"</td>";
       echo "<td>"; echo $seg_apellido; echo"</td>";
       echo "<td>"; echo $direccion; echo"</td>";
       echo "<td>"; echo $correo; echo"</td>";
       echo "<td>"; echo $telefono; echo"</td>";
       echo "<td>"; echo $fk_id_departamento; echo"</td>";
       



      		echo "<td>";
      		echo "<Form name='Eliminar' method='POST' action='neg_dat_eliminacion.php'>";
      		echo "<input type='hidden' name='documento' value='$documento'>";
      		echo "<input type='Submit' value='Eliminar'>";
      		echo "</form>";
      		echo "</td>";


      		echo "<td>";
      		echo "<form name='Actualizar' method='POST' action='pres_neg_dat_actualizacion.php'>";
      		echo "<input type='hidden'  name='Documento' value='$documento'>";
          echo "<input type='Submit' value='Actualizar'>";
      		echo "</form>";
      		echo "</td>";

      		echo "</tr>";
      	}
      	echo "</table>";
      }

 }
 $nuevo=new Usuario();
    $nuevo->consultar();

    
        ?>
        <section class="content about">
    <h2 class="title">Informacion Diaria</h2>
    <a href="#" class="btn">Saber mas</a>

</section>
    </body>
</html>

        