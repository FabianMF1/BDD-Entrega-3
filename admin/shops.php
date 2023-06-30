<?php include('templates/header.html');?>

<body>
<div class="container">
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $shop_region = $_POST['region'];

  #Se construye la consulta como un string
  $query = "SELECT Tiendas.idTienda
  FROM Tiendas
  JOIN relacion_comunaregion ON Tiendas.comuna = relacion_comunaregion.comuna
  WHERE relacion_comunaregion.region = :shop_region";

  $result = $db2->prepare($query);
  $result->bindParam(':shop_region', $shop_region);
  $result->execute();
  $shops = $result->fetchAll(PDO::FETCH_COLUMN); ?>
    <h3>Seleccionar Id de Tienda</h3>
    <form action='./categoria.php' method='POST'>
        <select name='tienda'>
            <?php foreach ($shops as $shop) { ?>
                <option value='<?php echo $shop; ?>'><?php echo $shop; ?></option>
            <?php } ?>
        </select>
        <input class='btn' type='submit' value='Consultar'>
    </form>
    </div>

<?php include('../templates/footer.html'); ?>
