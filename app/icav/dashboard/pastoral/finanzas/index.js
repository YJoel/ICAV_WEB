document.getElementById("form").addEventListener("submit", (form) => {
  form.preventDefault();

  let formData = new FormData(form.target);

  formData.append(
    "idServicio",
    formData.get("servicio") == "Miércoles"
      ? 2
      : formData.get("servicio") == "Domingo"
      ? 1
      : formData.get("servicio") == "Sabado"
      ? 3
      : 0
  );

  formData.append("op", "insert");
  formData.append("table", "finanzas");

  let ruta = "./../../../../../api/DB/dbcontroller.php";
  fetch(ruta, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data.res);
    });
});

document.getElementById("fecha").addEventListener("focusout", (el) => {
  let fecha = new Date(el.target.value).getDay();
  const dias = [
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sabado",
    "Domingo",
  ];
  document.getElementById("servicio").value = `${
    dias[fecha] != undefined ? dias[fecha] : ""
  }`;
});

document.body.addEventListener("DOMContentLoaded", cargarMiembros());

function cargarMiembros() {
  let datalistNombre = document.getElementById("miembros");
  let datalistCedula = document.getElementById("ids");
  const solicitud = new FormData();
  solicitud.append("op", "select");
  solicitud.append("table", "miembros");
  solicitud.append("condicion", "");

  fetch("../../../../../api/DB/dbcontroller.php", {
    method: "POST",
    body: solicitud,
  })
    .then((response) => response.json())
    .then((data) => {
      data.forEach((miembro) => {
        const optionNombre = document.createElement("option");
        optionNombre.value = `${miembro.nombres} ${miembro.apellidos}`;
        datalistNombre.append(optionNombre);
        const optionCedula = document.createElement("option");
        optionCedula.value = `${miembro.identificacion}`;
        datalistCedula.append(optionCedula);
      });
      agregarCedulaOMiembro();
    });
}

function agregarCedulaOMiembro() {
  document.getElementById("miembro").addEventListener("focusout", (el) => {
    let datalistCedula = document.getElementById("ids");
    let datalistMiembros = document.getElementById("miembros");

    [...datalistCedula.children].forEach((option, i) => {
      if (el.target.value == datalistMiembros.children[i].value) {
        document.getElementById("id").value = datalistCedula.children[i].value;
      }
    });
  });

  document.getElementById("id").addEventListener("focusout", (el) => {
    let datalistCedula = document.getElementById("ids");
    let datalistMiembros = document.getElementById("miembros");

    [...datalistCedula.children].forEach((option, i) => {
      if (el.target.value == datalistCedula.children[i].value) {
        document.getElementById("miembro").value =
          datalistMiembros.children[i].value;
      }
    });
  });
}

document.getElementById("form").addEventListener("load", mostrarPerfiles());

function mostrarPerfiles() {
  let formData = new FormData();
  let tBody = document.getElementById("tBody");

  formData.append("op", "select");
  formData.append("table", "cruzada");
  formData.append(
    "consulta",
    `SELECT f.idMiembro id, m.nombres, f.monto, m.apellidos, f.fecha FROM miembros m, finanzas f WHERE m.identificacion = f.idMiembro ORDER BY f.fecha desc;`
  );

  let dbControllerRoute = "./../../../../../api/DB/dbcontroller.php";
  fetch(dbControllerRoute, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      data.forEach((miembro, i) => {
        tBody.innerHTML += createPerfilHtml(miembro, i);
      });
    });
}

function createPerfilHtml(miembro, i) {
  return `<tr>
            <th scope="row">${miembro.identificacion}</th>
            <td>${miembro.nombres}</td>
            <td>${miembro.apellidos}</td>
            <td>$${miembro.monto}</td>
            <td>${miembro.fecha}</td>
            <td>
              <a href="./../perfiles/editarPerfil/?identificacion=${miembro.identificacion}">
                <svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"
                  stroke="#011AF5">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M13 21C13 21.5523 13.4477 22 14 22C14.5523 22 15 21.5523 15 21V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V21Z"
                      fill="#011AF5"></path>
                    <path
                      d="M5 21C5 21.5523 5.44772 22 6 22C6.55228 22 7 21.5523 7 21V11C7 10.4477 6.55228 10 6 10C5.44772 10 5 10.4477 5 11V21Z"
                      fill="#011AF5"></path>
                    <path
                      d="M10 22C9.44772 22 9 21.5523 9 21V13C9 12.4477 9.44772 12 10 12C10.5523 12 11 12.4477 11 13V21C11 21.5523 10.5523 22 10 22Z"
                      fill="#011AF5"></path>
                    <path
                      d="M17 21C17 21.5523 17.4477 22 18 22C18.5523 22 19 21.5523 19 21V7C19 6.44772 18.5523 6 18 6C17.4477 6 17 6.44772 17 7V21Z"
                      fill="#011AF5"></path>
                  </g>
                </svg>
              </a>
            </td>
          </tr>`;
}
