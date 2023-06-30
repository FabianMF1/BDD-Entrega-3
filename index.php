<?php include('templates/header.html')?>
<body>
  <h1 align="center">Muebles</h1>
  <p style="text-align:center;">Inicia Sesión o continúa como Invitado</p>
  <br>
  <h2 class = "subtitle"  align="center">Iniciar Sesión</h2>

  <form align="center" method="post">
    <input type="text" name="user_name" placeholder="Nombre de Usuario">
    <br/><br/>
    <input type="password" name="user_password" placeholder="Contraseña">
    <br/><br/>
    <input type="submit" name = 'log_in' value="Iniciar Sesión"> 
    <br/><br/>
    <input type="submit" name = 'import' value="Importar Usuarios">
  </form>

  <br>
  <br>

  <a href="guest/menu.php">Continúa como invitado</a>
  <br>

  <?php
  include('validation.php')
  ?>

</body>
