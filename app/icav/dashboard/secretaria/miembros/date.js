function getEdad(fechaNacimiento) {
  const fechaActual = new Date();
  const fechaNac = new Date(fechaNacimiento);
  return fechaActual.getFullYear() - fechaNac.getFullYear();
}