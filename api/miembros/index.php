<?php
header('Content-Type: application/json');
require_once "./controller/miembros.controller.php";
require_once "./dto/miembros.dto.php";

$miembrosController = new MiembrosController();
switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    if (isset($_GET["id"])) {
      echo $miembrosController->getById($_GET["id"]);
    } else {
      echo $miembrosController->getAll();
    }
    break;
  case 'POST':
    //recibir los datos por medio de php input
    $data = file_get_contents("php://input");
    $miembroArray = json_decode($data, true);
    $miembro = new MiembrosDto($miembroArray);

    echo $miembrosController->insert($miembro);
    break;
  case 'PUT':
    $data = file_get_contents("php://input");
    $miembroArray = json_decode($data, true);
    $miembro = new MiembrosDto($miembroArray);

    echo $miembrosController->update($miembro);
    break;
  case 'DELETE':
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    echo json_encode($miembrosController->delete($id));
    break;
}