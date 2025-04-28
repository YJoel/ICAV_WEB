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

  public function insert()
  {
    return $this->ministeriosService->insert();
  }

  public function update()
  {
    return $this->ministeriosService->update();
  }
}