<?php include('../templates/header.html');   ?>

<body>
<h1>Client Menu</h1>
<?php
require("../config/conexion.php");
$client_name = $_POST["client_name"];
$client_name = intval($client_name);
$user_name = "Robert Bridge";
$userQuery = "SELECT * FROM cliente WHERE nombre LIKE '%$client_name%';";
$userResult = $db1 -> prepare($userQuery);
$userResult -> execute();
$users = $userResult -> fetchAll();
?>

<?php
foreach ($users as $u) {
    echo "<h3>Revisa tus datos $u[1]:</h3><p>RUT: $u[2]</p><p>Dirección: $u[6], $u[5], $u[3] $u[4]</p><p>User ID: $u[0]</p>";
}
?>
<h2>Aquí encontrarás todas tus compras</h2>

<?php
require("../config/conexion.php");
$purchaseQuery = "SELECT * FROM compra c INNER JOIN (SELECT * FROM cliente WHERE nombre LIKE '%$client_name%') cl ON c.id_cliente = cl.id_cliente;";
$purchaseResult = $db1 -> prepare($purchaseQuery);
$purchaseResult -> execute();
$purchases = $purchaseResult -> fetchAll();
?>

<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>ID Producto</th>
            <th>ID Cliente</th>
            <th>ID Tienda</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($purchases as $p) {
            echo "<tr><td>$p[0]</td><td>$p[1]</td><td>$p[2]</td><td>$p[3]</td><td>$p[4]</td><td>$p[5]</td></tr>";
        }
        ?>
    </tbody>
</table>
<br>
<br>
<br>

<h3>¿Quieres revisar alguna de tus compras?</h3>
<form align="center" action="client/purchase.php" method="post">
  Id de la compra:
  <input type="text" name="purchase_id">
  <br/><br/>
  <input type="submit" value="Revisar Compra">
</form>

</body>

<?php include('../templates/footer.html'); ?>

