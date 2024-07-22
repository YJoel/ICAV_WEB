document.body.addEventListener("load", mostrarPerfiles());

function mostrarPerfiles() {
  let formData = new FormData();
  let sectionPerfiles = document.querySelector(".section-perfiles");

  formData.append("op", "select");
  formData.append("table", "miembros");
  formData.append("condicion", "");

  let dbControllerRoute = "./../../../../../api/DB/dbcontroller.php";
  fetch(dbControllerRoute, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      data.forEach((miembro) => {
        sectionPerfiles.innerHTML += createPerfilHtml(miembro);
      });
    });
}

function createPerfilHtml(miembro) {
  return `
  <div class="card m-3" style="width: 16rem;">
    <img src="../../../../logos/ICAV-logo-login.png" class="card-img-top" alt="...">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><b>${miembro.nombres}</b></li>
      <li class="list-group-item">${miembro.tipo}. ${
    miembro.identificacion
  }</li>
      <li class="list-group-item">${miembro.fecha_nac}</li>
      <li class="list-group-item">${miembro.nacionalidad.toUpperCase()}</li>
      <li class="list-group-item">${
        miembro.estado_civil == "Soltero"
          ? "Soltero(a)"
          : miembro.estado_civil == "Casado"
          ? "Casado(a)"
          : "Viudo(a)"
      }</li>
    </ul>
    <div class="card-body">
      <a type="button" class="btn btn-primary" href="./editarPerfil/?id=${miembro.identificacion}">
        Ver perfil
      </a>
    </div>
  </div>
  `;
}
