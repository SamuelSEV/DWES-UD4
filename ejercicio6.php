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
        function creaConexion() {
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
        function creaVuelo ($arg1, $arg2, $arg3, $arg4, $arg5){
            $origen = $arg1;
            $destino = $arg2;
            $fecha = $arg3;
            $compañia = $arg4;
            $modelo = $arg5;
            $sql = "INSERT INTO vuelos (Origen, Destino, Fecha, Companya, Modelo) VALUES (origen=?, destino=?, fecha=?, compañia=?, modelo=?)";
            $consulta = mysqli_stmt_init($mysqli);
            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $origen, $destino, $fecha, $compañia, $modelo);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }
        function modificaVuelo ($destino, $id){
            $sql="UPDATE vuelos SET Destino=? WHERE id=?";
            $consulta = mysqli_stmt_init($mysqli);
            if ($stmt = mysqli_prepare($mysqli, $sql)) {
                mysqli_stmt_bind_param($stmt, "si", $destino, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }

    ?>
</body>
</html>