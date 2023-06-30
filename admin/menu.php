<?php include('templates/header.html')?>

<body>
  <p style="text-align:center;">Bienvenido Administrador</p>
  <div class='container'>
        <?php
        require("../config/conexion.php");
        // Consulta SQL para obtener los nombres de la tabla Regiones
        $query = "SELECT DISTINCT region FROM relacion_comunaregion";
        $result = $db2->prepare($query);
        $result->execute();
        $regiones = $result->fetchAll(PDO::FETCH_COLUMN); ?>
            <h3>Seleccionar Región</h3>
            <form action='./shops.php' method='POST'>
                <select name='region'>
                    <?php foreach ($regiones as $region) { ?>
                        <option value='<?php echo $region; ?>'><?php echo $region; ?></option>
                    <?php } ?>
                </select>
                <input class='btn' type='submit' value='Consultar'>
            </form>
        </div>
        <?php include('../templates/footer.html'); ?>
  <br>
  <br>