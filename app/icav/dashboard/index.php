<?php

require_once "./Dashboard.php";

header("Content-Type: application/json");
session_start();

$DIR = "./../";
$dashboard = new Dashboard();

if (isset($_SESSION["idUser"])) {

  $lider = $dashboard->redirect($_SESSION["idUser"]);

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    echo json_encode($lider);

  } else {
    switch ($lider[0]["idMinisterio"]) {
      case 1: 
        header("location: ./administrador/?idUser=" . $_SESSION["idUser"]);
        break;
      case 2:
        header("location: ./arteymusica/?idUser=" . $_SESSION["idUser"]);
        break;
      case 3:
        header("location: ./audiovisuales/?idUser=" . $_SESSION["idUser"]);
        break;
      case 4:
        header("location: ./caballeros/?idUser=" . $_SESSION["idUser"]);
        break;
      case 5:
        header("location: ./damas/?idUser=" . $_SESSION["idUser"]);
        break;
      case 6:
        header("location: ./desarrollosocial/?idUser=" . $_SESSION["idUser"]);
        break;
      case 7:
        header("location: ./evangelismo/?idUser=" . $_SESSION["idUser"]);
        break;
      case 8:
        header("location: ./infancia/?idUser=" . $_SESSION["idUser"]);
        break;
      case 9:
        header("location: ./jovenes/?idUser=" . $_SESSION["idUser"]);
        break;
      case 10:
        header("location: ./ujier/?idUser=" . $_SESSION["idUser"]);
        break;
      case 11:
        header("location: ./escuelaparapadres/?idUser=" . $_SESSION["idUser"]);
        break;
      case 12:
        header("location: ./arteymusica/?idUser=" . $_SESSION["idUser"]);
        break;
      case 13:
        header("location: ./secretaria/?idUser=" . $_SESSION["idUser"]);
        break;
      default:
        header("location: ./../");
        break;
    }
  }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  header("location: ./../");

}


// header("location: ../");
