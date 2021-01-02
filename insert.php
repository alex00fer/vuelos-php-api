<?php

require_once 'dbConnect.php';
require_once 'utils.php';

function insert($data) {
  assert_array_fields($data, 'codigo', 'origen', 'destino', 'fecha', 'hora', 'plazas', 'plazas_libres');

  $conn = get_conn();

  $codigo = mysqli_real_escape_string($conn, $data['codigo']);
  $origen = mysqli_real_escape_string($conn, $data['origen']);
  $destino = mysqli_real_escape_string($conn, $data['destino']);
  $fecha = intval(mysqli_real_escape_string($conn, $data['fecha']));
  $hora = mysqli_real_escape_string($conn, $data['hora']);
  $plazas = intval(mysqli_real_escape_string($conn, $data['plazas']));
  $plazas_libres = intval(mysqli_real_escape_string($conn, $data['plazas_libres']));
  $miQuery  = "DELETE FROM vuelos WHERE codigo = '$codigo'";

  $miQuery  = "INSERT into vuelos (codigo, origen, destino, fecha, hora, plazas, plazasLibres)";
  $miQuery .= " VALUES ('$codigo','$origen','$destino',(FROM_UNIXTIME($fecha)),'$hora',$plazas,$plazas_libres)";
  
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
/*
if(has_all_post_vars('nombre', 'descripcion','caracteristica', 'edad')){
  $miNombre=mysqli_real_escape_string($conn, $_POST['nombre']);
  $miDescripcion =mysqli_real_escape_string($conn, $_POST['descripcion']);
  $miCaracteristica = mysqli_real_escape_string($conn, $_POST['caracteristica']);
  $miEdad = mysqli_real_escape_string($conn, $_POST['edad']);

  $miQuery  = "INSERT into elementos (nombre, descripcion, caracteristica, edad)";
  $miQuery .= " VALUES ('$miNombre','$miDescripcion','$miCaracteristica', $miEdad)";

  if ($conn->query($miQuery)) {

      // Si se ha realizado correcamente la inserción nos quedamos con el útlimo id
      $idInsertado = $conn->insert_id;

      // En la respuesta además del estado y el mensaje, incluimos el id del último insertado
      $arrayMensaje = array(
        "status" =>  "success",
        "message" => "Inserted sucessfully",
        "withId" => $idInsertado
      );

  }else{  // Error en la query

      $arrayMensaje = array(
        "status" =>  "error",
        "message" => "Insert query failed"
      );
  }

}else{  // Me han enviado mal la información
  $arrayMensaje = array(
    "status" =>  "fail",
    "message" => "Bad data sent"
  );
}

$mensajeJSON = json_encode($arrayMensaje,JSON_PRETTY_PRINT);
echo $mensajeJSON;
*/
 ?>
