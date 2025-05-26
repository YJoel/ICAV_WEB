<?php
require_once "./../db/db.php";

class LideresService
{
    private $conn = null;
    private $dbTable = "lideres";

    public function __construct()
    {
        $this->conn = DB::getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->dbTable JOIN miembros ON lideres.idMiembro = miembros.identificacion JOIN roles ON lideres.idRol = roles.id JOIN ministerios ON lideres.idMinisterio = ministerios.id;");
        $stmt->execute();
        $result = $stmt->get_result();

        $lideres = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lideres[] = $row;
            }
        }

        $stmt->close();

        return json_encode($lideres);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM $this->dbTable
            JOIN miembros ON lideres.idMiembro = miembros.identificacion
            WHERE BINARY idMiembro = ?;"
        );
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $lideres = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lideres[] = $row;
            }
        }

        $stmt->close();

        return json_encode($lideres);
    }
    public function insert($lider)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO $this->dbTable (id, idMiembro, idMinisterio, idRol) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "iiii",
            0,
            $lider->idMiembro,
            $lider->idMinisterio,
            $lider->idRol
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
    public function update($lider)
    {
        $stmt = $this->conn->prepare(
            "UPDATE $this->dbTable SET idMiembro = ?, idMinisterio = ?, idRol = ? WHERE idMiembro = ?"
        );
        $stmt->bind_param(
            "iiii",
            $lider->idMiembro,
            $lider->idMinisterio,
            $lider->idRol,
            $lider->idMiembro
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
            "DELETE FROM $this->dbTable WHERE idMiembro = ?"
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