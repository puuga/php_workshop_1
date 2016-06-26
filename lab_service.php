<?php
  $id = $_GET["id"];

  $person["id"] = $id;
  $person["name"] = "I have no name.";

  header('Content-Type: application/json');
  echo json_encode($person);
?>
