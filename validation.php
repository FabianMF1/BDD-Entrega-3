<?php
# no tocar estoy arreglandolo (Diego)

# accede a los PDO y obtiene las variables de db
include('config/conexion.php');
include('functions/rdm_str.php');


if (isset($_POST['import'])){
    # seleccionamos a todos los clientes de la tabla
    $query = "SELECT * FROM cliente ORDER BY id_cliente;";
    $result = $db1 -> prepare($query);
    $result -> execute();
    $clientes = $result -> fetchAll();
    #por cada uno
    foreach ($clientes as $cliente){
        $password = generate_string($perm_chars, 10); #generamos una contraseña aleatoria
        $query = "SELECT user_client('$cliente[0]', '$cliente[1]', '$password');";

        $result = $db1 -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }
}

if (isset($_POST['log_in'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $query = "SELECT * FROM usuario WHERE nombre = '$user_name' AND contrasena='$user_password';";
    $result = $db1 -> prepare($query);
    $result -> execute();
    $usuario = $result -> fetchAll();
    if ($usuario){ #si la consulta no es vacia, se trata de un usuario en la base de datos
        $id_u = $usuario[0][0];
        $name_u = $usuario[0][1];
        $type_u = $usuario[0][2];
        $password_u = $usuario[0][3];
        if ($type_u == 'admin'){ #redireccionamos al menu de administrador
            
            header('Location: admin/menu.php');
            exit();

        }
        else{ #redireccionamos al menu de cliente
            header('Location: client/menu.php');
            exit();
        }

    }
    else{
        echo "<h2 class='subtitle'> ¡Usuario o Contraseña Incorrectos!  </h2>";
    }
}

?>