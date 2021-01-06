<?php

function addQuerySearch($conn, &$query, $array) {
  $hasContent = false;
  foreach ($array as $key => $value) {
    if ($value != "") {
      if ($hasContent) $query.=" AND";
      else $query.=" WHERE";
      $key=mysqli_real_escape_string($conn, $key);
      $value=mysqli_real_escape_string($conn, $value);
      $query .= " `$key` LIKE '%$value%'";
      $hasContent = true;
    }
  }
}
?>
