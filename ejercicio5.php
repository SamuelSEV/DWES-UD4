<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
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

        //INSERT
        $result = mysqli_query($mysqli, "INSERT INTO vuelos (Origen, Destino, Fecha, Companya, Modelo) VALUES ('Dubai', 'Galicia', '2021-11-25 09:16:52', 'Iberia', 'A360')");
        if($result==false){
            echo "La consulta no ha funcionado correctamente";
        }
        else {
            echo "Se ha insertado ", mysqli_affected_rows($mysqli), " filas.";
            echo "<br>";
            echo "El ultimo vuelo insertado es ", mysqli_insert_id($mysqli);
            echo "<br>";
        }

        //UPDATE
        $result = mysqli_query($mysqli, "UPDATE `vuelos` SET Origen='Sevilla' WHERE ID='15'");
        if($result==false){
            echo "La consulta no ha funcionado correctamente";
        }
        else {
            echo "Se ha actualizado ", mysqli_affected_rows($mysqli), " filas.";
            echo "<br>";
        }

        //DELETE
        $result = mysqli_query($mysqli, "DELETE FROM `vuelos` WHERE Origen = 'Madrir'");
        if($result==false){
            echo "La consulta no ha funcionado correctamente";
        }
        else {
            echo "Se ha borrado ", mysqli_affected_rows($mysqli), " filas.";
            echo "<br>";
        }

        //mostrar tabla
        $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
        //MOSTRAR LOS DATOS DE LA TABLA
        if ($result==false) {
            echo "La consuelta no ha funcionado correctamente";
            echo "<br>";
        }
        else {
            //mysqli_fetch_assoc
            
            $fila=mysqli_fetch_assoc($result); 
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($fila as $key => $value) {
                print_r ("<td>" . $key . "</td>");
            }
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_assoc($result)) {
                
                echo "<tr>";
                foreach ($fila as $key) {
                    print_r ("<td>" . $key . "</td>");
                }
                echo "</tr>";
            }
            
            echo "</table>";
        }
    
    ?>
</body>
</html>