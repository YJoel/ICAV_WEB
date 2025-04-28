<?php

$serverNameBD = "localhost";
$userNameBD = "root";
$passwordBD = "";
$nameBD = "icav";

$conn = new mysqli(
    $serverNameBD,
    $userNameBD,
    password: $passwordBD,
    $nameBD
);


$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$idLider = $_POST["cedulaLider"];
$contrasena = $_POST["contrasena"];

/**
 * Verificando la existencia del usuario en la base de datos para evitar la duplicidad de información
 */
if (consultarUsuario($conn, $idLider)) {
    echo json_encode(array(
        "queryResult" => 0,
        "message" => "El usuario ya se encuentra registrado"
    ));
} else {
    if (consultarIdLider($conn, $idLider)) {
        $sql = "INSERT INTO usuarios VALUES (NULL, '$nombre', '$usuario', '$contrasena')";
        $usuariocreado = $conn->query($sql);
        if ($usuariocreado === TRUE) {
            echo json_encode(array(
                "queryResult" => $usuariocreado,
                "message" => "Usuario Creado con Éxito"
            ));
        } else {
            echo json_encode(array(
                "queryResult" => $usuariocreado,
                "message" => "Error al crear usuario"
            ));
        }
    } else {
        echo json_encode(array(
            "queryResult" => 1,
            "message" => "El número de cédula no se encontró en la base de datos de Lideres"
        ));
    }
}

$conn->close();

function consultarIdLider($conn, $_idLider)
{
    $sql = "SELECT * FROM lideres WHERE idMiembro = $_idLider";
    $lider = $conn->query($sql);
    if ($lider->num_rows > 0) {
        return 1;
    } else {
        return 0;
    }
}

function consultarUsuario($conn, $_idLider)
{
    $sql = "SELECT * FROM usuarios WHERE idMiembro = $_idLider";
    $lider = $conn->query($sql);
    if ($lider->num_rows > 0) {
        return 1;
    } else {
        return 0;
    }
}