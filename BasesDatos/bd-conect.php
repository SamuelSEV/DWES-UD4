<?php
    @$mysqli = mysqli_connect('localhost','root','root','agenciaviajes');
    $error = mysqli_connect_errno();
    if($error!=null){
        echo "<p>Error $error conectando a la base de datos: ", mysqli_connect_error(), "</p>";
        exit();
    }
    else{
        echo "conectado correctamente <br>";
    }
    //CONSULTA
    $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
    var_dump($result);
    echo "<br>";

    //MOSTRAR LOS DATOS DE LA TABLA
    if ($result==false) {
        echo "La consuelta no ha funcionado correctamente";
        echo "<br>";
    }
    else {
        while ($fila=mysqli_fetch_assoc($result)) {
            print_r($fila);
            echo "<br>";
        }
    }
    mysqli_close($mysqli);
?>