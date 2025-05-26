const apiL = "http://localhost:3000/api/lideres/";

async function crearLider(lider) {
  const response = await fetch(apiL, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(lider),
  });

  return await response.json();
}

async function getLideres() {
  const response = await fetch(apiL, {
    method: "GET",
  });

  return await response.json();
}

async function updateLider(lider) {
  const response = await fetch(apiL, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(lider),
  });

  return await response.json();
}

async function deleteLider(id) {
  const response = await fetch(apiL, {
    method: "DELETE",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `id=${id}`,
  });

  return await response.json();
}