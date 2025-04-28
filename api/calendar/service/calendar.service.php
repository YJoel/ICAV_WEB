<?php
require_once "./../db/db.php";

class CalendarService
{

  private $conn = null;
  private $dbTable = "eventos";

  public function __construct()
  {
    $this->conn = DB::getConnection();
  }

  public function getAll()
  {
    $query = "SELECT resourceId, title, start, end, backgroundColor FROM $this->dbTable";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $eventos = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $eventos[] = $row;
      }
    }
    return $eventos;
  }

  public function getById(string $resourceId)
  {
    $query = "SELECT * FROM $this->dbTable WHERE resourceId = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $resourceId);
    $stmt->execute();
    $result = $stmt->get_result();

    $evento = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $evento = $row;
      }
    }
    return $evento;
  }

  public function insert(CalendarDto $evento)
  {
    $query = "INSERT INTO $this->dbTable (resourceId, title, start, end, backgroundColor) VALUES (?, ?, ?, ?, ?)";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("sssss", $evento->resourceId, $evento->title, $evento->start, $evento->end, $evento->backgroundColor);
    $stmt->execute();
    return [
      "queryResult" => $stmt->affected_rows,
      "evento" => $evento
    ];
  }

  public function update(CalendarDto $evento, string $title)
  {
    $query = "UPDATE $this->dbTable SET resourceId = ?, title = ?, start = ?, end = ?, backgroundColor = ? WHERE title = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ssssss", $evento->resourceId, $evento->title, $evento->start, $evento->end, $evento->backgroundColor, $title);
    $stmt->execute();
    
    return [
      "sql" => $query,
      "queryResult" => $stmt->affected_rows,
      "evento" => $evento
    ];
  }

  public function remove(string $resourceId)
  {
    $query = "DELETE FROM $this->dbTable WHERE resourceId = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("s", $resourceId);
    $stmt->execute();
    return $stmt->affected_rows;
  }

}