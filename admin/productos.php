<?php

include('templates/header.html');

?>

<body>
<div class="container">
<?php
  # Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  # Se obtiene el valor del input del usuario
  $idtienda = $_POST['tienda'];
  $categoria = $_POST['product'];

  # Se construye la consulta como un string
  $query = "SELECT p.idProducto
  FROM Productos p
  JOIN Stock s ON p.idProducto = s.idProducto
  WHERE s.idTienda = :idtienda
    AND p.categoria = :categoria";

  $result = $db2->prepare($query);
  $result->bindParam(':idtienda', $idtienda);
  $result->bindParam(':categoria', $categoria);
  $result->execute();
  $productos = $result->fetchAll(PDO::FETCH_COLUMN); ?>

  <h3>Seleccionar producto</h3>
  <form action='./modificaciones.php' method='POST'>
    <input type="hidden" name="tienda" value="<?php echo $idtienda; ?>">
    <input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
    <select name='producto'>
      <?php foreach ($productos as $producto) { ?>
        <option value='<?php echo $producto; ?>'><?php echo $producto; ?></option>
      <?php } ?>
    </select>
    <input class='btn' type='submit' value='Consultar'>
  </form>
</div>

<?php include('../templates/footer.html'); ?>