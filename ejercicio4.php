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

            $fila=mysqli_fetch_assoc($result); 
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($fila as $key => $value) {
                print_r ("<td>" . $key . "</td>");
            }
            echo "</tr>";
            
            foreach ($fila as $key => $value) {
                echo "<tr>";
                    print_r ("<td>" . $fila[$key] . "</td>");
                    print_r ("<td>" . $fila[$key] . "</td>");
                    print_r ("<td>" . $fila[$key] . "</td>");
                    print_r ("<td>" . $fila[$key] . "</td>");
                    print_r ("<td>" . $fila[$key] . "</td>");
                    print_r ("<td>" . $fila[$key] . "</td>");
                echo "</tr>";
            }
            echo "</table>";
            
            
        }
        mysqli_close($mysqli);
    ?>
</body>
</html>