<?php include('templates/header.html');?>

<body>
<div class="container">
<?php
  # Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  # Se obtiene el valor del input del usuario
  $id_tienda = $_POST['tienda'];

  # Se construye la consulta como un string
  $query = "SELECT DISTINCT categoria FROM productos";

  $result = $db2->prepare($query);
  $result->execute();
  $categorias = $result->fetchAll(PDO::FETCH_COLUMN); ?>
    <h3>Seleccionar categoría del producto</h3>
    <form action='./productos.php' method='POST'>
        <input type="hidden" name="tienda" value="<?php echo $id_tienda; ?>">
        <select name='product'>
            <?php foreach ($categorias as $cat) { ?>
                <option value='<?php echo $cat; ?>'><?php echo $cat; ?></option>
            <?php } ?>
        </select>
        <input class='btn' type='submit' value='Consultar'>
    </form>
    </div>

<?php include('../templates/footer.html'); ?>