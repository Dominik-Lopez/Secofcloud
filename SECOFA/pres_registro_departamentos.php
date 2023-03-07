<?php
include ("cabecera.php");  ?>   
<header class="content header">
    <h2 class="title">Bienvenido</h2>

</header>

<section class="content sau">
  <h3 class="title">Registrar Departamentos</h3>
  <form name='Registrar' action='neg_dat_registro_departamentos.php' method='POST' required>
  <input name='id_departamento' type='text' placeholder="id departamento"><br/>
  <input name='cod_departamento' type='text' placeholder="codigo"><br/>
  <input name='Nombre' type='text' placeholder="Nombre"><br/>
  <input name='desc_Departamento' type='text' placeholder="Descripcion"><br/>
  <input name='email' type='text' placeholder="email"><br/>
  <input name='telefono' type='text' placeholder="telefono"><br/>
  
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