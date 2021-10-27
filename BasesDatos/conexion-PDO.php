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

        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Samuel', 'Rivera', 'Peñalosa', 'Sevilla', '623589741')";
        $numeroClientes = $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        echo "Se ha añadido $numeroClientes cliente nuevo con el id: $last_id";
    } catch (PDOexception $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }


    
    $conn = null;
?>