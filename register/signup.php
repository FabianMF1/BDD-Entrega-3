<?php include('templates/header.html')?>
<?php include('config/conexion.php')?>
<?php #no tocar, lo estoy modificando (Diego)?>

<body>
  <br>
  <br>
  <br>
  <h1 align="center">Registrate</h1>

  <br>

  <form align="center"  method="post">
    <input type="text" name="new_client_name" placeholder="Nombre de Usuario">
    <br/><br/>
    <input type="password" name="new_client_password" placeholder="Contraseña">
    <br/><br/>
    <input type="submit" value="Registrarte">  <a href="index.php">Cancelar</a>
  <br>
  <br>
  <br>
  <?php
  include('register.php')
  ?>

</body>