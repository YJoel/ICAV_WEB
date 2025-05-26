const formEditarLider = document.forms["formEditarLider"];
formEditarLider.addEventListener("submit", handlerFormEditarLider);

document.addEventListener("load", mostrarMiembrosHTML());

const tableMiembros = document.getElementById("lideres");
const tableAgregarLider = document.getElementById("tableAgregarLider");

async function handlerFormEditarLider(ev) {
  ev.preventDefault();

  const lider = {
    id: 0,
    idMiembro: formEditarLider["idLider"].value,
    idRol: formEditarLider["idRol"].value,
    idMinisterio: formEditarLider["ministerios"].value,
  };

  const data = await updateLider(lider);
  if (!data.error) {
    alert("Miembro actualizado con éxito");
    mostrarMiembrosHTML(); // Volver a cargar la lista de miembros
    document.getElementById("cerrarModal").click();
  } else {
    alert("Error eliminando miembro:", data.error);
  }
}

async function mostrarMiembrosHTML() {
  const data = await getLideres();
  localStorage.setItem("lideres", JSON.stringify(data));

  tableMiembros.innerHTML = "";

  data.forEach((miembro, i) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${i + 1}</td>
      <td>${miembro.nombres}</td>
      <td>${miembro.apellidos}</td>
      <td>${miembro.nombre}</td>
      <td>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarLider" onclick="editarLider(${
          miembro.identificacion
        })">Editar</button>
        <button class="btn btn-danger" onclick="eliminarLider(${
          miembro.identificacion
        })">Eliminar</button>
      </td>
    `;
    tableMiembros.appendChild(row);
  });
}

async function editarLider(id) {
  await cargarMinisterios("ministerios");

  const lideres = JSON.parse(localStorage.getItem("lideres"));
  const lider = lideres.find((lider) => lider.idMiembro == id);

  formEditarLider["nombres"].value = lider.nombres;
  formEditarLider["apellidos"].value = lider.apellidos;
  formEditarLider["ministerios"].value = lider.idMinisterio;
  formEditarLider["idLider"].value = lider.idMiembro;
  formEditarLider["idRol"].value = lider.idRol;
}

async function cargarMinisterios(id) {
  const ministeriosEL = document.getElementById(id);
  if (!ministeriosEL.children.length) {
    const data = await getMinisterios();
    data.forEach((ministerio) => {
      const option = document.createElement("option");
      option.value = ministerio.id;
      option.innerHTML = ministerio.nombre;
      ministeriosEL.appendChild(option);
    });
  }
}

async function mostrarMiembrosEnAgregarLider() {
  const jsonMiembros = localStorage.getItem("miembros");
  let miembros = [];
  if (jsonMiembros != null) {
    miembros = JSON.parse(localStorage.getItem("miembros"));
  } else {
    miembros = await getMiembros();
    localStorage.setItem("miembros", JSON.stringify(miembros));
  }

  tableAgregarLider.innerHTML = "";

  miembros.forEach((miembro, i) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${i + 1}</td>
      <td>${miembro.nombres}</td>
      <td>${miembro.apellidos}</td>
      <td>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAsignarMinisterio" onclick="mostratModalMinisterio(${
          miembro.identificacion
        })">Asignar Ministerio</button>
      </td>
    `;
    tableAgregarLider.appendChild(row);
  });
}

document
  .getElementById("searchInput")
  .addEventListener("keyup", filtrarMiembros);

function filtrarMiembros(ev) {
  const miembros = JSON.parse(localStorage.getItem("miembros"));
  tableAgregarLider.innerHTML = "";

  let filter = miembros.filter((miembro) => {
    return (
      miembro.nombres.toLowerCase().includes(ev.target.value.toLowerCase()) ||
      miembro.apellidos.toLowerCase().includes(ev.target.value.toLowerCase())
    );
  });

  filter.forEach((miembro, i) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${i + 1}</td>
      <td>${miembro.nombres}</td>
      <td>${miembro.apellidos}</td>
      <td>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAsignarMinisterio" onclick="mostratModalMinisterio(${
          miembro.identificacion
        })">Asignar Ministerio</button>
      </td>
    `;
    tableAgregarLider.appendChild(row);
  });
}

const formAsignarMinisterio = document.forms["formAsignarMinisterio"];
function mostratModalMinisterio(id) {
  const form = document.forms["formAsignarMinisterio"];
  form["idMiembro"].value = id;
  cargarMinisterios("ministerioSeleccionado");
}

formAsignarMinisterio.addEventListener("submit", async (ev) => {
  ev.preventDefault();

  const lider = {
    id: 0,
    idMiembro: formAsignarMinisterio["idMiembro"].value,
    idRol: formAsignarMinisterio["idRol"].value,
    idMinisterio: formAsignarMinisterio["ministerioSeleccionado"].value,
  };

  const data = await crearLider(lider);
  if (!data.error) {
    alert("Lider creado con éxito");
    mostrarMiembrosHTML(); // Volver a cargar la lista de miembros
    document.getElementById("cerrarModalAsignarMinisterio").click();
    document.getElementById("cerrarModalAgregarLider").click();
  } else {
    alert("Error creando lider:", data.error);
  }
});
