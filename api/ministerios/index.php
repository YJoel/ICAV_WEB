<?php
header('Content-Type: application/json');
require_once "./controller/ministerios.controller.php";
require_once "./dto/ministerios.dto.php";

$ministeriosController = new MinisteriosController();
switch ($_SERVER["REQUEST_METHOD"]) {
  case "GET":
    if (isset($_GET["id"])) {
      echo $ministeriosController->getById($_GET["id"]);
    } else {
      echo $ministeriosController->getAll();
    }
    break;
  case "POST":
    $data = file_get_contents("php://input");
    $ministerioArray = json_decode($data, true);
    $ministerio = new LideresDto($ministerioArray);

    echo $ministeriosController->insert($ministerio);
    break;
  case "PUT":
    $data = file_get_contents("php://input");
    $ministerioArray = json_decode($data, true);
    $ministerio = new LideresDto($ministerioArray);

    echo $ministeriosController->update($ministerio);
    break;
  case "DELETE":
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'];
    echo json_encode($ministeriosController->delete($id));
    break;
}