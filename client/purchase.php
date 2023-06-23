<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $purchase_id = $_POST["purchase_id"];
  $purchase_id = intval($purchase_id);

  #Se construye la consulta como un string
 	$query = "SELECT c.id c.name, c.value, c.phone_number, c.email
            FROM compra c
            WHERE c.id LIKE $purchase_id;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$purchase = $result -> fetchAll();
  ?>
    <?php 
    "<h1>Hola $user[0]</h1>
    <h3>Revisa tus datos:</h3>
    <p>Email: $user[3]</p>
    <p>Dirección: $user[1]</p>";
    ?>

    <?php
    #Se construye la consulta como un string
 	    $query = "SELECT c.id, c.name, c.direction, c.value
            FROM compra c
            INNER JOIN cliente cl
            ON c.id_cliente = cl.id
            WHERE c.name LIKE $client_name
            ORDER BY c.id ASC;";

    #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	    $result = $db -> prepare($query);
	    $result -> execute();
	    $purhcases = $result -> fetchAll();
    ?>


  <table>
    <tr>
      <th>Id</th>
      <th>Nombre Compra</th>
      <th>Dirección Envío</th>
      <th>Valor</th>
    </tr>
  
      <?php
        // echo $shops;
        foreach ($purchases as $p) {
          echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td></tr>";
      }
      ?>
      
  </table>

    <br>
    <br>
    <br>
    <h3>¿Quieres Revisar una de tus compras?</h3>
  <form align="center" action="client/purchase.php" method="post">
    Id de la compra:
    <input type="text" name="purchase_id">
    <br/><br/>
    <input type="submit" value="Revisar Compra">
  </form>

</body>

<?php include('../templates/footer.html'); ?>