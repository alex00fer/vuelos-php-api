<?php
// https://stackoverflow.com/questions/24468459/sending-a-json-to-server-and-retrieving-a-json-in-return-without-jquery

require 'utils.php';

$request = json_decode(file_get_contents('php://input'), true);
assert_array_fields($request, "action", "data");

switch ($request["action"]) {
  case "create":
    require 'insert.php';
    insert($request['data']);
    break;
  case "read":

    break;
  case "update":

    break;
  case "delete":
    require 'delete.php';
    delete($request['data']);
    break;
  default:
    die(format_error("Invalid action"));
}

//print_r($request);