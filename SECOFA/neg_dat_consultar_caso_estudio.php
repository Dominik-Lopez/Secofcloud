<?php
        include("cabecera_admin.php");
        ?>
        
       
        <section class="content price"> 
    <article class="contain">
    <h2 class="title"></h2>
    </article>
</section>
<?php

      class caso_estudio 
      {
      	public function consultar()
      	{
      		include ("conexion.php");

      		echo "<table border='1' aling='center'>";

      		$sql= "SELECT * FROM caso_estudio";
      		if(!$result= $db->query($sql)){
      			die('Hay un error primera consulta!! ['.$db->error .']');
      		}

      		echo "<tr>";
      		echo "<td>"; echo "id_caso_estudio"; echo "</td>"; 
          echo "<td>"; echo "documento"; echo "</td>"; 
          echo "<td>" ; echo "nombrepdf"; echo "</td>"; 
          echo "<td>"; echo "descripcion"; echo "</td>"; 
          echo "<td>"; echo "fk_id_departamento"; echo "</td>"; 
          echo "<td>"; echo "Accion"; echo "</td>";   
          echo "<td>"; echo "Actualizar"; echo "</td>"; 
      		echo "</tr>";

      		while($row=$result->fetch_assoc()){



      			$id_caso_estudio=stripslashes($row["id_caso_estudio"]);
      			$documento=stripslashes($row["documento"]);
      			$nombrepdf=stripslashes($row["nombrepdf"]);
      			$descripcion=stripslashes($row["descripcion"]);
      			$fk_id_departamento=stripslashes($row["fk_id_departamento"]);
 
      			
      			
      echo "<tr>";
       echo "<td>"; echo $id_caso_estudio; echo"</td>";
       echo "<td>"; echo $documento; echo"</td>";
       echo "<td>"; echo $nombrepdf; echo"</td>";
       echo "<td>"; echo $descripcion; echo"</td>";
       echo "<td>"; echo $fk_id_departamento; echo"</td>";

       



      		echo "<td>";
      		echo "<Form name='Eliminar' method='POST' action='neg_dat_eliminacion_caso_estudio.php'>";
      		echo "<input type='hidden' name='id_caso_estudio' value='$id_caso_estudio'>";
      		echo "<input type='Submit' value='Eliminar'>";
      		echo "</form>";
      		echo "</td>";


      		echo "<td>";
      		echo "<form name='Actualizar' method='POST' action='pres_neg_dat_actualizacion_caso_estudio.php'>";
      		echo "<input type='hidden'  name='id_caso_estudio' value='$id_caso_estudio'>";
          echo "<input type='Submit' value='Actualizar'>";
      		echo "</form>";
      		echo "</td>";

      		echo "</tr>";
      	}
      	echo "</table>";
      }

 }
 $nuevo=new caso_estudio();
    $nuevo->consultar();

    
        ?>
        <section class="content about">
    <h2 class="title">Informacion Diaria</h2>
    <a href="#" class="btn">Saber mas</a>

</section>
    </body>
</html>
