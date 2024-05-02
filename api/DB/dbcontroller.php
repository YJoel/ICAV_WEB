<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "icav";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn->connect_error) {
  if ($_POST["op"] == "insert") {
    if ($_POST["table"] == "aporte") {
      include "./aporte/Aporte.php";
      Aporte::insert($conn);
    } elseif ($_POST["table"] == "asistencia") {
      include "./asistencia/Asistencia.php";
      Asistencia::insert($conn);
    } elseif ($_POST["table"] == "clases") {
      include "./clases/Clases.php";
      Clases::insert($conn);
    } elseif ($_POST["table"] == "escuelas") {
      include "./escuelas/Escuelas.php";
      Escuelas::insert($conn);
    } elseif ($_POST["table"] == "finanzas") {
      include "./finanzas/Finanzas.php";
      Roles::insert($conn);
    } elseif ($_POST["table"] == "lideres") {
      include "./lideres/Lideres.php";
      Lideres::insert($conn);
    } elseif ($_POST["table"] == "miembros") {
      include "./miembros/Miembros.php";
      $res = Miembros::insert(
        $conn,
        array(
          "nombres" => $_POST["nombres"],
          "apellidos" => $_POST["apellidos"],
          "genero" => $_POST["genero"],
          "identificacion" => $_POST["identificacion"],
          "tipo" => $_POST["tipoid"],
          "fecha_nac" => $_POST["fNacimiento"],
          "lug_nac" => $_POST["lNacimiento"],
          "nacionalidad" => $_POST["nacionalidad"],
          "telefono" => $_POST["telefono"],
          "estado_civil" => $_POST["estadocivil"],
          "direccion" => $_POST["direccion"],
          "escolaridad" => $_POST["nivelescolar"],
          "profesion" => $_POST["profesion"],
          "indicaciones_medicas" => $_POST["alergias"],
          "iglesia_anterior" => $_POST["resAIsino"],
          "fecha_baut" => $_POST["fechabautismo"],
          "conyugue" => $_POST["resCMsino"],
          "numero_hijos" => $_POST["nHijos"],
          "correo" => $_POST["correo"],
          "fecha_matr" => $_POST["fMatrimonio"],
          "lug_trab" => $_POST["lug_trab"]
        )
      );

      echo json_encode(array("result" => $res));

    } elseif ($_POST["table"] == "ministerios") {
      include "./ministerios/Ministerios.php";
      Ministerios::insert($conn);
    } elseif ($_POST["table"] == "roles") {
      include "./roles/Roles.php";
      Roles::insert($conn);
    } elseif ($_POST["table"] == "servicios") {
      include "./servicios/Servicios.php";
      Servicios::insert($conn);
    } elseif ($_POST["table"] == "usuarios") {
      include "./usuarios/Usuarios.php";
      Usuarios::insert($conn);
    } elseif ($_POST["table"] == "visitantes") {
      include "./visitantes/Visitantes.php";
      Visitantes::insert($conn);
    }
  } elseif ($_POST["op"] == "select") {
    if ($_POST["table"] == "aporte") {
      include "./aporte/Aporte.php";
      Aporte::select($conn);
    } elseif ($_POST["table"] == "asistencia") {
      include "./asistencia/Asistencia.php";
      Asistencia::select($conn);
    } elseif ($_POST["table"] == "clases") {
      include "./clases/Clases.php";
      Clases::select($conn);
    } elseif ($_POST["table"] == "escuelas") {
      include "./escuelas/Escuelas.php";
      Escuelas::select($conn);
    } elseif ($_POST["table"] == "finanzas") {
      include "./finanzas/Finanzas.php";
      Roles::select($conn);
    } elseif ($_POST["table"] == "lideres") {
      include "./lideres/Lideres.php";
      Lideres::select($conn);
    } elseif ($_POST["table"] == "miembros") {
      include "./miembros/Miembros.php";
      echo json_encode(Miembros::select($conn));
    } elseif ($_POST["table"] == "ministerios") {
      include "./ministerios/Ministerios.php";
      Ministerios::select($conn);
    } elseif ($_POST["table"] == "roles") {
      include "./roles/Roles.php";
      Roles::select($conn);
    } elseif ($_POST["table"] == "servicios") {
      include "./servicios/Servicios.php";
      Servicios::select($conn);
    } elseif ($_POST["table"] == "usuarios") {
      include "./usuarios/Usuarios.php";
      Usuarios::select($conn);
    } elseif ($_POST["table"] == "visitantes") {
      include "./visitantes/Visitantes.php";
      Visitantes::select($conn);
    }
  } elseif ($_POST["op"] == "update") {
    if ($_POST["table"] == "aporte") {
      include "./aporte/Aporte.php";
      Aporte::update($conn);
    } elseif ($_POST["table"] == "asistencia") {
      include "./asistencia/Asistencia.php";
      Asistencia::update($conn);
    } elseif ($_POST["table"] == "clases") {
      include "./clases/Clases.php";
      Clases::update($conn);
    } elseif ($_POST["table"] == "escuelas") {
      include "./escuelas/Escuelas.php";
      Escuelas::update($conn);
    } elseif ($_POST["table"] == "finanzas") {
      include "./finanzas/Finanzas.php";
      Roles::update($conn);
    } elseif ($_POST["table"] == "lideres") {
      include "./lideres/Lideres.php";
      Lideres::update($conn);
    } elseif ($_POST["table"] == "miembros") {
      include "./miembros/Miembros.php";
      Miembros::update($conn);
    } elseif ($_POST["table"] == "ministerios") {
      include "./ministerios/Ministerios.php";
      Ministerios::update($conn);
    } elseif ($_POST["table"] == "roles") {
      include "./roles/Roles.php";
      Roles::update($conn);
    } elseif ($_POST["table"] == "servicios") {
      include "./servicios/Servicios.php";
      Servicios::update($conn);
    } elseif ($_POST["table"] == "usuarios") {
      include "./usuarios/Usuarios.php";
      Usuarios::update($conn);
    } elseif ($_POST["table"] == "visitantes") {
      include "./visitantes/Visitantes.php";
      Visitantes::update($conn);
    }
  }
}

/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

$conn->close();