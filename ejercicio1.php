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
        echo "<th>";
            echo "<td>$linea[0]</td>" . "<td>$linea[1]</td>" . "<td>$linea[2]</td>" . "<td>$linea[3]</td>" . "<td>$linea[4]</td>" . "<td>$linea[5]</td>" . "<td>$linea[6]</td>" . "<td>$linea[7]</td>" . "<td>$linea[8]</td>" . "<td>$linea[9]</td>";
        echo "</th>";
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