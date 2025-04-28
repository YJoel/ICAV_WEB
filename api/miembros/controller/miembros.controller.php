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

  public function insert()
  {
    return $this->miembrosService->insert();
  }

  public function update()
  {
    return $this->miembrosService->update();
  }
}