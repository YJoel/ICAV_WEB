<?php
header('Content-Type: application/json');
require_once "./controller/user.controller.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo json_encode([
    "idUser" => $_SESSION["idUser"] ?? 0
  ]);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['origin'])) {
    if ($_POST['origin'] == 'login') {
      if (isset($_POST['usuario']) && isset($_POST['password'])) {
        $userController = new UserController();
        $user = new UserDto();
        $user->usuario = $_POST['usuario'];
        $user->password = $_POST['password'];
        $res = $userController->getOne($user);
        if ($res != []) {

          $_SESSION["idUser"] = $res[0]["idUser"];
          $_SESSION["nombres"] = $res[0]["nombres"];
          $_SESSION["apellidos"] = $res[0]["apellidos"];
          $_SESSION["ministerio"] = $res[0]["ministerio"];
          $_SESSION["rol"] = $res[0]["rol"];

          echo json_encode($res[0]);
        } else {
          echo json_encode(["error" => true, "message" => "Usuario o contraseña incorrectos"]);
        }
      }
    }
  } else {
    if (isset($_POST['admin'])) {
      if (isset($_GET['id'])) {
        $userController = new UserController();
        $res = $userController->getById($_GET['id']);
        if ($res != []) {
          // $_SESSION["idUser"] = $res["usuario"];
          echo json_encode($res);
        } else {
          echo json_encode([]);
        }
        echo json_encode($res);
      } else {
        $userController = new UserController();
        echo $userController->authorizedGetAll();
      }
    } else {
      if (isset($_GET['id'])) {
        $userController = new UserController();
        echo $userController->getById($_GET['id']);
      }
    }
  }


} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

  $userController = new UserController();
  echo $userController->update();

} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

  $userController = new UserController();
  echo $userController->insert();

}