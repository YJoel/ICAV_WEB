formAgregar.addEventListener("submit", (e) => {
  e.preventDefault();

  let data = new FormData(formAgregar);
  if (data.get("nombreAgregar") != "" && data.get("horaInicio") != "") {
    const nuevoEvento = {
      title: data.get("nombreAgregar"),
      start: data.get("horaInicio"), // Fecha seleccionada
      end: data.get("horaFinal"),
      // Otras propiedades del evento (opcional)
    };
    calendar.addEvent(nuevoEvento);
  }
});
formEliminar.addEventListener("submit", (e) => {
  e.preventDefault();
  
  let data = new FormData(formEliminar);

  calendar.getEvents().forEach((el) => {
    if (el._def.title == data.get("nombreEliminar")) {
      el.remove();
    }
  });
  formEliminar.reset();
});
formGuardarEventos.addEventListener("submit", (e) => {
  e.preventDefault();

  calendar.getEvents().forEach((el) => {
    el._def.title
    // el._instance.range.start --> Fecha de Inicio
    // el._instance.range.end --> Fecha de Inicio
  });
});
