<?php
class Eventos
{
    public static function select($conn)
    {
        if ($conn->connect_error) {
            return 0;
        }

        $sql = "SELECT * FROM eventos";
        $eventos = $conn->query($sql);
        $data = [];

        if ($eventos->num_rows > 0) {
            // output data of each row
            while ($evento = $eventos->fetch_assoc()) {
                $res = array(
                    "id" => $evento["id"],
                    "titulo" => $evento["nombre"],
                    "fInicio" => $evento["fecha_inicio"],
                    "fFin" => $evento["fecha_fin"],
                    "color" => $evento["color"]
                );

                array_push($data, $res);
            }
            return $data;
        }

        return 0;
    }
    public static function insert($conn, $data)
    {
        if ($conn->connect_error) {
            return 0;
        }

        $sql = "INSERT INTO eventos VALUES (
            '" . $data["id"] . "',
            '" . $data["titulo"] . "',
            '" . $data["fInicio"] . "',
            '" . $data["fFin"] . "',
            '" . $data["color"] . "'
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
    public static function update($conn, $data)
    {
        if ($conn->connect_error) {
            return 0;
        }

        $sql = "UPDATE eventos
        SET fecha_inicio = '" . $data["fInicio"] . "',
        fecha_fin = '" . $data["fFin"] . "',
        id = '" . $data["id"] . "',
        nombre = '" . $data["nombre"] . "',
        color = '" . $data["color"] . "'
        " . $data["cond"] . ";";

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
    public static function delete($conn, $cond)
    {
        if ($conn->connect_error) {
            return 0;
        }

        $sql = "DELETE FROM eventos $cond";

        if ($conn->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }

    }
}