<!DOCTYPE html>
<html lang="en">
<head>
    <title>Index Prueba</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="login.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="sidenav">
         <div class="login-main-text">
            <h2>Pagina Login</h2>
            <p>Logeate o Registrate para el acceso</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" action="validacion_login.php">
                  <div class="form-group">
                     <label>Nombre usuario</label>
                     <input type="text" name="user" class="form-control"  placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" name="pass" class="form-control"  placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black" value="Ingresar">Login</button>
                  <button type="submit" class="btn btn-secondary" value="Registrarse" a href="pres_registro.php">Register</button>
                  <p><a href="#">Olvide mi Contraseña</a></p>
               </form>
            </div>
         </div>
      </div> 



</body>
</html>