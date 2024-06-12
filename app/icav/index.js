formLogin.addEventListener("submit", (e) => {
  e.preventDefault();

  let divResul = document.getElementById("result");
  let formdata = new FormData(formLogin);

  formdata.append("op", "select");
  formdata.append("table", "lideres");
  formdata.append(
    "consulta",
    `SELECT m.identificacion cedula, m.nombres, m.apellidos, mi.nombre ministerio, l.idMinisterio FROM lideres l, miembros m, ministerios mi WHERE l.idMiembro = ${formdata.get(
      "password"
    )} and m.nombres = "${formdata.get("usuario")}" and mi.id = l.idMinisterio;`
  );
  console.log(formdata.get("consulta"))
  fetch("./../../api/icavcontrollers/login/loginController.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.json())
    .then((data) => {
      // Completar mensage de retroalimentacion
      /**Code...
       *
       *
       *
       *
       */

      divResul.classList.remove("failed");
      divResul.classList.remove("success");
      if (data.res == 1) {
        setTimeout(() => {
          divResul.innerHTML = "Inicio Existoso!!";
        }, 500);

        localStorage.setItem("nombres", data.nombres);
        localStorage.setItem("apellidos", data.apellidos);
        localStorage.setItem("identificacion", data.identificacion);
        localStorage.setItem("ministerio", data.ministerio);
        localStorage.setItem("idMinisterio", data.id);

        console.log([localStorage.getItem("nombres"), localStorage.getItem("apellidos"), localStorage.getItem("identificacion"), localStorage.getItem("ministerio"), localStorage.getItem("idMinisterio")])
        location.assign("./dashboard/");
      }
    });
});
