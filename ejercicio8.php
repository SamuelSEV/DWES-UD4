<?php
    $servidor = "localhost";
    $basesDatos = "agenciaviajes";
    $usuario = "root";
    $pass = "root";
    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$basesDatos", $usuario, $pass);
        echo "Conectado correctamente";
        echo "<br>";
        
        //PDO::FETCH_ASSOC
        echo "<h1>PDO::FETCH_ASSOC</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Apellido2</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "</tr>";
        $sql = "SELECT * FROM turista";
        $turistas=$conn->query($sql);
        while ($turista = $turistas->fetch(PDO::FETCH_ASSOC)) {
            
            echo "<tr>";
            echo "<td>", $turista["id"],"</td>";
            echo "<td>", $turista["nombre"],"</td>";
            echo "<td>", $turista["apellido1"],"</td>";
            echo "<td>", $turista["apellido2"],"</td>";
            echo "<td>", $turista["direccion"],"</td>";
            echo "<td>", $turista["telefono"],"</td>";
            echo "</tr>";
        }
        
        echo "</table>";

        //PDO::FETCH_NUM
        echo "<h1>PDO::FETCH_NUM</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Apellido2</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "</tr>";
        $sql = "SELECT * FROM turista";
        $turistas=$conn->query($sql);
        while ($turista = $turistas->fetch(PDO::FETCH_NUM)) {
            
            echo "<tr>";
            echo "<td>", $turista[0],"</td>";
            echo "<td>", $turista[1],"</td>";
            echo "<td>", $turista[2],"</td>";
            echo "<td>", $turista[3],"</td>";
            echo "<td>", $turista[4],"</td>";
            echo "<td>", $turista[5],"</td>";
            echo "</tr>";
        }
        
        echo "</table>";

        //PDO::FETCH_BOTH
        echo "<h1>PDO::FETCH_BOTH</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Apellido2</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "</tr>";
        $sql = "SELECT * FROM turista";
        $turistas=$conn->query($sql);
        while ($turista = $turistas->fetch(PDO::FETCH_BOTH)) {
            
            echo "<tr>";
            printf("<td>%s</td>", $turista['id'] ) ;
            printf ("<td>%s</td>\n", $turista['nombre']);
            printf ("<td>%s</td>\n", $turista['apellido1']);
            printf ("<td>%s</td>\n", $turista['apellido2']);
            printf ("<td>%s</td>\n", $turista['direccion']);
            printf ("<td>%s</td>\n", $turista['telefono']);
            echo "</tr>";
        }
        
        echo "</table>";

        //PDO::FETCH_OBJ
        echo "<h1>PDO::FETCH_OBJ</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Apellido2</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "</tr>";
        $sql = "SELECT * FROM turista";
        $turistas=$conn->query($sql);
        while ($turista = $turistas->fetch(PDO::FETCH_OBJ)) {
            
            echo "<tr>";
            echo "<td>", $turista -> id,"</td>";
            echo "<td>", $turista -> nombre,"</td>";
            echo "<td>", $turista -> apellido1,"</td>";
            echo "<td>", $turista -> apellido2,"</td>";
            echo "<td>", $turista -> direccion,"</td>";
            echo "<td>", $turista -> telefono,"</td>";
            echo "</tr>";
        }

        echo "</table>";


        //PDO::FETCH_LAZY
        echo "<h1>PDO::FETCH_LAZY</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Apellido2</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "</tr>";
        $sql = "SELECT * FROM turista";
        $turistas=$conn->query($sql);
        while ($turista = $turistas->fetch(PDO::FETCH_LAZY)) {
            
            echo "<tr>";
            echo "<td>", $turista -> id,"</td>";
            echo "<td>", $turista -> nombre,"</td>";
            echo "<td>", $turista -> apellido1,"</td>";
            echo "<td>", $turista -> apellido2,"</td>";
            echo "<td>", $turista -> direccion,"</td>";
            echo "<td>", $turista[5] ,"</td>";
            echo "</tr>";
        }

        echo "</table>";

        //PDO::FETCH_BOUND
        echo "<h1>PDO::FETCH_BOUND</h1>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido1</th>";
        echo "<th>Apellido2</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "</tr>";
        $sql = "SELECT * FROM turista";
        $turistas=$conn->query($sql);
        $turistas->execute();
        $turistas->bindColumn(1, $id);
        $turistas->bindColumn(2, $nombre);
        $turistas->bindColumn(3, $apellido1);
        $turistas->bindColumn(4, $apellido2);
        $turistas->bindColumn(5, $direccion);
        $turistas->bindColumn(6, $telefono);
        while ($turista = $turistas->fetch(PDO::FETCH_BOUND)) {
            
            echo "<tr>";
            echo "<td>", $id,"</td>";
            echo "<td>", $nombre,"</td>";
            echo "<td>", $apellido1,"</td>";
            echo "<td>", $apellido2,"</td>";
            echo "<td>", $direccion,"</td>";
            echo "<td>", $telefono,"</td>";
            echo "</tr>";
        }

        echo "</table>";

       
    } catch (PDOexception $e) {
        echo "Conexion fallida: " . $e->getMessage();
    }
    $conn = null;
?>