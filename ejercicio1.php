<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

</head>
<body>
    <table border="1">
    <?php
        $file = fopen("starwars.txt", "r");
        $linea = explode(",", fgets($file));
        echo "<tr>";
        
        echo "<th>$linea[0]</th>" . "<th>$linea[1]</th>" . "<th>$linea[2]</th>" . "<th>$linea[3]</th>" . "<th>$linea[4]</th>" . "<th>$linea[5]</th>" . "<th>$linea[6]</th>" . "<th>$linea[7]</th>" . "<th>$linea[8]</th>" . "<th>$linea[9]</th>";
        
        echo "</tr>";
        while (!feof($file)) {
            $linea = explode(",", fgets($file));
            echo "<tr>";
            foreach ($linea as $key) {
                echo "<td>$key</td>";
            }
            echo "</tr>";
            
        }

        fclose($file);
        $file = fopen("starwars.txt", "a+");
        fwrite($file, "\n Samuel Rivera");
        fclose($file);
    ?>
    

    </table>
</body>
</html>