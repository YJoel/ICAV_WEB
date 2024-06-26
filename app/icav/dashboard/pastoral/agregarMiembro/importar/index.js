formFile.addEventListener("submit", (e) => {
  e.preventDefault();
  rutaFileUploadPhp =
    "./../../../../../../api/icavcontrollers/dashboard/importar/fileUpload.php";

  let formData = new FormData(formFile);
  formData.append("idtransaccion", 1);
  formData.append("metodo", 1);
  let archivo = formData.get("file").name;
  let divResul = document.getElementById("result");

  fetch(rutaFileUploadPhp, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      divResul.classList.remove("failed");
      divResul.classList.remove("success");
      if (data.result == 1) {
        setTimeout(() => {
          divResul.classList.add("success");
          divResul.classList.remove("failed");
          divResul.innerHTML = "Archivo Subido";
        }, 500);
      }
      if (data.result == 0) {
        setTimeout(() => {
          divResul.classList.add("failed");
          divResul.classList.remove("success");
          divResul.innerHTML = "El archivo ya existe";
        }, 500);
      }
      /*fetch(`./../../../resources/pastoral/${archivo}`)
          .then((res) => res.text())
          .then((csv) => {
            console.log(csv);
          });*/
    });
});
