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
        require 'ejercicio7.php';
        crearConexion();
        crearVuelo("Rusia","Cuba","2021-10-21 09:16:52","Airbus","A390");
        modificaVuelo("Madrid",12);
        modificaCompañia("Rayaner",13);
        eliminaVuelo(23);
        extraeVuelo();
        //extraeVuelo();

    ?>
</body>
</html>