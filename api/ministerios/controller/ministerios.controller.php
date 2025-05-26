<?php

require_once "./dto/ministerios.dto.php";

class MinisteriosController
{
  private $ministeriosService = null;

  public function __construct()
  {
    require_once "./service/ministerios.service.php";
    $this->ministeriosService = new MinisteriosService();
  }

  public function getAll()
  {
    return $this->ministeriosService->getAll();
  }

  public function getById($id)
  {
    return $this->ministeriosService->getById($id);
  }

  public function insert($ministerio)
  {
    return $this->ministeriosService->insert($ministerio);
  }

  public function update($ministerio)
  {
    return $this->ministeriosService->update($ministerio);
  }

  public function delete($id)
  {
    return $this->ministeriosService->delete($id);
  }
}