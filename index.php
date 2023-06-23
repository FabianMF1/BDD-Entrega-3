<?php include('templates/header.html')?>

<body>
  <h1 align="center">Muebles g108+144</h1>
  <p style="text-align:center;">Inicia Sesión o continúa como invitado</p>

  <br>

  <h3 align="center">Iniciar sesión como Cliente</h3>

  <form align="center" action="client/menu.php" method="post">
    Nombre de usuario:
    <input type="text" name="client_name">
    <br/><br/>
    Contraseña:
    <input type="password" name="client_password" >
    <br/><br/>
    <input type="submit" value="Iniciar sesión">
    ¿No tienes cuenta? <a href="client/signup.php">Regístrate</a>
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center">Iniciar sesión como Administrador</h3>

  <form align="center" action="admin/menu.php" method="post">
    Nombre de Admin:
    <input type="text" name="admin_name">
    <br/><br/>
    Contraseña:
    <input type="password" name="admin_password" >
    <br/><br/>
    <input type="submit" value="Iniciar sesión">
  </form>
  
  <br>
  <br>
  <br>

  <a href="guest/menu.php">Continúa como invitado</a>


  

</body>
</html>
