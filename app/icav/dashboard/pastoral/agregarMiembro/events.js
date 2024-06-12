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
  //C://fakepath//
  formdata.set("fotoperfil", (formdata.get("fotoperfil") == "") ? "" : fotoperfil.value.slice(12))
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
      else if(data.result == 2){
        setTimeout(() => {
          divResul.classList.add("failed");
          divResul.classList.remove("success");
          divResul.innerHTML = "Documento de identidad ya registrado en la Base de Datos. No se puede duplicar!";
        }, 500);
      }
      else {
        setTimeout(() => {
          divResul.classList.add("failed");
          divResul.classList.remove("success");
          divResul.innerHTML = "Error al agregar miembro, intente nuevamente";
        }, 500);
      }
    });
});
