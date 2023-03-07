
        <?php
        include("cabecera_admin.php");
        ?>
        
       
        <section class="content price"> 
    <article class="contain">
    <h2 class="title"></h2>
    </article>
</section>
<?php

      class Roles 
      {
      	public function consultar()
      	{
      		include ("conexion.php");

      		echo "<table border='1' aling='center'>";

      		$sql= "SELECT * FROM roles";
      		if(!$result= $db->query($sql)){
      			die('Hay un error primera consulta!! ['.$db->error .']');
      		}

      		echo "<tr>";
      		echo "<td>"; echo "id_rol"; echo "</td>"; 
          echo "<td>"; echo "rol"; echo "</td>";  
          echo "<td>"; echo "Accion"; echo "</td>";   
          echo "<td>"; echo "Actualizar"; echo "</td>"; 
      		echo "</tr>";

      		while($row=$result->fetch_assoc()){





      			$id_rol=stripslashes($row["id_rol"]);
      			$rol=stripslashes($row["rol"]);
      			
      			
      			
      echo "<tr>";
       echo "<td>"; echo $id_rol; echo"</td>";
       echo "<td>"; echo $rol; echo"</td>";
   
       



      		echo "<td>";
      		echo "<Form name='Eliminar' method='POST' action='neg_dat_eliminar_roles.php'>";
      		echo "<input type='hidden' name='id_rol' value='$id_rol'>";
      		echo "<input type='Submit' value='Eliminar'>";
      		echo "</form>";
      		echo "</td>";


      		echo "<td>";
      		echo "<form name='Actualizar' method='POST' action='pres_neg_dat_actualizacion_roles.php'>";
      		echo "<input type='hidden'  name='id_rol' value='$id_rol'>";
          echo "<input type='Submit' value='Actualizar'>";
      		echo "</form>";
      		echo "</td>";

      		echo "</tr>";
      	}
      	echo "</table>";
      }

 }
 $nuevo=new Roles();
    $nuevo->consultar();

    
        ?>
        <section class="content about">
    <h2 class="title">Informacion Diaria</h2>
    <a href="#" class="btn">Saber mas</a>

</section>
    </body>
</html>

        