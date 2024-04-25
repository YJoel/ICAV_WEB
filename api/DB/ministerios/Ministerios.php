<?php
class Ministerios
{
    public static function select($conn)
    {
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