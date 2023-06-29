<?php
# no tocar estoy arreglandolo (Diego)

# accede a los PDO y obtiene las variables de db
include('../config/conexion.php');
include('../functions/rdm_str.php');

$password = generate_string($perm_chars, 10);

if (isset($_POST['import'])){
    $query = "SELECT * FROM cliente ORDER BY id_cliente;";
    $result = $db1-> prepare($query);
    $result -> execute();
    $clientes = $result -> fetchAll();

    foreach ($clientes as $cliente){
        $password = generate_string($perm_chars, 10); #generamos una contraseña aleatoria
        $query = "SELECT user_client($cliente[0], '$cliente[1]'::varchar, '$password'::varchar);";

        // Ejecutamos las querys para efectivamente insertar los datos
        $result = $db1 -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }
}

?>