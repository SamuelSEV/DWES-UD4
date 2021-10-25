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

            //mysqli_fetch_object
            echo "<h1>mysqli_fetch_object</h1>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            $fila=mysqli_fetch_object($result); 
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($fila as $key => $value) {
                print_r ("<td>" . $key . "</td>");
            }
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_object($result)) {
                
                echo "<tr>";
                foreach ($fila as $key) {
                    print_r ("<td>" . $key . "</td>");
                }
                echo "</tr>";
            }
            
            echo "</table>";

            //mysqli_fetch_array
            echo "<h1>mysqli_fetch_array</h1>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            $fila=mysqli_fetch_array($result); 
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>ID</td>";
            echo "<td>Origen</td>";
            echo "<td>Destino</td>";
            echo "<td>Fecha</td>";
            echo "<td>Compañia</td>";
            echo "<td>Modelo</td>";
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_array($result)) {
                
                echo "<tr>";
                printf ("<td>%s</td>\n", $fila[0]);
                printf ("<td>%s</td>\n", $fila[1]);
                printf ("<td>%s</td>\n", $fila[2]);
                printf ("<td>%s</td>\n", $fila[3]);
                printf ("<td>%s</td>\n", $fila[4]);
                printf ("<td>%s</td>\n", $fila[5]);
                echo "</tr>";
            }
            
            echo "</table>";

            //mysqli_fetch_row
            echo "<h1>mysqli_fetch_row</h1>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            $fila=mysqli_fetch_row($result); 
            echo "<table border='1'>";
            echo "<tr>";

            foreach ($fila as $key => $value) {
                print_r ("<td>" . $key . "</td>");
            }
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_row($result)) {
                
                echo "<tr>";
                foreach ($fila as $key) {
                    print_r ("<td>" . $key . "</td>");
                }
                echo "</tr>";
            }
            
            echo "</table>";
            
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>