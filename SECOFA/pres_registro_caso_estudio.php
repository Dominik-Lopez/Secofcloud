<?php
include ("cabecera.php");  ?>   
<header class="content header">
    <h2 class="title">Bienvenido</h2>

</header>

<section class="content sau">
  <h3 class="title">Registrar caso estudio</h3>
  <form name='Registrar' action='neg_dat_registro_caso_estudio.php' method='POST' required>
  <input name='documento' type='file' placeholder="PDF"><br/>
  <input name='nombrepdf' type='text' placeholder="nombrepdf"><br/>
  <input name='descripcion' type='text' placeholder="descripcion"><br/>
 <input name='fk_id_departamento' type='text' placeholder="fk_id_departamento"><br/>
 <br/>
  <input type='submit' value='Registrar'><br/>
  </form>;
</section>

<section class="content price"> 
    <article class="contain">
    <h2 class="title">Consultar caso estudio</h2>
        <a href="neg_dat_consultar_caso_estudio.php" class="btn">Consultar</a>
-->
    </article>
</section>

<section class="content about">
    <h2 class="title">Informacion Diaria</h2>
    <a href="#" class="btn">Saber mas</a>

</section>


    </body>
</html>