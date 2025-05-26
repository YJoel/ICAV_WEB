const api = "http://localhost:3000/api/miembros/";

async function crearMiembro(miembro) {
  const response = await fetch(api, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(miembro),
  });

  return await response.json();
}

async function getMiembros() {
  const response = await fetch(api, {
    method: "GET",
  });

  return await response.json();
}

async function editarMiembro(miembro) {
  const response = await fetch(api, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(miembro),
  });

  return await response.json();
}

async function deleteMiembro(id) {
  const response = await fetch(api, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `id=${id}`,
  });

  return await response.json();
}
