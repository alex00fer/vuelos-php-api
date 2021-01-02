<?php

function get_conn() {

    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "adat_vuelos_php";

    $conn = new mysqli($servername, $user,$password,$dbname);

    // Validate connection
    if ($conn->connect_error) {
        die(format_error($conn->connect_error));
    }

    if (!$conn->set_charset("utf8")) {
        die(format_error("Error cargando el conjunto de caracteres utf8"));
    }

    return $conn;
}

?>
