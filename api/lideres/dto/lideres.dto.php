<?php

class LideresDto
{
  public int $id;
  public int $idRol;
  public int $idMiembro;
  public int $idMinisterio;

  public function __construct($lider)
  {
    $this->id = $lider["id"];
    $this->idRol = $lider["idRol"];
    $this->idMiembro = $lider["idMiembro"];
    $this->idMinisterio = $lider["idMinisterio"];
  }
}
