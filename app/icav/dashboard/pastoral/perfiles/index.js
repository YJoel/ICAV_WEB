document
  .querySelector(".section-perfiles")
  .addEventListener("DOMContentLoaded", () => {
    let formData = new FormData();
    let sectionPerfiles = document.querySelector(".section-perfiles");

    formData.append("op", "select");
    formData.append("table", "miembros");

    let dbControllerRoute = "./../../../../../api/DB/dbcontroller.php";
    fetch(dbControllerRoute, {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        response.json();
      })
      .then((data) => {
        data.forEach(miembro => {
          sectionPerfiles.append(createPerfilHtml(miembro))
        });
      });
  });

function createPerfilHtml(miembro) {
  let divPerfiles = document.createElement("div");
  let divImg = document.createElement("div");
  let img = document.createElement("img");
  let divInfo = document.createElement("div");
  let divNombre = document.createElement("div")
  let divIdentificacion = document.createElement("div")  
  let divFechaNac = document.createElement("div")
  let divNacionalidad = document.createElement("div")
  let divEstadoCivil = document.createElement("div")
  divPerfiles.className = "perfiles";
}
