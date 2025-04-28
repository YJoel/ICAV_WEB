<?php

require_once("./../../../api/db/db.php");
class Dashboard
{

  private $conn = null;
  private $dbTable = "lideres";

  public function __construct()
  {
    $this->conn = DB::getConnection();
  }

  public function redirect($idUser)
  {
    $stmt = $this->conn->prepare(
      "SELECT ministerios.id idMinisterio, ministerios.nombre ministerio, roles.id idRol , roles.rol rol
      FROM ($this->dbTable join ministerios
      on lideres.idMinisterio = ministerios.id
      AND lideres.idMiembro = $idUser) join roles
      on lideres.idRol = roles.id"
    );
    $stmt->execute();
    $result = $stmt->get_result();

    $lider = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $lider[] = $row;
      }
    }
    return $lider;
  }

}