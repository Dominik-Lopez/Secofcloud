
        <?php
        include("cabecera_admin.php");
        ?>
        
       
        <section class="content price"> 
    <article class="contain">
    <h2 class="title"></h2>
    </article>
</section>
<?php

      class Departamento
      {
      	public function consultar()
      	{
      		include ("conexion.php");

      		echo "<table border='1' aling='center'>";

      		$sql= "SELECT * FROM departamentos";
      		if(!$result= $db->query($sql)){
      			die('Hay un error primera consulta!! ['.$db->error .']');
      		}

      		echo "<tr>";
      		echo "<td>"; echo "id_departamento"; echo "</td>"; 
          echo "<td>"; echo "cod_departamento"; echo "</td>";  
          echo "<td>"; echo "Nombre"; echo "</td>"; 
          echo "<td>"; echo "desc_departamento"; echo "</td>"; 
          echo "<td>"; echo "email"; echo "</td>"; 
          echo "<td>"; echo "telefono"; echo "</td>"; 
          echo "<td>"; echo "Accion"; echo "</td>";   
          echo "<td>"; echo "Actualizar"; echo "</td>"; 
      		echo "</tr>";

      		while($row=$result->fetch_assoc()){





      			$id_departamento=stripslashes($row["id_departamento"]);
      			$cod_departamento=stripslashes($row["cod_departamento"]);
                
      			$Nombre_dep=stripslashes($row["Nombre_dep"]);
      			$desc_departamento=stripslashes($row["desc_Departamento"]);
      			
                
      			$email=stripslashes($row["email"]);
      			$telefono=stripslashes($row["telefono"]);
      			
      			
      			
      echo "<tr>";
       echo "<td>"; echo $id_departamento; echo"</td>";
       echo "<td>"; echo $cod_departamento; echo"</td>";
       echo "<td>"; echo $Nombre_dep; echo"</td>";
       echo "<td>"; echo $desc_departamento; echo"</td>";
       echo "<td>"; echo $email; echo"</td>";
       echo "<td>"; echo $telefono; echo"</td>";
       



      		echo "<td>";
      		echo "<Form name='Eliminar' method='POST' action='neg_dat_eliminar_departamentos.php'>";
      		echo "<input type='hidden' name='id_departamento' value='$id_departamento'>";
      		echo "<input type='Submit' value='Eliminar'>";
      		echo "</form>";
      		echo "</td>";


      		echo "<td>";
      		echo "<form name='Actualizar' method='POST' action='pres_neg_dat_actualizacion_departamentos.php'>";
      		echo "<input type='hidden'  name='id_departamento' value='$id_departamento'>";
          echo "<input type='Submit' value='Actualizar'>";
      		echo "</form>";
      		echo "</td>";

      		echo "</tr>";
      	}
      	echo "</table>";
      }

 }
 $nuevo=new Departamento();
    $nuevo->consultar();

    
        ?>
        <section class="content about">
    <h2 class="title">Informacion Diaria</h2>
    <a href="#" class="btn">Saber mas</a>

</section>
    </body>
</html>

        