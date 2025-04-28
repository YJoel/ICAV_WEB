<?php
class Lideres
{
    public static function select($conn, $cond)
    {
        if ($conn->connect_error) {
            return 0;
        }
        
        $sql = "SELECT * FROM lideres l, miembros m $cond";
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
    public static function insert($conn, $data)
    {
        return 0;
    }
    public static function update($conn)
    {
        return 0;
    }
}