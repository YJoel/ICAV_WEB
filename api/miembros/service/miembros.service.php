<?php
require_once "./../db/db.php";

class MiembrosService
{
    private $conn = null;
    private $dbTable = "miembros";

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

        $stmt->close();

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

        $stmt->close();

        return json_encode($usuarios);
    }

    public function insert($miembro)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO $this->dbTable VALUES
            (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "isssssssssssssssssisss",
            $miembro->id,
            $miembro->nombres,
            $miembro->apellidos,
            $miembro->genero,
            $miembro->tipoSangre,
            $miembro->tipoId,
            $miembro->fechaNac,
            $miembro->lugarNac,
            $miembro->nacionalidad,
            $miembro->telefono,
            $miembro->estadoCivil,
            $miembro->direccion,
            $miembro->escolaridad,
            $miembro->profesion,
            $miembro->indicacionesMedicas,
            $miembro->iglesiaAnterior,
            $miembro->fechaBautismo,
            $miembro->conyuge,
            $miembro->nHijos,
            $miembro->correo,
            $miembro->fechaMatrimonio,
            $miembro->lugarTrabajo
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
    public function update($miembro)
    {
        $stmt = $this->conn->prepare(
            "UPDATE $this->dbTable SET
            identificacion = ?,
            nombres = ?,
            apellidos = ?,
            genero = ?,
            tipo_sangre = ?,
            tipo = ?,
            fecha_nac = ?,
            lug_nac = ?,
            nacionalidad = ?,
            telefono = ?,
            estado_civil = ?,
            direccion = ?,
            escolaridad = ?,
            profesion = ?,
            indicaciones_medicas = ?,
            iglesia_anterior = ?,
            fecha_baut = ?,
            conyuge = ?,
            numero_hijos = ?,
            correo = ?,
            fecha_matr = ?,
            lug_trab = ?
            WHERE identificacion = ?"
        );

        $stmt->bind_param(
            "issssssssdssssssssisssi",
            $miembro->id,
            $miembro->nombres,
            $miembro->apellidos,
            $miembro->genero,
            $miembro->tipoSangre,
            $miembro->tipoId,
            $miembro->fechaNac,
            $miembro->lugarNac,
            $miembro->nacionalidad,
            $miembro->telefono,
            $miembro->estadoCivil,
            $miembro->direccion,
            $miembro->escolaridad,
            $miembro->profesion,
            $miembro->indicacionesMedicas,
            $miembro->iglesiaAnterior,
            $miembro->fechaBautismo,
            $miembro->conyuge,
            $miembro->nHijos,
            $miembro->correo,
            $miembro->fechaMatrimonio,
            $miembro->lugarTrabajo,
            $miembro->id
        );
        if (!$stmt->execute()) {
            $stmt->close();
            return json_encode([
                "error" => 1,
                "message" => "Fallo al editar el registro"
            ]);
        }
        $stmt->close();
        return json_encode([
            "error" => 0,
            "message" => "Registro editado con éxito"
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM $this->dbTable WHERE identificacion = ?"
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