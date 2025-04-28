<?php
require_once "./../db/db.php";

class MinisteriosService
{
    private $conn = null;
    private $dbTable = "ministerios";

    public function __construct()
    {
        $this->conn = DB::getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->dbTable");
        $stmt->execute();
        $result = $stmt->get_result();

        $usuarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
        return json_encode($usuarios);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM $this->dbTable
            WHERE BINARY id = $id;"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        $usuarios = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }
        return json_encode($usuarios);
    }

    public function insert()
    {

        return 0;
    }
    public function update()
    {
        return 0;
    }
}