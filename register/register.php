
<?php
# no tocar estoy arreglandolo (Diego)

# accede a los PDO y obtiene las variables de db
require('../config/conexion.php');

if (isset($_POST['Registrarte'])){ ## esto es una prueba
    if (strlen($_POST['new_client_name'])>=1 && 
    strlen($_POST['new_client_password'])>=1 &&
    strlen($_POST['new_client_rut'])>=11 &&
    strlen($_POST['new_client_calle'])>1 &&
    $_POST['new_client_numero']>1 &&
    ){
        ?>
        <h1> Se Pudo</h1>
        <?php
    }
    else{
        ?>
        <h1> No se Pudo</h1>
        <?php
    }
}

?>