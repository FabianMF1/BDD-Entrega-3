<?php include('templates/header.html')?>
<body>
  <h1 align="center">Muebles</h1>
  <p style="text-align:center;">Inicia Sesión o continúa como Invitado</p>
  <br>
  <h2 class = "subtitle"  align="center">Iniciar Sesión</h2>

  <form align="center" method="post">
    <input type="text" name="new_client_name" placeholder="Nombre de Usuario">
    <input type="password" name="new_client_password" placeholder="Contraseña">
    <br/><br/>
    <input type="submit" name = 'log_in' value="Iniciar Sesión"> 
    <br/><br/>
    <input type="submit" name = 'import' value="Importar Usuarios">
  </form>

  <?php
  include('validation.php')
  ?>
  <br>
  <br>

  <a href="guest/menu.php">Continúa como invitado</a>

</body>
