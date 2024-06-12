<?php

if (isset($_POST["usuario"]) && isset($_POST["password"])) {
    $nombre = $_POST["usuario"];
    $cedula = $_POST["password"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "icav";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo json_encode(array(
            "res" => 0
        ));
    }
    
    $miembros = $conn->query($_POST["consulta"]);
    if ($miembros->num_rows > 0) {
        while ($miembro = $miembros->fetch_assoc()) {
            echo json_encode(array(
                "res" => 1,
                "nombres" => $miembro["nombres"],
                "apellidos" => $miembro["apellidos"],
                "identificacion" => $miembro["cedula"],
                "ministerio" => $miembro["ministerio"],
                "id" => $miembro["idMinisterio"]
            ));
        }
    }
}