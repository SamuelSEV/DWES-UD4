<?php
    try {
        //CONECTAR BD
        function connectar (){
            $servidor = "localhost";
            $basesDatos = "agenciaviajes";
            $usuario = "root";
            $pass = "root";
            $conn = new PDO("mysql:host=$servidor;dbname=$basesDatos", $usuario, $pass);
            //echo "Conectado correctamente";
            return $conn;
        }

        //INSERTAR UN TURISTA
        function creaTurista($nombre, $apellido1, $apellido2, $direccion, $telefono){
            $conn = connectar();
            $insert=$conn->prepare("INSERT INTO turista (nombre, apellido1, apellido2, direccion, telefono) VALUES (?,?,?,?,?)");
            $insert->bindParam(1, $nombre);
            $insert->bindParam(2, $apellido1);
            $insert->bindParam(3, $apellido2);
            $insert->bindParam(4, $direccion);
            $insert->bindParam(5, $telefono);
            $insert->execute();
            $last_id = $conn->lastInsertId();
            $conn = null;
            return $last_id;
        }


        //EXTRAER UN TURISTA POR ID
        function extraeTurista($id){
            $conn = connectar();
            $consulta = "SELECT * FROM turista WHERE id = ?";
            $consulta = $conn->prepare($consulta);
            $consulta->bindParam(1, $id);
            $consulta->execute();
            $turista=$consulta->fetchAll();
            return $turista;
        }

        //EXTRAER TURISTAS EN UN ARRAY
        function extraeTuristas(){
            $conn = connectar();
            $consulta=$conn->query("SELECT * FROM turista");
            $turistas = $consulta->fetchAll(); 
            return var_dump($turistas);
        }


        //ACTUALIZAR LA DIRECCION DE UN TURISTA SEGUN SU NUMERO DE TELEFONO
        function actualizaTurista($id, $direccion, $telefono){
            $conn = connectar();
            $actualizar=$conn->prepare("UPDATE turista SET direccion=?,telefono=? WHERE id=?");
            $actualizar->bindParam(1, $direccion);
            $actualizar->bindParam(2, $telefono);
            $actualizar->bindParam(3, $id);
            $actualizar->execute();
            $retorno = $actualizar->execute();
            return $retorno;
        }

        //ELIMINAR TURISTA

        function eliminaTurista($id) {
            $conn = connectar();
            $eliminar = $conn->prepare("DELETE FROM turista WHERE id=?");
            $eliminar->bindParam(1, $id);
            $eliminar->execute();
            $retorno = $eliminar->execute();
            return $retorno;
        }
    } catch (PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }

    //PRUEBA CREAR TURISTA.
    creaTurista('Pepito', 'Palotea', 'Paletas', 'Sevilla', '555555555');

    //PRUEBA EXTRAER TURISTA.
    $turistas = extraeTurista(4);
    foreach($turistas as $turista) {
        echo "Nombre: " . $turista['nombre'] . " " . $turista['apellido1'] . " " . $turista['apellido2'] . " Dirección: " . $turista['direccion'] . " Teléfono: " . $turista['telefono'] . "<br>";
    }

    //PRUEBA EXTRAER TURISTAS array
    $turista = extraeTuristas();
    echo "<br>";
    //PRUEBA ACTUALIZAR TURISTA
    actualizaTurista(2,'Toledo','444444444');

    //PRUEBA ELIMINAR TURISTA POR ID
    eliminaTurista(3);
?>