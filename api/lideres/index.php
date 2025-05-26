<?php
header('Content-Type: application/json');
require_once "./controller/lideres.controller.php";
require_once "./dto/lideres.dto.php";

$lideresController = new LideresController();
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET["id"])) {
            echo $lideresController->getById($_GET["id"]);
        } else {
            echo $lideresController->getAll();
        }
        break;
    case 'POST':
        // Recibir los datos por medio de php input
        $data = file_get_contents("php://input");
        $liderArray = json_decode($data, true);
        $lider = new LideresDto($liderArray);

        echo $lideresController->insert($lider);
        break;
    case 'PUT':
        $data = file_get_contents("php://input");
        $liderArray = json_decode($data, true);
        $lider = new LideresDto($liderArray);

        echo $lideresController->update($lider);
        break;
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $_DELETE);
        $id = $_DELETE['id'];
        echo json_encode($lideresController->delete($id));
        break;
}