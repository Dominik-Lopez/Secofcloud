<?php
include ("cabecera.php");  ?>   
<header class="content header">
    <h2 class="title">Bienvenido</h2>

</header>

<section class="content sau">
  <h3 class="title">Registrar Roles</h3>
  <form name='Registrar' action='neg_dat_registro_roles.php' method='POST' required>
  <input name='id_rol' type='text' placeholder="id rol"><br/>
  <input name='rol' type='text' placeholder="rol"><br/>
  
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