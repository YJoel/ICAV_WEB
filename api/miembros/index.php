<?php

require_once "./controller/miembros.controller.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_POST["id"])) {
    $miembrosController = new MiembrosController();
    echo $miembrosController->getById($id);
  } else {
    $miembrosController = new MiembrosController();
    echo $miembrosController->getAll();
  }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {


} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

  $miembrosController = new MiembrosController();
  echo $miembrosController->update();

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $miembrosController = new MiembrosController();
  echo $miembrosController->insert();

}