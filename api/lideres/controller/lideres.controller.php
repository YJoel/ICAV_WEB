<?php

require_once "./dto/lideres.dto.php";

class LideresController
{
  private $lideresService = null;

  public function __construct()
  {
    require_once "./service/lideres.service.php";
    $this->lideresService = new LideresService();
  }

  public function getAll()
  {
    return $this->lideresService->getAll();
  }

  public function getById($id)
  {
    return $this->lideresService->getById($id);
  }
  public function insert(LideresDto $lider)
  {
    return $this->lideresService->insert($lider);
  }
  public function update(LideresDto $lider)
  {
    return $this->lideresService->update($lider);
  }
  public function delete($id)
  {
    return $this->lideresService->delete($id);
  }
}