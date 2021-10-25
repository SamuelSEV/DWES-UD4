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

    //BORRAR FILA
     $result = mysqli_query($mysqli, "DELETE FROM `vuelos` WHERE Origen = 'Barcelona'");
     if($result==false){
         echo "La consulta no ha funcionado correctamente";
     }
     else {
         echo "Se ha borrado ", mysqli_affected_rows($mysqli), " filas.";
     }
     
     //INSERTAR 
     $result = mysqli_query($mysqli, "INSERT INTO vuelos (Origen, Destino, Fecha, Companya, Modelo) VALUES ('Madrid', 'Valencia', '2021-10-21 09:16:52', 'Iberia', 'A380')");
     if($result==false){
         echo "La consulta no ha funcionado correctamente";
     }
     else {
         echo "Se ha borrado ", mysqli_affected_rows($mysqli), " filas.";
         echo "<br>";
         echo "El ultimo vuelo insertado es ", mysqli_insert_id($mysqli);
     }

     //ACTUALIZAR
     $result = mysqli_query($mysqli, "UPDATE `vuelos` SET Origen='Dos Hermanas' WHERE ID='6'");
     if($result==false){
         echo "La consulta no ha funcionado correctamente";
     }
     else {
         echo "Se ha actualizado ", mysqli_affected_rows($mysqli), " filas.";
     }

    //ACTUALIZACION 
    $origen = "Sevilla";
    $id = 19;
    $sql="UPDATE vuelos SET Origen=? WHERE id=?";
    $consulta = mysqli_stmt_init($mysqli);
    if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $origen, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    //Extraccion de datos
    $origen = "Sevilla";
    $id = 19;
    $sql="SELECT * FROM vuelos WHERE Origen=? AND id=?";
    $consulta = mysqli_stmt_init($mysqli);
    if ($stmt = mysqli_prepare($mysqli, $sql)) {
        mysqli_stmt_bind_param($stmt, "si", $origen, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $origen, $destino, $fecha, $compañia, $modelo);
        while (mysqli_stmt_fetch($stmt)) {
            print "El vuelo con destino $destino y origen $origen esta previsto para la fecha $fecha, es operado por la compañia $compañia y el modelo $modelo.";
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($mysqli);
?>