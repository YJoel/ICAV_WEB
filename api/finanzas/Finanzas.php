<?php
class Finanzas
{
  public static function select($conn)
  {
    if ($conn->connect_error) {
      return 0;
    }

    $sql = "SELECT * FROM finanzas";
    $miembros = $conn->query($sql);

    $data = [];
    if ($miembros->num_rows > 0) {
      // output data of each row
      
      while ($miembro = $miembros->fetch_assoc()) {
        $res = array(
          "nombres" => $miembro["nombres"],
          "apellidos" => $miembro["apellidos"],
          "genero" => $miembro["genero"],
          "tipo_sangre" => $miembro["tipo_sangre"],
          "identificacion" => $miembro["identificacion"],
          "tipo" => $miembro["tipo"],
          "fecha_nac" => $miembro["fecha_nac"],
          "lug_nac" => $miembro["lug_nac"],
          "nacionalidad" => $miembro["nacionalidad"],
          "telefono" => $miembro["telefono"],
          "estado_civil" => $miembro["estado_civil"],
          "direccion" => $miembro["dirección"],
          "escolaridad" => $miembro["escolaridad"],
          "profesion" => $miembro["profesion"],
          "indicaciones_medicas" => $miembro["indicaciones_medicas"],
          "iglesia_anterior" => $miembro["iglesia_anterior"],
          "fecha_baut" => $miembro["fecha_baut"],
          "conyugue" => $miembro["conyugue"],
          "numero_hijos" => $miembro["numero_hijos"],
          "correo" => $miembro["correo"],
          "fecha_matr" => $miembro["fecha_matr"],
          "lug_trab" => $miembro["lug_trab"]
        );
        array_push($data, $res);
      }

      return $data;
      
    }

    return 0;
  }
  public static function insert($conn, $data)
  {
    // id	idMiembro	idAporte	monto	fecha	idServicio
    $sql = "INSERT INTO finanzas VALUES (
            NULL,
            " . $data["idMiembro"] . ",
            " . $data["idAporte"] . ",
            " . $data["monto"] . ",
            '" . $data["fecha"] . "',
            " . $data["idServicio"] . "
            )";

    try {
      //code...
      if ($conn->query($sql) === TRUE) {
        return 1;
        // echo "New record created successfully";
      } else {
        return 0;
        // echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } catch (\Throwable $th) {
      //throw $th;
      return 2;
    }
  }
  public static function update($conn)
  {
    return 0;
  }
}