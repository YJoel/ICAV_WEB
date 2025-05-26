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
            WHERE BINARY id = ?;"
        );
        $stmt->bind_param("i", $id);
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

    public function insert($ministerio)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO $this->dbTable (id, nombre) VALUES (?, ?)"
        );
        $stmt->bind_param(
            "is",
            $ministerio->id,
            $ministerio->nombre
        );

        if (!$stmt->execute()) {
            $stmt->close();
            return json_encode([
                "error" => 1,
                "message" => "Fallo al insertar el registro"
            ]);
        }
        $stmt->close();
        return json_encode([
            "error" => 0,
            "message" => "Registro insertado con éxito"
        ]);
    }
    public function update($ministerio)
    {
        $stmt = $this->conn->prepare(
            "UPDATE $this->dbTable SET nombre = ? WHERE id = ?"
        );
        $stmt->bind_param(
            "si",
            $ministerio->nombre,
            $ministerio->id
        );

        if (!$stmt->execute()) {
            $stmt->close();
            return json_encode([
                "error" => 1,
                "message" => "Fallo al actualizar el registro"
            ]);
        }
        $stmt->close();
        return json_encode([
            "error" => 0,
            "message" => "Registro actualizado con éxito"
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM $this->dbTable WHERE id = ?"
        );
        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            $stmt->close();
            return json_encode([
                "error" => 1,
                "message" => "Fallo al eliminar el registro"
            ]);
        }
        $stmt->close();
        return json_encode([
            "error" => 0,
            "message" => "Registro eliminado con éxito"
        ]);
    }
}