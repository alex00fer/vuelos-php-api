<?php

// Función que comprueba si los datos que recibimos existen
function has_all_post_vars(...$list){
  foreach ($list as $val) {
    if (!isset($_POST[$val])) return false;
  }
  return true;
}


// Función que comprueba si los datos que recibimos de un array existen
function assert_array_fields($obj, ...$list){
  foreach ($list as $val) {
    if (!isset($obj[$val]))
      die(format_error("Required field ".$val));
  }
}

function format_error($msg) {
  $result = array (
    "success"  => false,
    "error" => $msg
  );
  return json_encode($result, JSON_PRETTY_PRINT);
}

?>
