<?php
    $servidor = "localhost";
    $basesDatos = "agenciaviajes";
    $usuario = "root";
    $pass = "root";
    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$basesDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "<br>";
        
        //INSERTAR
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Samuel', 'Rivera', 'Peñalosa', 'Sevilla', '623589741')";
        $numeroClientes = $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        echo "Se ha añadido $numeroClientes cliente nuevo con el id: $last_id . <br>";

        //ACTUALIZAR
        $sql = "UPDATE turista SET nombre='Carmen',apellido1='Rufo',apellido2='Palomo',direccion='Sevilla',telefono='159753648' WHERE id=3";
        $numeroClientesActualizados = $conn->exec($sql);
        echo "Se han modificado $numeroClientesActualizados cliente. <br>";
        
        //ELIMINAR
        $sql = "DELETE FROM turista WHERE id=1";
        $numeroClientesBorrados = $conn->exec($sql);
        echo "Se han eliminado $numeroClientesBorrados cliente. <br>";
    } catch (PDOexception $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }


    
    $conn = null;
?>