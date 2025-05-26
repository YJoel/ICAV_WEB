document.addEventListener("load", mostrarMiembros());

async function mostrarMiembros() {
  localStorage.setItem("miembros", "");
  let data = await getMiembros();
  const table = document.getElementById("miembrosTable");
  if (!data.error) {
    table.innerHTML = ""; // Limpiar la tabla antes de agregar nuevos datos
    localStorage.setItem("miembros", JSON.stringify(data));
    data.forEach((miembro, i) => {
      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${i + 1}</td>
        <td>${miembro.nombres}</td>
        <td>${miembro.apellidos}</td>
        <td>${miembro.genero}</td>
        <td>${miembro.tipo}</td>
        <td>${miembro.identificacion}</td>
        <td>${miembro.fecha_nac}</td>
        <td>${miembro.lug_nac}</td>
        <td>${miembro.nacionalidad}</td>
        <td>
          <div class="row">
            <div class="col m-0">
              <a class="btn m-0 p-0" href="#" data-bs-toggle="modal" data-bs-target="#verMiembro" onclick="writeDataOnVerMiembro(${
                miembro.identificacion
              })">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>
              </a>
            </div>
            <div class="col m-0">
              <a class="btn m-0 p-0" href="#" data-bs-toggle="modal" data-bs-target="#modalAgregarMiembro" onclick="dataToForm(${
                miembro.identificacion
              }, 2)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
              </a>
            </div>
            <div class="col m-0">
              <a class="btn m-0 p-0" href="#" onclick="eliminarMiembro(${
                miembro.identificacion
              })">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                </svg>
              </a>
            </div>
        </td>
      `;
      table.appendChild(row);
    });
  } else {
    console.error("Error fetching miembros:", data.error);
  }
}

document.getElementById("formMiembro").addEventListener("submit", async (e) => {
  e.preventDefault(); // Evitar el envío del formulario por defecto

  const form = document.getElementById("formMiembro");
  const formData = new FormData(form);
  const miembro = {
    id: parseInt(formData.get("identificacion")) ?? 0,
    nombres: formData.get("nombres") ?? "",
    apellidos: formData.get("apellidos") ?? "",
    genero: formData.get("genero") ?? "",
    tipoSangre: formData.get("tipoSangre") ?? "",
    tipoId: formData.get("tipoIdentificacion") ?? "",
    fechaNac: formData.get("fechaNacimiento") ?? "",
    lugarNac: formData.get("lugarNacimiento") ?? "",
    nacionalidad: formData.get("nacionalidad") ?? "",
    telefono: parseInt(formData.get("telefono")) ?? 0,
    estadoCivil: formData.get("estadoCivil") ?? "",
    direccion: formData.get("direccion") ?? "",
    escolaridad: formData.get("nivelEscolar") ?? "",
    profesion: formData.get("profesion") ?? "",
    indicacionesMedicas: formData.get("alergias") ?? "",
    iglesiaAnterior: formData.get("nombreIglesia") ?? "",
    fechaBautismo: formData.get("fechaBautismo") ?? "",
    conyuge: formData.get("nombreConyuge") ?? "",
    nHijos:
      formData.get("nHijos") == null ? 0 : parseInt(formData.get("nHijos")),
    correo: formData.get("correo") ?? "",
    fechaMatrimonio: formData.get("fechaMatrimonio") ?? "",
    lugarTrabajo: formData.get("lugarDeTrabajo") ?? "",
  };

  let op = parseInt(formData.get("op"));
  if (op == 1) {
    const data = await crearMiembro(miembro);
    if (!data.error) {
      alert("Miembro creado con éxito");
      form.reset(); // Limpiar el formulario después de crear el miembro
      mostrarMiembros(); // Volver a cargar la lista de miembros
    } else {
      console.error("Error creando miembro:", data.error);
    }
  } else if (op == 2) {
    const data = await editarMiembro(miembro);
    if (!data.error) {
      alert("Miembro editado con éxito");
      mostrarMiembros(); // Volver a cargar la lista de miembros
    } else {
      console.error("Error editando miembro:", data.error);
    }
  }
  // crearMiembro();
});

function dataToForm(id, option) {
  const miembros = JSON.parse(localStorage.getItem("miembros"));
  const miembro = miembros.find((m) => m.identificacion == id);
  const form = document.forms["formMiembro"];

  document.getElementById("op").value = option;
  document.getElementById("op").click();
  // document.getElementById("title").innerHTML = message;
  // form.reset();

  if (id) {
    form["nombres"].value = miembro.nombres;
    form["apellidos"].value = miembro.apellidos;
    form["genero"].value = miembro.genero;
    form["nacionalidad"].value = miembro.nacionalidad;
    form["tipoIdentificacion"].value = miembro.tipo;
    form["identificacion"].value = miembro.identificacion;
    form["fechaNacimiento"].value = miembro.fecha_nac;
    form["lugarNacimiento"].value = miembro.lug_nac;
    form["direccion"].value = miembro.direccion;
    form["correo"].value = miembro.correo;
    form["telefono"].value = miembro.telefono;
    form["estadoCivil"].value = miembro.estado_civil;
    if (form["estadoCivil"].value == "Casado(a)") {
      form["conyuge"].value = "1";
      form["fechaMatrimonio"].disabled = false;
      form["nHijos"].disabled = false;
      form["nombreConyuge"].disabled = false;
    } else {
      form["conyuge"].value = "0";
      form["fechaMatrimonio"].disabled = true;
      form["nHijos"].disabled = true;
      form["nombreConyuge"].disabled = true;
    }
    form["fechaMatrimonio"].value = miembro.fecha_matr;
    form["nHijos"].value = miembro.numero_hijos;
    form["nombreConyuge"].value = miembro.conyuge;
    form["fechaBautismo"].value = miembro.fecha_baut;
    if (miembro.fecha_baut == "0000-00-00") {
      form["esBautizado"].value = "0";
      form["fechaBautismo"].disabled = true;
    } else {
      form["esBautizado"].value = "1";
      form["fechaBautismo"].disabled = false;
    }
    form["nombreIglesia"].value = miembro.iglesia_anterior;
    if (miembro.iglesia_anterior == "") {
      form["deOtraIglesia"].value = "0";
      form["nombreIglesia"].disabled = true;
    } else {
      form["deOtraIglesia"].value = "1";
      form["nombreIglesia"].disabled = false;
    }
    form["nivelEscolar"].value = miembro.escolaridad;
    form["profesion"].value = miembro.profesion;
    form["lugarDeTrabajo"].value = miembro.lug_trab;
    form["tipoSangre"].value = miembro.tipo_sangre;
    form["alergias"].value = miembro.indicaciones_medicas;
  }
}

function writeDataOnVerMiembro(id) {
  let cardBody = document.getElementById("verMiembroBody");
  const miembros = JSON.parse(localStorage.getItem("miembros"));
  const miembro = miembros.find((m) => m.identificacion == id);
  cardBody.innerHTML = `
    <div class="col-md-4">
      <img src="http://localhost:3000/app/logos/ICAV-logo-login.png" width="100%" height="100%" class="rounded-start object-fit-contain" alt="Foto Perfil">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">${miembro.nombres + " " + miembro.apellidos}</h5>
        ${miembro.tipo}: ${miembro.identificacion} <br>
        Edad: ${getEdad(miembro.fecha_nac)} <br>
        Genero: ${miembro.genero} <br>
        Tipo de Sangre: ${miembro.tipo_sangre} <br>
        Estado Civil: ${miembro.estado_civil} <br>
        Correo: ${miembro.correo} <br>
        Telefono: ${miembro.telefono} <br>
        Direccion: ${miembro.direccion} <br>
      </div>
    </div>`;
}

async function eliminarMiembro(id) {
  if (!confirm("¿Está seguro de que desea eliminar este miembro?")) {
    return; // Si el usuario cancela, no hacer nada
  }
  const data = await deleteMiembro(id);
  if (!data.error) {
    alert("Miembro eliminado con éxito");
    mostrarMiembros(); // Volver a cargar la lista de miembros
  } else {
    console.error("Error eliminando miembro:", data.error);
  }
}

document.getElementById("op").addEventListener("click", (e) => {
  if (e.target.value == "1") {
    document.getElementById("title").innerHTML = "Agregar Miembro";
    document.getElementById("buttonModal").innerHTML = "Crear Miembro";
    let form = document.getElementById("formMiembro");
    habilitarEntradas(form);
  } else if ((e.target.value = "2")) {
    document.getElementById("title").innerHTML = "Editar Miembro";
    document.getElementById("buttonModal").innerHTML = "Editar Miembro";
  }
});

function habilitarEntradas(form) {
  form.reset();
}

function al() {
  // const x = document.getElementById("result");
  // Check browser support for SSE
  if (typeof EventSource !== "undefined") {
    let source = new EventSource("http://localhost:3000/api/server.php");
    source.onmessage = function (event) {
      console.log(event.data);
    };
  } else {
    console.log("Sorry, no support for server-sent events.");
    // x.innerHTML = ;
  }
}
