<?php
include ("cabecera.php");  ?>   
<header class="content header">
    <h2 class="title">Bienvenido</h2>

</header>

<section class="content sau">
  <h3 class="title">Registrar Usuario</h3>
  <form name='Registrar' action='neg_dat_registro.php' method='POST' required>
  <input name='documento' type='text' placeholder="Documento"><br/>
  <input name='username' type='text' placeholder="Username"><br/>
  <input name='Nom_persona' type='text' placeholder="Nombre"><br/>
   <input name='Seg_nombre' type='text' placeholder="Segundo Nombre"><br/>
  <input name='apellido_per' type='text' placeholder="Apellido"><br/>
   <input name='seg_apellido' type='text' placeholder="Segundo apellido"><br/>
  <input name='direccion' type='text' placeholder="Direccion"><br/>
  <input name='correo' type='text' placeholder="Correo"><br/>
  <input name='telefono' type='text' placeholder="Telefono"><br/>
 <input name='fk_id_departamento' type='text' placeholder="Departamento"><br/>
 <br/>
  <input type='submit' value='Registrar'><br/>
  </form>;
</section>

<section class="content price"> 
    <article class="contain">
    <h2 class="title">Consultar Usuarios</h2>
        <a href="neg_dat_consultar.php" class="btn">Consultar</a>
-->
    </article>
</section>

<section class="content about">
    <h2 class="title">Informacion Diaria</h2>
    <a href="#" class="btn">Saber mas</a>

</section>


    </body>
</html>