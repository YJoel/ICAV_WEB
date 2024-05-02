AIsi.addEventListener("click", () => {
  resAIsino.readOnly = false;
});
AIno.addEventListener("click", () => {
  resAIsino.readOnly = true;
});
CMsi.addEventListener("click", () => {
  resCMsino.readOnly = false;
});
CMno.addEventListener("click", () => {
  resCMsino.readOnly = true;
});
form.addEventListener("submit", (e) => {
  e.preventDefault();
  let divResul = document.getElementById("result");
  let formdata = new FormData(form);
  formdata.append("op", "insert");
  formdata.append("table", "miembros");
  fetch("./../../../../../api/DB/dbcontroller.php", {
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
      if (data.result == 1) {
        setTimeout(() => {
          divResul.classList.add("success");
          divResul.classList.remove("failed");
          divResul.innerHTML = "Miembro Agregado";
        }, 500);
      }
      else {
        setTimeout(() => {
          divResul.classList.add("failed");
          divResul.classList.remove("success");
          divResul.innerHTML = "Error al agregar miembro, intente nuevamente";
        }, 500);
      }
      console.log(data);
    });
});
