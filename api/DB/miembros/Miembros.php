<?php
class Miembros
{
    public static function select($conn)
    {
        if ($conn->connect_error) {
            return 0;
        }
        
        $sql = "SELECT * FROM miembros";
        $miembros = $conn->query($sql);

        if ($miembros->num_rows > 0) {
            // output data of each row
            return json_encode($miembros->fetch_assoc());
            /*
            while ($miembro = $miembros->fetch_assoc()) {
                echo "id: " . $miembro["id"] . " - Name: " . $miembro["firstname"] . " " . $row["lastname"] . "<br>";
            }*/
        } else {
            echo json_encode(array());
        }
        return 0;
    }
    public static function insert($conn, $data)
    {
        if ($conn->connect_error) {
            return 0;
        }

        $sql = "INSERT INTO miembros VALUES
            (NULL,
            '" . $data["nombres"] . "',
            '" . $data["apellidos"] . "',
            '" . $data["genero"] . "',
            " . $data["identificacion"] . ",
            '" . $data["tipo"] . "',
            '" . $data["fecha_nac"] . "',
            '" . $data["lug_nac"] . "',
            '" . $data["nacionalidad"] . "',
            " . $data["telefono"] . ",
            '" . $data["estado_civil"] . "',
            '" . $data["direccion"] . "',
            '" . $data["escolaridad"] . "',
            '" . $data["profesion"] . "',
            '" . $data["indicaciones_medicas"] . "',
            '" . $data["iglesia_anterior"] . "',
            '" . $data["fecha_baut"] . "',
            '" . $data["conyugue"] . "',
            " . $data["numero_hijos"] . ",
            '" . $data["correo"] . "',
            '" . $data["fecha_matr"] . "',
            '" . $data["lug_trab"] . "',
            )";

        if ($conn->query($sql) === TRUE) {
            return 1;
            // echo "New record created successfully";
        } else {
            return 0;
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    public static function update($conn)
    {
        return 0;
    }
    public static function delete($conn)
    {
        return 0;
    }
}