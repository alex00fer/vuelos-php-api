<?php

require_once 'dbConnect.php';
require_once 'utils.php';

function insert($data) {
  assert_array_fields($data, 'codigo', 'origen', 'destino', 'fecha', 'hora', 'plazas', 'plazas_libres');

  $conn = get_conn();

  $codigo = mysqli_real_escape_string($conn, $data['codigo']);
  $origen = mysqli_real_escape_string($conn, $data['origen']);
  $destino = mysqli_real_escape_string($conn, $data['destino']);
  $fecha = (mysqli_real_escape_string($conn, $data['fecha'])) + 0;
  $hora = mysqli_real_escape_string($conn, $data['hora']);
  $plazas = intval(mysqli_real_escape_string($conn, $data['plazas']));
  $plazas_libres = intval(mysqli_real_escape_string($conn, $data['plazas_libres']));
  $miQuery  = "DELETE FROM vuelos WHERE codigo = '$codigo'";

  $miQuery  = "INSERT into vuelos (codigo, origen, destino, fecha, hora, plazas, plazasLibres)";
  $miQuery .= " VALUES ('$codigo','$origen','$destino',(FROM_UNIXTIME($fecha/1000)),'$hora',$plazas,$plazas_libres)";
  
  if ($conn->query($miQuery)) {

    $idInsertado = $conn->insert_id;

    $result = array(
      "success" =>  true,
      "message" => "Inserted sucessfully",
      "codigo" => $codigo,
      "internal_id" => $idInsertado
    );
    echo json_encode($result, JSON_PRETTY_PRINT);

  } else {  // Error en la query
    die(format_error("Internal error: ".$conn->error));
  }
}

 ?>
