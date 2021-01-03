<?php

require_once 'dbConnect.php';
require_once 'utils.php';

function delete($data) {
  assert_array_fields($data, 'codigo');

  $conn = get_conn();

  $codigo = mysqli_real_escape_string($conn, $data['codigo']);
  if ($codigo === "*")
    $miQuery  = "DELETE FROM vuelos";
  else
    $miQuery  = "DELETE FROM vuelos WHERE codigo = '$codigo'";

  if ($conn->query($miQuery)) {
    if ($conn->affected_rows < 1)
    die(format_error("Code not found"));
    $result = array(
      "success" =>  true,
      "message" => "Deleted sucessfully",
      "codigo" => $codigo
    );
    echo json_encode($result, JSON_PRETTY_PRINT);

  } else {  // Error en la query
    die(format_error("Internal error: ".$conn->error));
  }
}

/*
if(has_all_post_vars('id')){
  $miId = mysqli_real_escape_string($conn, $_POST['id']);

  $miQuery  = "DELETE FROM elementos WHERE id = $miId";

  if ($conn->query($miQuery) === TRUE) {

      // En la respuesta además del estado y el mensaje, incluimos el id del último insertado
      $arrayMensaje = array(
        "status" =>  "success",
        "message" => "Deleted sucessfully",
        "withId" => $miId
      );

  }else{  // Error en la query

      $arrayMensaje = array(
        "status" =>  "error",
        "message" => "Delete query failed"
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
