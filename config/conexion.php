<?php
  try {
    #Pide las variables para conectarse a la base de datos.
    require('data.php'); 
    # Se crea la instancia de PDO
    $db1 = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password"); # database 108
    $db2 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2"); # database 125
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }

?>