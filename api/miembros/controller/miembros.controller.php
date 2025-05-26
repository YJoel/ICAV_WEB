<?php

require_once "./dto/miembros.dto.php";

class MiembrosController
{
  private $miembrosService = null;

  public function __construct()
  {
    require_once "./service/miembros.service.php";
    $this->miembrosService = new MiembrosService();
  }

  public function getAll()
  {
    return $this->miembrosService->getAll();
  }

  public function getById($id)
  {
    return $this->miembrosService->getById($id);
  }

  public function insert(MiembrosDto $miembro)
  {
    return $this->miembrosService->insert($miembro);
  }

  public function update(MiembrosDto $miembro)
  {
    return $this->miembrosService->update($miembro);
  }

  public function delete($id)
  {
    return $this->miembrosService->delete($id);
  }
}