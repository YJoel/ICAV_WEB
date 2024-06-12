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
  <a class="perfiles" href="./editarPerfil/?identificacion=${
    miembro.identificacion
  }">
  <div class="img side-i">
    <img src="../../../../logos/ICAV-logo-login.png" alt="">
  </div>
  <div class="info-miembro side-d">
    <div id="nombre">
      ${miembro.nombres}
    </div>
    <div id="identificacion">
    ${miembro.tipo}. ${miembro.identificacion}
    </div>
    <div id="f_nacimiento">
    ${miembro.fecha_nac}
    </div>
    <div id="nacionalidad">
    ${miembro.nacionalidad.toUpperCase()}
    </div>
    <div id="estado_civil">
    ${
      miembro.estado_civil == "Soltero"
      ? "Soltero(a)"
      : miembro.estado_civil == "Casado"
      ? "Casado(a)"
      : "Viudo(a)"
    }
    </div>
  </div>
</a>
  `;
}
