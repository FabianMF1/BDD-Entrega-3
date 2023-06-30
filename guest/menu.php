<?php include('../templates/header.html'); ?>

<body>

<h1>Prueba 0: consulta para todos los datos de los 10 primeros clientes</h1>
<p>intento: 1</p>
<?php
require("../config/conexion.php");
$usersQuery = "SELECT * FROM cliente ORDER BY id_cliente LIMIT 10;";
$usersResult = $db1 -> prepare($usersQuery);
$usersResult -> execute();
$users = $usersResult -> fetchAll();
?>
<table class='table'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>RUT</th>
            <th>Calle</th>
            <th>Número</th>
            <th>Comuna</th>
            <th>Región</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $u) {
            echo "<tr><td>$u[0]</td><td>$u[1]</td><td>$u[2]</td><td>$u[3]</td><td>$u[4]</td><td>$u[5]</td><td>$u[6]</td></tr>";
        }
        ?>
    </tbody>
</table>


<h1>Prueba 1: consulta para encontrar los datos del user de nombre Peter Roberts</h1>
<p>intento: 12</p>
<?php
require("../config/conexion.php");
#Primero veremos si podemos filtrar un usuario según su nombre
$user_name = "Peter Roberts";
$userQuery = "SELECT * FROM cliente WHERE nombre LIKE '%$user_name%';";
$userResult = $db1 -> prepare($userQuery);
$userResult -> execute();
$users = $userResult -> fetchAll();
?>

<?php
foreach ($users as $u) {
    echo "<h3>Revisa tus datos $u[1]:</h3><p>RUT: $u[2]</p><p>Dirección: $u[6], $u[5], $u[3] $u[4]</p><p>User ID: $u[0]</p>";
}
?>

<h1>Prueba 2: consulta para encontrar los datos del user de nombre Robert Bridge</h1>
<p>intento: 1</p>
<?php
require("../config/conexion.php");
#Primero veremos si podemos filtrar un usuario según su nombre
$user_name = "Robert Bridge";
$userQuery = "SELECT * FROM cliente WHERE nombre LIKE '%$user_name%';";
$userResult = $db1 -> prepare($userQuery);
$userResult -> execute();
$users = $userResult -> fetchAll();
?>

<?php
foreach ($users as $u) {
    echo "<h3>Revisa tus datos $u[1]:</h3><p>RUT: $u[2]</p><p>Dirección: $u[6], $u[5], $u[3] $u[4]</p><p>User ID: $u[0]</p>";
}
?>

<h1>Prueba 3: consulta para encontrar todas las compras</h1>
<p>intento: 3</p>
<?php
require("../config/conexion.php");
$purchaseQuery = "SELECT * FROM compra ORDER BY id_compra LIMIT 10;";
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

<h1>Prueba 4: consulta para encontrar todas las compras de Peter Roberts</h1>
<p>intento: 1</p>
<?php
require("../config/conexion.php");
$user_name = "Peter Roberts";
$purchaseQuery = "SELECT * FROM compra c INNER JOIN (SELECT * FROM cliente WHERE nombre LIKE '%$user_name%') cl ON c.id_cliente = cl.id_cliente;";
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


</body>

<?php include('../templates/footer.html'); ?>

