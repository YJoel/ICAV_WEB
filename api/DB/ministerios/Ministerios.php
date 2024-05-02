<?php
class Ministerios
{
    public static function select($conn)
    {
        if ($conn->connect_error) {
            return 0;
        }
        
        $sql = "SELECT * FROM ministerios";
        $miembros = $conn->query($sql);

        if ($miembros->num_rows > 0) {
            // output data of each row
            return json_encode($miembros->fetch_assoc());
            /*
            while ($miembro = $miembros->fetch_assoc()) {
                echo "id: " . $miembro["id"] . " - Name: " . $miembro["firstname"] . " " . $row["lastname"] . "<br>";
            }*/
        }

        return 0;
    }
    public static function insert($conn)
    {
        $sql = "INSERT INTO ministerios VALUES (NULL, ,)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        return 0;
    }
    public static function update($conn)
    {
        return 0;
    }
}