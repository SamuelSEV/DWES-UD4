<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
        include 'ejercicio6.php';
        creaConexion();
        creaVuelo("Sevilla","Cordoba","2021-10-21 09:16:52","Airbus","A390");
        modificaVuelo(3,"Suiza");

    ?>
</body>
</html>