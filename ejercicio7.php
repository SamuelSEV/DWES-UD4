<?php
function crearConexion(){
    @$mysqli = new mysqli("localhost", "developer", "developer", "agenciaviajes");
    if ($mysqli->connect_errno) {
    echo "<p>Error conectando a la base de datos: ". $mysqli->connect_error;
    }
    return $mysqli;
}

function crearVuelo($origen,$destino,$fecha,$companya,$modelo){
    $mysqli = crearConexion();
    $sql = "INSERT INTO `vuelos` (Origen, Destino, Fecha, Companya, Modelo) VALUES (?,?,?,?,?)";
    $stmt = $mysqli -> stmt_init();
    $retorno=false;
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("sssss", $origen,$destino,$fecha,$companya,$modelo);
        $retorno = $stmt->execute();
        $stmt->close();

    }
    $mysqli->close();
    return $retorno;
}
function modificaVuelo ($destino, $id){
    $mysqli = creaConexion();
    $sql="UPDATE vuelos SET Destino=? WHERE ID=?";
    $consulta = $mysqli -> stmt_init($mysqli);
    $retorno=false;
    if ($stmt = $mysqli -> prepare($mysqli, $sql)) {
        $stmt -> bind_param($stmt, "si", $destino, $id);
        $retorno = $stmt -> execute($stmt);
        $stmt -> close($stmt);
    }
    $mysqli->close();
    return $retorno;
}

function modificaCompañia ($compañia, $id){
    $mysqli = creaConexion();
    $sql="UPDATE vuelos SET Companya=? WHERE ID=?";
    $consulta = $mysqli -> stmt_init($mysqli);
    $retorno=false;
    if ($stmt = $mysqli -> prepare($mysqli, $sql)) {
        $stmt -> bind_param($stmt, "si", $compañia, $id);
        $retorno = $stmt -> execute($stmt);
        $stmt -> close($stmt);
    }
    $mysqli->close();
    return $retorno;
}

function eliminaVuelo ($id){
    $mysqli = creaConexion();
    $sql="DELETE FROM vuelos WHERE ID = ?";
    $consulta = $mysqli -> stmt_init($mysqli);
    $retorno=false;
    if ($stmt = $mysqli -> prepare($mysqli, $sql)) {
        $stmt -> bind_param($stmt, "i", $id);
        $retorno = $stmt -> execute($stmt);
        $stmt -> close($stmt);
    }
    $mysqli->close();
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
    $mysqli -> close($mysqli);
    return $retorno;
}
?>