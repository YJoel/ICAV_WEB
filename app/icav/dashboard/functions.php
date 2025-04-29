<?php

function revisarCredenciales()
{
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // $getData = json_decode(file_get_contents("php://input"), true);
    if (isset($_GET["idUser"])) {
      if ($_GET["idUser"] == $_SESSION["idUser"]) {
        $idUser = $_SESSION["idUser"];
        $nombres = $_SESSION["nombres"];
        $apellidos = $_SESSION["apellidos"];
        $ministerio = $_SESSION["ministerio"];
        $rol = $_SESSION["rol"];
      } else {
        header("location: http://localhost:3000/app/icav/");
      }
    } else {
      header("location: http://localhost:3000/app/icav/");
    }
  }

  return [$idUser, $nombres, $apellidos, $ministerio, $rol];
}