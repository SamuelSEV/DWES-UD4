<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Ejercicio 7</title>
</head>
<body>
    <?php
        require 'ejercicio6.php';
        creaConexion();
        creaVuelo("Rusia","Cuba","2021-10-21 09:16:52","Airbus","A390");
        modificaVuelo("Madrid",6);
        modificaCompañia("Rayaner",10);
        eliminaVuelo(25);
        extraerVuelos();
        //extraeVuelo();

    ?>
</body>
</html>