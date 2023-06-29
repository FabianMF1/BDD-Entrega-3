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
            <th>Contraseña</th>
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
            echo "<tr><td>$u[0]</td><td>$u[1]</td><td>$u[2]</td><td>$u[3]</td><td>$u[4]</td><td>$u[5]</td><td>$u[6]</td><td>$u[7]</td></tr>";
        }
        ?>
    </tbody>
</table>


<h1>Prueba 1: consulta para encontrar los datos del user de id 101</h1>
<p>intento: 11</p>
<?php
require("../config/conexion.php");
#Primero veremos si podemos filtrar un usuario según su nombre
$user_name = "Peter Roberts";
$userQuery = "SELECT * FROM cliente WHERE id_cliente IS 101;";
$userResult = $db1 -> prepare($userQuery);
$userResult -> execute();
$users = $userResult -> fetchAll();
?>

<?php
foreach ($users as $u) {
    echo "<h3>Revisa tus datos:</h3><p>RUT: $u[3]</p><p>Dirección: $u[7], $u[6], $u[4] $u[5]</p><p>User ID: $u[0]</p>";
}
?>

</body>

<?php include('../templates/footer.html'); ?>

