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
    if($_POST["table"] == "aporte"){

    }
    elseif($_POST["table"] == "asistencia"){

    }
    elseif($_POST["table"] == "clases"){

    }
    elseif($_POST["table"] == "escolaridad"){

    }
    elseif($_POST["table"] == "escuelas"){

    }
    elseif($_POST["table"] == "finanzas"){

    }
    elseif($_POST["table"] == "lideres"){

    }
    elseif($_POST["table"] == "miembros"){
      // echo "vamos bien";
      include "./miembros/Miembros.php";
      echo Miembros::insert($conn, array(
        "nombres"=>$_POST["nombres"],
        "apellidos"=>$_POST["apellidos"],
        "genero"=>$_POST["genero"],
        "identificacion"=>$_POST["identificacion"],
        "tipo"=>$_POST["tipoid"],
        "fecha_nac"=>$_POST["fNacimiento"],
        "lug_nac"=>$_POST["lNacimiento"],
        "nacionalidad"=>$_POST["nacionalidad"],
        "telefono"=>$_POST["telefono"],
        "estado_civil"=>$_POST["estadocivil"],
        "direccion"=>$_POST["direccion"],
        "escolaridad"=>$_POST["nivelescolar"],
        "profesion"=>$_POST["profesion"],
        "indicaciones_medicas"=>$_POST["alergias"],
        "iglesia_anterior"=>$_POST["resAIsino"],
        "fecha_baut"=>$_POST["fechabautismo"],
        "conyugue"=>$_POST["resCMsino"],
        "numero_hijos"=>$_POST["nHijos"],
        "correo"=>$_POST["correo"],
        "fecha_matr"=>$_POST["fMatrimonio"],
        "lug_trab"=>$_POST["lug_trab"]
      ));
    }
    // INSERT IN MINISTERIOS
    elseif($_POST["table"] == "ministerios"){
      include "./ministerios/Ministerios.php";
      Ministerios::insert($conn);
    }
    // INSERT IN MINISTERIOS
    elseif($_POST["table"] == "roles"){
      include "./roles/Roles.php";
      Ministerios::insert($conn);
    }
    elseif($_POST["table"] == "servicios"){

    }
    elseif($_POST["table"] == "usuarios"){

    }
    elseif($_POST["table"] == "visitantes"){

    }
  }
  elseif ($_POST["op"] == "select") {

  }
  elseif ($_POST["op"] == "update") {

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