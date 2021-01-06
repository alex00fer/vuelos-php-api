<?php

require_once 'dbConnect.php';
require_once 'utils.php';
require_once 'readSearch.php';

function read($data) {

  $conn = get_conn();

  $query = "SELECT * FROM vuelos";
  @addQuerySearch($conn, $query, $data); // add search based on $data
  $result = $conn->query($query);

  if(isset($result) && $result){
    if ($result->num_rows > 0) {

      $arrayVuelos = array();
      $contador = 0;
      while($row = $result->fetch_assoc()) {
          array_push($arrayVuelos, $row);
          $contador++;
      }

      $result = array(
        "success" =>  true,
        "message" => "$contador items found",
        "num_vuelos" => $contador,
        "vuelos" => $arrayVuelos
      );

      echo json_encode($result, JSON_PRETTY_PRINT);
  
    } else {    // Table is empty
      die(format_error("No results"));
    }
  } else {  // Error en la query
    die(format_error("Internal error: ".$conn->error));
  }
}

?>
