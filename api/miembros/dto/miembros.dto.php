<?php

class MiembrosDto
{
  public int $id;
  public string $nombres;
  public string $apellidos;
  public string $genero;
  public string $tipoSangre;
  public string $tipoId;
  public string $fechaNac;
  public string $lugarNac;
  public string $nacionalidad;
  public int $telefono;
  public string $estadoCivil;
  public string $direccion;
  public string $escolaridad;
  public string $profesion;
  public string $indicacionesMedicas;
  public string $iglesiaAnterior;
  public string $fechaBautismo;
  public string $conyuge;
  public int $nHijos;
  public string $correo;
  public string $fechaMatrimonio;
  public string $lugarTrabajo;

  public function __construct($miembro)
  {
    $this->id = $miembro["id"];
    $this->nombres = $miembro["nombres"];
    $this->apellidos = $miembro["apellidos"];
    $this->genero = $miembro["genero"];
    $this->tipoSangre = $miembro["tipoSangre"];
    $this->tipoId = $miembro["tipoId"];
    $this->fechaNac = $miembro["fechaNac"];
    $this->lugarNac = $miembro["lugarNac"];
    $this->nacionalidad = $miembro["nacionalidad"];
    $this->telefono = $miembro["telefono"];
    $this->estadoCivil = $miembro["estadoCivil"];
    $this->direccion = $miembro["direccion"];
    $this->escolaridad = $miembro["escolaridad"];
    $this->profesion = $miembro["profesion"];
    $this->indicacionesMedicas = $miembro["indicacionesMedicas"];
    $this->iglesiaAnterior = $miembro["iglesiaAnterior"];
    $this->fechaBautismo = $miembro["fechaBautismo"];
    $this->conyuge = $miembro["conyuge"];
    $this->nHijos = $miembro["nHijos"];
    $this->correo = $miembro["correo"];
    $this->fechaMatrimonio = $miembro["fechaMatrimonio"];
    $this->lugarTrabajo = $miembro["lugarTrabajo"];
  }
}