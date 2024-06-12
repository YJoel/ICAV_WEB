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
      $res = Finanzas::insert(
        $conn,
        array(
          "idMiembro" => $_POST["id"],
          "idAporte" => $_POST["aporteId"],
          "monto" => $_POST["monto"],
          "fecha" => $_POST["fecha"],
          "idServicio" => $_POST["idServicio"]
        )
      );

      echo json_encode(
        array(
          "res" => $res
        )
      );
    } elseif ($_POST["table"] == "lideres") {
      include "./lideres/Lideres.php";
      Lideres::insert(
        $conn,
        array(
          "idMiembro" => $_POST["cedula"],
          ""
        )
      );
    } elseif ($_POST["table"] == "miembros") {
      include "./miembros/Miembros.php";
      $res = Miembros::insert(
        $conn,
        array(
          "identificacion" => $_POST["identificacion"],
          "nombres" => $_POST["nombres"],
          "apellidos" => $_POST["apellidos"],
          "genero" => $_POST["genero"],
          "tipo_sangre" => $_POST["tiposangre"],
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
    } elseif ($_POST["table"] == "eventos") {
      include "./eventos/Eventos.php";

      $evento = array(
        "id" => $_POST["id"],
        "titulo" => $_POST["titulo"],
        "fInicio" => $_POST["fInicio"],
        "fFin" => $_POST["fFin"]
      );

      $res = Eventos::insert($conn, $evento);

      echo json_encode(
        array(
          "res" => $res
        )
      );
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
      Lideres::select($conn, array());
    } elseif ($_POST["table"] == "miembros") {
      include "./miembros/Miembros.php";
      echo json_encode(Miembros::select($conn, $_POST["condicion"]));
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
    } elseif ($_POST["table"] == "eventos") {
      include "./eventos/Eventos.php";
      echo json_encode(Eventos::select($conn));
    } elseif ($_POST["table"] == "cruzada") {

      $sql = $_POST["consulta"];
      $miembros = $conn->query($sql);

      $data = [];
      if ($miembros->num_rows > 0) {
        // output data of each row

        while ($miembro = $miembros->fetch_assoc()) {
          $res = array(
            "identificacion" => $miembro["id"],
            "nombres" => $miembro["nombres"],
            "apellidos" => $miembro["apellidos"],
            "fecha" => $miembro["fecha"],
            "monto" => $miembro["monto"]
          );
          array_push($data, $res);
        }

        echo json_encode($data);
      }
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
    } elseif ($_POST["table"] == "eventos") {
      include "./eventos/Eventos.php";

      $evento = array(
        "nombre" => $_POST["nombre"],
        "id" => $_POST["id"],
        "fInicio" => $_POST["start"],
        "fFin" => $_POST["end"],
        "cond" => $_POST["condicion"]
      );

      $res = Eventos::update($conn, $evento);

      echo json_encode(
        array(
          "res" => $res
        )
      );
    }
  } elseif ($_POST["op"] == "delete") {
    if ($_POST["table"] == "eventos") {
      include "./eventos/Eventos.php";
      echo json_encode(array("res" => Eventos::delete($conn, $_POST["condicion"])));
    }
  }
} else {
  echo "No se pudo conectar";
  $conn->close();
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