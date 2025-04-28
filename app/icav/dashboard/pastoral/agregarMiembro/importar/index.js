formFile.addEventListener("submit", (e) => {
  e.preventDefault();
  // rutaFileUploadPhp =
  //   "./../../../../../../api/icavcontrollers/dashboard/importar/fileUpload.php";

  // let formData = new FormData(formFile);
  // formData.append("idtransaccion", 1);
  // formData.append("metodo", 1);
  // let archivo = formData.get("file").name;
  // let divResul = document.getElementById("result");

  // fetch(rutaFileUploadPhp, {
  //   method: "POST",
  //   body: formData,
  // })
  //   .then((response) => response.json())
  //   .then((data) => {
  //     divResul.classList.remove("failed");
  //     divResul.classList.remove("success");
  //     if (data.result == 1) {
  //       setTimeout(() => {
  //         divResul.classList.add("success");
  //         divResul.classList.remove("failed");
  //         divResul.innerHTML = "Archivo Subido";
  //       }, 500);
  //     }
  //     if (data.result == 0) {
  //       setTimeout(() => {
  //         divResul.classList.add("failed");
  //         divResul.classList.remove("success");
  //         divResul.innerHTML = "El archivo ya existe";
  //       }, 500);
  //     }
  //     /*fetch(`./../../../resources/pastoral/${archivo}`)
  //         .then((res) => res.text())
  //         .then((csv) => {
  //           console.log(csv);
  //         });*/
  //   });
});

// IMPORTAR ARCHIVO
const input = document.getElementById("file");

input.addEventListener("change", function (event) {
  const matrizDeDatosFromExcel = [];
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function (event) {
    const data = new Uint8Array(event.target.result);
    const workbook = XLSX.read(data, { type: "array" });

    const sheetName = workbook.SheetNames[0];
    const worksheet = workbook.Sheets[sheetName];
    const json = XLSX.utils.sheet_to_json(worksheet);

    // console.log(json)
    json.forEach((respuesta) => {
      let filaRespuestaExcel = {
        correo: respuesta.correo.toUpperCase().trim(),
        nombre: respuesta.nombre.toUpperCase().trim(),
        apellidos: respuesta.apellidos.toUpperCase().trim(),
        genero: respuesta.genero[0].toUpperCase().trim(),
        tipoId: respuesta.tipoId.toUpperCase().split("-")[0].trim(),
        numeroId: respuesta.numeroId,
        lugarNacimiento: respuesta.lugarNacimiento.toUpperCase().trim(),
        fechaNacimiento: formatDateToYearMonthDay(
          parseDateFromExcelToNativeDate(respuesta.fechaNacimiento)
        ),
        estadoCivil: respuesta.estadoCivil.toUpperCase().trim(),
        direccion: respuesta.direccion.toUpperCase().trim(),
        conyugeMiembroDeLaIglesia: respuesta.conyugeMiembroDeLaIglesia === undefined ? "" : respuesta.conyugeMiembroDeLaIglesia.toUpperCase().trim(),
        tieneHijos: respuesta.tieneHijos.toUpperCase().trim(),
        asistiaAOtraIglesia: respuesta.asistiaAOtraIglesia.toUpperCase().trim(),
        esBautizado: respuesta.esBautizado.toUpperCase().trim(),
        nombreIglesiaDeBautizo: respuesta.nombreIglesiaDeBautizo === undefined ? "" : respuesta.nombreIglesiaDeBautizo.toUpperCase().trim(),
        fechaDeBautizo: respuesta.fechaDeBautizo === undefined ? "" : formatDateToYearMonthDay(
          parseDateFromExcelToNativeDate(respuesta.fechaDeBautizo)
        ),
        nombreQuienBautizo: respuesta.nombreQuienBautizo === undefined ? "" : respuesta.nombreQuienBautizo.toUpperCase().trim(),
        ministerio: respuesta.ministerio.toUpperCase().trim(),
        nivelEscolar: respuesta.nivelEscolar.toUpperCase().trim(),
        profesion: respuesta.profesion === undefined ? "" : respuesta.profesion.toUpperCase().trim(),
        lugarDeEstudioOTrabajo: respuesta.lugarDeEstudioOTrabajo === undefined ? "" : respuesta.lugarDeEstudioOTrabajo.toUpperCase().trim(),
        tipoSangre: respuesta.tipoSangre.toUpperCase().trim(),
        alergiasMedicas: respuesta.alergiasMedicas.toUpperCase().trim(),
        autorizacionDeDatos: respuesta.autorizacionDeDatos.toUpperCase().trim(),
      };
      matrizDeDatosFromExcel.push(filaRespuestaExcel);
    });

    console.log(matrizDeDatosFromExcel);
  };

  reader.readAsArrayBuffer(file);
});

function parseDateFromExcelToNativeDate(_fecha) {
  const UN_DIA_EN_MILISEGUNDOS = 24 * 60 * 60 * 1000;
  let fechaEnMilisegundos = _fecha * UN_DIA_EN_MILISEGUNDOS;
  let fechaExcelEnMilisegundos = Date.parse("01/01/1900");

  let fechaConvertida =
    fechaEnMilisegundos + fechaExcelEnMilisegundos - UN_DIA_EN_MILISEGUNDOS;
  return fechaConvertida;
}

function formatDateToYearMonthDay(_fechaEnMilisegundos) {
  let fecha = new Date(_fechaEnMilisegundos);
  let fechaToFormatYearMonthDay = `${fecha.getFullYear()}-${
    fecha.getMonth() + 1
  }-${fecha.getDate()}`;

  return fechaToFormatYearMonthDay;
}
