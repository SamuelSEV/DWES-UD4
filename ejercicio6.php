<?php
    function creaConexion() {
        @$mysqli = mysqli_connect('localhost','root','root','agenciaviajes');
        $error = mysqli_connect_errno();
        if($error!=null){
            echo "<p>Error $error conectando a la base de datos: ", mysqli_connect_error(), "</p>";
            exit();
        }
        return $mysqli;
    }

    function creaVuelo ($origen, $destino, $fecha, $compañia, $modelo){
        $mysqli = creaConexion();
        $sql = "INSERT INTO vuelos (Origen, Destino, Fecha, Companya, Modelo) VALUES (?, ?, ?, ?, ?)";
        $consulta = mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $origen, $destino, $fecha, $compañia, $modelo);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }

    function modificaVuelo ($destino, $id){
        $mysqli = creaConexion();
        $sql="UPDATE vuelos SET Destino=? WHERE ID=?";
        $consulta = mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $destino, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }

    function modificaCompañia ($compañia, $id){
        $mysqli = creaConexion();
        $sql="UPDATE vuelos SET Companya=? WHERE ID=?";
        $consulta = mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "si", $compañia, $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
        
    }

    function eliminaVuelo ($id){
        $mysqli = creaConexion();
        $sql="DELETE FROM vuelos WHERE ID = ?";
        $consulta = mysqli_stmt_init($mysqli);
        $retorno=false;
        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            $retorno = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_close($mysqli);
        return $retorno;
    }

    function extraerVuelos() {
        $mysqli = creaConexion();
        $result = mysqli_query($mysqli,"SELECT * FROM vuelos");
        $retorno=false;
        if ($result==false) {
            echo "La consuelta no ha funcionado correctamente";
            echo "<br>";
        }
        else {
            $fila=mysqli_fetch_assoc($result); 
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($fila as $key => $value) {
                print_r ("<th>" . $key . "</th>");
            }
            echo "</tr>";
            $result = mysqli_query($mysqli,"SELECT * FROM `vuelos`");
            while ($fila=mysqli_fetch_assoc($result)) {
                
                echo "<tr>";
                foreach ($fila as $key) {
                    print_r ("<td>" . $key . "</td>");
                }
                echo "</tr>";
            }
            
            echo "</table>";
        }
        mysqli_close($mysqli);
        return $retorno;
    }

    function extraeVuelo(){
        $mysqli = creaConexion();
        $sql = "SELECT * FROM vuelos";
        $result = mysqli_query($mysqli, $sql);
        mysqli_close($mysqli);
        return $result;
        
    }
        

?>
