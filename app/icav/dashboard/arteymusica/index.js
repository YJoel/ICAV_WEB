document.addEventListener("DOMContentLoaded", getUserData);

async function getUserData() {
  let usersApi = "http://localhost:3000/api/users/";
  let res = await fetch(usersApi, {
    method: "GET",
  });
  let data = await res.json();
  console.log(data);

  // CONSULTAR LOS DATOS DEL USUARIO

  let idUser = data.idUser;
  let sessionStorageData = "./";
  res = await fetch(`${sessionStorageData}?idUser=${idUser}`, {
    method: "GET",
  });

  data = await res.json();
  console.log(data);
}
