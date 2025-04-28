class Usuario {
  constructor(_nombre, _usuario, _contrasena) {
    this.nombre = _nombre;
    this.usuario = _usuario;
    this.contrasena = _contrasena;
  }

  getNombre() {
    return this.nombre;
  }

  setNombre(_nombre) {
    this.nombre = _nombre;
  }

  getUsuario() {
    return this.usuario;
  }

  setUsuario(_usuario) {
    this.usuario = _usuario;
  }

  getContrasena() {
    return this.contrasena;
  }

  setContrasena(_contrasena) {
    this.contrasena = _contrasena;
  }
}

export { Usuario };
