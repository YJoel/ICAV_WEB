<?php

require_once "./controller/ministerios.controller.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_POST["id"])) {
    $ministeriosController = new MinisteriosController();
    echo $ministeriosController->getById($id);
  } else {
    $ministeriosController = new MinisteriosController();
    echo $ministeriosController->getAll();
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {


} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

  $ministeriosController = new MinisteriosController();
  echo $ministeriosController->update();

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $ministeriosController = new MinisteriosController();
  echo $ministeriosController->insert();

}