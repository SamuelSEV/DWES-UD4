<?php
    $mysqli = mysqli_connect('localhost','developer','developer','agenciaviajes');
    $error = mysqli_errno($mysqli);
    if($error!=null){
        echo "<p>Error $error conectando a la base de datos: ", mysqli_error($mysqli), "</p>";
        exit();
    }
    else{
        echo "conectado correctamente <br>";
    }
    mysqli_close($mysqli);
?>