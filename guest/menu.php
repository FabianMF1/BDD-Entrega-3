<?php include('../templates/header.html');   ?>

<body>

<h1>Prueba 1: consulta para encontrar los datos del user de nombre Jeffrey Stevens</h1>
<p>intento: 4</p>
<?php
require("../config/conexion.php");
#Primero veremos si podemos filtrar un usuario según su nombre
$user_name = "Jeffrey Stevens";
$userQuery = "SELECT c.nombre, c.rut, c.calle, c.num_domicilio, c.comuna, c.region, c.id_cliente
    FROM cliente c
    WHERE c.nombre IS $user_name;";
$userResult = $db -> prepare($userQuery);
$userResult -> execute();
$users = $userResult -> fetchAll();
?>

<?php
foreach ($users as $u) {
    echo "<h3>Revisa tus datos:</h3>
    <p>RUT: $user[1]</p>
    <p>Dirección: $user[5], $user[4], $user[2] #$user[3]</p>
    <p>User ID: $user[6]</p>";
}
?>

<h1>Prueba 2: consulta para encontrar los datos del user de id 164</h1>
<p>intento: 1</p>
<?php
require("../config/conexion.php");
#Primero veremos si podemos filtrar un usuario según su nombre
$user_id = 164;
$userQuery = "SELECT c.nombre, c.rut, c.calle, c.num_domicilio, c.comuna, c.region, c.id_cliente
    FROM cliente c
    WHERE c.id_cliente IS $user_id;";
$userResult = $db -> prepare($userQuery);
$userResult -> execute();
$users = $userResult -> fetchAll();
?>

<?php
foreach ($users as $u) {
    echo "<h3>Revisa tus datos:</h3>
    <p>RUT: $user[1]</p>
    <p>Dirección: $user[5], $user[4], $user[2] #$user[3]</p>
    <p>User ID: $user[6]</p>";
}
?>

</body>

<?php include('../templates/footer.html'); ?>

