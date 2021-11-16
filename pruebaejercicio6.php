<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Ejercicio 6</title>
</head>
<body>
    <?php
        require 'ejercicio6.php';
        creaConexion();
        creaVuelo("Sevilla","Jaen","2021-10-21 09:16:52","Airbus","A390");
        modificaVuelo("Suiza",3);
        modificaCompañia("Iberia",10);
        eliminaVuelo(28);
        extraerVuelos();
        $vuelos = extraeVuelo();
        while ($fila=mysqli_fetch_assoc($vuelos)) {
            print_r($fila);
            echo "<br>";
        }

    ?>
</body>
</html>