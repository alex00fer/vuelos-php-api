<?php

require_once 'dbConnect.php';
require_once 'utils.php';

function read($data) {

  $conn = get_conn();

  $query = "SELECT * FROM vuelos";
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
        "message" => "Updated sucessfully",
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
