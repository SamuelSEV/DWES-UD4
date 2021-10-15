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
        while (!feof($file)) {
            echo "<tr>";
            $linea = explode(",", fgets($file));
            
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