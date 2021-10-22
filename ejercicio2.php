<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <table border=1>
        <?php
            $file = fopen("locations.csv", "a+");
            fputcsv($file, array("Sevilla","-21.20972222,-43.15555556"));
            fclose($file);

            $file = fopen("locations.csv", "r");
            $linea = fgetcsv($file);
            echo "<tr>";
            echo "<th>$linea[0]</th>" . "<th>$linea[1]</th>" ;
            echo "</tr>";
            while (fgetcsv($file) == true) {
                $linea = (fgetcsv($file));
                echo "<tr>";
                
                echo "<td>$linea[0]</td>";
                echo "<td>$linea[1]</td>";
                
                echo "</tr>";   
            }
            fclose($file);

            
                
            
        ?>
    </table>
    
    
</body>
</html>