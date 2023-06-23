<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $shop_region = $_POST["shop_region"];
  $shop_region = intval($shop_region);

  #Se construye la consulta como un string
 	$query = "SELECT r.nombre_region, COUNT(DISTINCT s.id) AS cantidad_tiendas
            FROM region r
            INNER JOIN tienda s
            ON r.id = s.id_region
            GROUP BY r.id
            WHERE r.nombre LIKE $shop_region
            ORDER BY r.nombre ASC;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$shops = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Región</th>
      <th>Cantidad de Tiendas</th>
    </tr>
  
      <?php
        // echo $shops;
        foreach ($shops as $s) {
          echo "<tr><td>$s[0]</td><td>$s[1]</td></tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
