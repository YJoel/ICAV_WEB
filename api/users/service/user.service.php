<?php
require_once "./../db/db.php";

class UserService
{
    private $conn = null;
    private $dbTable = "usuarios";

    public function __construct()
    {
        $this->conn = DB::getConnection();
    }

    private function getAll()
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
        return $usuarios;
    }

    public function authorizedGetAll()
    {
        return $this->getAll();
    }

    public function getOne(UserDto $user)
    {
        try {
            $stmt = $this->conn->prepare(
                "SELECT miembros.identificacion idUser, miembros.nombres nombres, miembros.apellidos apellidos, ministerios.nombre ministerio, roles.rol rol FROM
                (
                    (
                        (
                            (usuarios JOIN miembros ON
                                usuarios.usuario = '" . $user->usuario . "' AND
                                usuarios.contrasena = '" . $user->password . "' AND
                                miembros.identificacion = " . $user->usuario . "
                            ) JOIN lideres ON miembros.identificacion = lideres.idMiembro
                        ) JOIN ministerios ON lideres.idMinisterio = ministerios.id
                    ) JOIN roles ON lideres.idRol = roles.id
                );"
            );
            $stmt->execute();
            $result = $stmt->get_result();

            $usuarios = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $usuarios[] = $row;
                }
            }
            return $usuarios;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function getById($id)
    {
        try {
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
            return $usuarios;
        } catch (\Throwable $th) {
            return [];
        }

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