<?php

function get_conn() {
    mysqli_report(MYSQLI_REPORT_STRICT);

    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "adat_vuelos_php";
    try {
        $conn = new mysqli($servername, $user, $password, $dbname);
    } catch (Exception $e ) { 
        die(format_error("Error connecting to database"));
    }

    // Validate connection
    if ($conn->connect_error) {
        die(format_error("Error connecting to database ". $conn->connect_errno . ': ' . $conn->connect_error));
    }

    if (!$conn->set_charset("utf8")) {
        die(format_error("Error cargando el conjunto de caracteres utf8"));
    }

    return $conn;
}

?>
