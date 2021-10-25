<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php
        function conectBD (){
            @$mysqli = mysqli_connect('localhost','root','root','agenciaviajes');
            $error = mysqli_connect_errno();
            if($error!=null){
                echo "<p>Error $error conectando a la base de datos: ", mysqli_connect_error(), "</p>";
                exit();
            }
            else{
                echo "conectado correctamente <br>";
            }
        }
    ?>
</body>
</html>