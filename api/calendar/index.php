<?php

header('Content-Type: application/json');
require_once "./controller/calendar.controller.php";

$eventController = new CalendarController();

switch ($_SERVER['REQUEST_METHOD']) {
  case 'GET':
    if (isset($_GET['resourceId'])) {
      echo json_encode($eventController->getById($_GET['resourceId']));
    } else {
      echo json_encode($eventController->getAll());
    }
    break;
  case 'POST':
    $data = file_get_contents("php://input");

    // Decodificar datos JSON a un array asociativo
    $postData = json_decode($data, true);

    $eventoJS = $postData['evento'];

    $evento = new CalendarDto(
      $eventoJS["resourceId"],
      $eventoJS["title"],
      $eventoJS["start"],
      $eventoJS["end"],
      $eventoJS["backgroundColor"],
    );

    // // echo json_encode($evento);
    echo json_encode($eventController->insert($evento));
    break;
  case 'PUT':
    // Obtener datos de la petición PUT
    $data = file_get_contents("php://input");

    // Decodificar datos JSON a un array asociativo
    $putData = json_decode(
      $data,
      true,
    );

    $eventoJS = $putData['evento'];
    $title = $putData['title'];

    $evento = new CalendarDto(
      $eventoJS["resourceId"][0],
      $eventoJS["title"],
      $eventoJS["start"],
      $eventoJS["end"],
      $eventoJS["backgroundColor"],
    );
    echo json_encode($eventController->update($evento, $title));
    break;
  case 'DELETE':
    $data = $_PUT['id'];
    echo json_encode($eventController->remove($data['id']));
    break;
  default:
    break;
}