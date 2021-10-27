<?php
    $servidor = "localhost";
    $basesDatos = "agenciaviajes";
    $usuario = "root";
    $pass = "root";
    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$basesDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "<br>";
        //consulta de obtencion SELECT

        $sql = "SELECT * FROM turista";
        $turistas=$conn->query($sql);
        while ($turista = $turistas->fetch()) {
            echo "El turista de nombre " . $turista['nombre'] . " " . $turista['apellido1'] . " " . $turista['apellido2'] . " es de " . $turista['direccion'] . "<br>"; 
        }
    } catch (PDOexception $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }


    
    $conn = null;
?>