<?php
    $servidor = "localhost";
    $basesDatos = "agenciaviajes";
    $usuario = "root";
    $pass = "root";
    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$basesDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "<br>";
        $conn->beginTransaction();
        $falloConsultas = false;
        //INSERTAR 3 turistas
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Samuel', 'Rivera', 'Peñalosa', 'Sevilla', '623589741')";
        $numeroClientes = $conn->exec($sql);
        $last_id1 = $conn->lastInsertId();
        echo "Se ha añadido $numeroClientes cliente nuevo con el id: $last_id1 . <br>";
        if ($last_id1 > 0) {
            $falloConsultas = false;
        }
        else {
            $falloConsultas = true;
        }
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Alba', 'Rivera', 'Peñalosa', 'Sevilla', '951642378')";
        $numeroClientes = $conn->exec($sql);
        $last_id2 = $conn->lastInsertId();
        echo "Se ha añadido $numeroClientes cliente nuevo con el id: $last_id2 . <br>";
        if ($last_id2 > 0 && $last_id2!=$last_id1) {
            $falloConsultas = false;
        }
        else {
            $falloConsultas = true;
        }
        $sql = "INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES ('Adrian','Rivera', 'Peñalosa', 'Sevilla', '789456123')";
        $numeroClientes = $conn->exec($sql);
        $last_id3 = $conn->lastInsertId();
        echo "Se ha añadido $numeroClientes cliente nuevo con el id: $last_id3 . <br>";
        if ($last_id3 > 0 && $last_id3!=$last_id2)  {
            $falloConsultas = false;
        }
        else {
            $falloConsultas = true;
        }
        if ($falloConsultas) {
            $conn -> rollBack();
            echo "Fallo";
        }
        else {
            $conn ->commit();
        }
        $conn = null;
    } catch (PDOexception $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }    
?>