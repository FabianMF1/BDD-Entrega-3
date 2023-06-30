<?php include('../templates/header.html');   ?>

<body>
<h1>Client Purchase<h1>
<?php
require("../config/conexion.php");
session_start();
$client_name = $_SESSION['user_name'];
$client_id = $_SESSION['user_id'];

$purchase_id = $_POST["purchase_id"];
$purchase_id = intval($purchase_id);

$purchaseQuery = "SELECT * FROM compra WHERE id_compra = $purchase_id;";
$purchaseResult = $db1 -> prepare($purchaseQuery);
$purchaseResult -> execute();
$purchases = $purchaseResult -> fetchAll();
?>

<table class='table'>
    <thead>
        <tr>
            <th>ID Prdoducto</th>
            <th>Nombre</th>
            <th>Nro Cajas</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total Producto</th>
            <th>Despacho</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        foreach ($purchases as $p) {
            $productQuery = "SELECT * FROM producto WHERE id_producto = $p[2];";
            $productResult = $db1 -> prepare($productQuery);
            $productResult -> execute();
            $products = $productResult -> fetchAll();
            foreach ($products as $product) {
                $total_prod = $product[2] * $p[5];
                $total += $total_prod;
                $deliveryQuery = "SELECT * FROM despacho WHERE id_compra = $p[0];";
                $deliveryResult = $db1 -> prepare($deliveryQuery);
                $deliveryResult -> execute();
                $deliveries = $deliveryResult -> fetchAll();
                foreach ($deliveries as $delivery) {
                    if ($delivery[2] == NULL) {
                        echo "<tr><td>$product[0]</td><td>$product[1]</td><td>$product[3]</td><td>$product[2]</td><td>$p[5]</td><td>$total_prod</td><td>Retiro en Tienda</td></tr>";
                    }
                    else {
                        echo "<tr><td>$product[0]</td><td>$product[1]</td><td>$product[3]</td><td>$product[2]</td><td>$p[5]</td><td>$total_prod</td><td>$delivery[2]</td></tr>";
                    }
                }
            }
        echo "<p>Total Compra: $total</p>";
        }
        ?>
    </tbody>
</table>

</body>

<?php include('../templates/footer.html'); ?>