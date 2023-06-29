
<?php
# no tocar estoy arreglandolo (Diego)

# accede a los PDO y obtiene las variables de db
include('../config/conexion.php');
include('../functions/rdm_str.php');

$string_thing = generate_string($perm_chars, 10);

if (isset($_POST['register'])){
    if (strlen($_POST['new_client_name'])>1 &&
    strlen($_POST['new_client_password'])>1 &&
    strlen($_POST['new_client_rut'])>=11 &&
    strlen($_POST['new_client_rut'])>10 &&
    strlen($_POST['new_client_rut'])<13 &&
    strlen($_POST['new_client_calle'])>1 &&
    strlen($_POST['new_client_numero'])>1){
        echo "<h2 class='subtitle'>Hola {$_POST['new_client_name']} </h2>";
    }
    else{
        echo "<h2 class='subtitle'> ¡Porfavor complete los datos!  </h2>";
        echo $string_thing;
    }
}

?>