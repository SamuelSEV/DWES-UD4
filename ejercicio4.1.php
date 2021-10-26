<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
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
            //mysqli_fetch_assoc
            echo "<h1>mysqli_fetch_assoc</h1>";
            $fila=mysqli_fetch_assoc($result); 
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($fila as $key => $value) {
                print_r ("<th>" . $key . "</th>");
            }
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_assoc($result)) {
                
                echo "<tr>";
                echo "<td>", $fila["ID"],"</td>";
                echo "<td>", $fila["Destino"],"</td>";
                echo "<td>", $fila["Origen"],"</td>";
                echo "<td>", $fila["Fecha"],"</td>";
                echo "<td>", $fila["Companya"],"</td>";
                echo "<td>", $fila["Modelo"],"</td>";
                echo "</tr>";
            }
            
            echo "</table>";

            //mysqli_fetch_object
            echo "<h1>mysqli_fetch_object</h1>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            $fila=mysqli_fetch_object($result); 
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($fila as $key => $value) {
                print_r ("<th>" . $key . "</th>");
            }
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_object($result)) {
                
                echo "<tr>";
                echo "<td>",$fila->ID,"</td>";
                echo "<td>",$fila->Origen,"</td>";
                echo "<td>",$fila->Destino,"</td>";
                echo "<td>",$fila->Fecha,"</td>";
                echo "<td>",$fila->Companya,"</td>";
                echo "<td>",$fila->Modelo,"</td>";
                echo "</tr>";
            }
            
            echo "</table>";

            //mysqli_fetch_array
            echo "<h1>mysqli_fetch_array</h1>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            $fila=mysqli_fetch_array($result); 
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Origen</th>";
            echo "<th>Destino</th>";
            echo "<th>Fecha</th>";
            echo "<th>Compañia</th>";
            echo "<th>Modelo</th>";
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_array($result)) {
                
                echo "<tr>";
                printf ("<td>%s</td>\n", $fila['ID']);
                printf ("<td>%s</td>\n", $fila['Origen']);
                printf ("<td>%s</td>\n", $fila['Destino']);
                printf ("<td>%s</td>\n", $fila['Fecha']);
                printf ("<td>%s</td>\n", $fila['Companya']);
                printf ("<td>%s</td>\n", $fila['Modelo']);
                echo "</tr>";
            }
            
            echo "</table>";

            //mysqli_fetch_row
            echo "<h1>mysqli_fetch_row</h1>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            $fila=mysqli_fetch_row($result); 
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Origen</th>";
            echo "<th>Destino</th>";
            echo "<th>Fecha</th>";
            echo "<th>Compañia</th>";
            echo "<th>Modelo</th>";
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_row($result)) {
                
            echo "<tr>";
            echo "<td>", $fila[0],"</td>";
            echo "<td>", $fila[1],"</td>";
            echo "<td>", $fila[2],"</td>";
            echo "<td>", $fila[3],"</td>";
            echo "<td>", $fila[4],"</td>";
            echo "<td>", $fila[5],"</td>";
            echo "</tr>";
            }
            
            echo "</table>";
            
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>