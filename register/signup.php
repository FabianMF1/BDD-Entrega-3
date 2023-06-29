<?php include('templates/header.html')?>
<?php #no tocar, lo estoy modificando (Diego)?>

<body>
  <br>
  <br>
  <br>
  <h1 align="center">Regístrate</h1>

  <br>

  <form align="center" method="post">
    <input type="text" name="new_client_name" placeholder="Nombre de Usuario">
    <input type="password" name="new_client_password" placeholder="Contraseña">
    <br/><br/>
    <input type="text" name="new_client_rut" placeholder="RUT: 22.333.444-5">
    <input type="text" name="new_client_calle" placeholder="Calle: Los Laurales">
    <br/><br/>
    <input type="number" min="0" name="new_client_numero" placeholder="Número: 2134">
    <br/><br/>
    <input type="submit" name = 'register' value="Registrarte">  <a href='../index.php'>Cancelar</a>

  <?php
  include('register.php')
  ?>

</body>