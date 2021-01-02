<?php
// https://stackoverflow.com/questions/24468459/sending-a-json-to-server-and-retrieving-a-json-in-return-without-jquery

require 'utils.php';

$request = json_decode(file_get_contents('php://input'), true);
//assert_array_fields($request, "action", "data");

switch ($_SERVER['REQUEST_METHOD']) {
  case "POST":      // create
    require 'insert.php';
    insert($request);
    break;
  case "GET":       // read

    break;
  case "PUT":       // update
    require 'update.php';
    update($request);
    break;
  case "DELETE":    // delete
    require 'delete.php';
    delete($request);
    break;
  default:
    die(format_error("Invalid request type"));
}

//print_r($request);