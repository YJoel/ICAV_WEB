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

  // (18 millones) debo sumar para que la fecha quede correcta con GTM -0500
  calendar.getEvents().forEach((el) => {
    let nombre = el._def.title;
    let f_inicio = new Date(el._instance.range.start.getTime() + 18000000);
    let f_fin = new Date(el._instance.range.end.getTime() + 18000000);

    let anio = `${f_inicio.getFullYear()}`
    let mes = f_inicio.getMonth() < 11 ? `0${f_inicio.getMonth()+1}` : `${f_inicio.getMonth()+1}`
    let dia = f_inicio.getDate() < 10 ? `0${f_inicio.getDate()}` : `${f_inicio.getDate()}`
    let hora = f_inicio.getHours() < 10 ? `0${f_inicio.getHours()}` : `${f_inicio.getHours()}`
    let min = f_inicio.getMinutes() < 10 ? `0${f_inicio.getMinutes()}` : `${f_inicio.getMinutes()}`
    let seg = f_inicio.getSeconds() < 10 ? `0${f_inicio.getSeconds()}` : `${f_inicio.getSeconds()}`

    console.log(`${anio}-${mes}-${dia} ${hora}:${min}:${seg}`)
    // el._instance.range.start --> Fecha de Inicio
    // el._instance.range.end --> Fecha de Inicio
  });
});
