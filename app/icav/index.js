document.getElementById("formLogin").addEventListener("submit", async (e) => {
  e.preventDefault();

  const message = document.getElementById("message");
  // console.log(
  //   await fetch("jsRoutes.php", {}).then((response) => response.json())
  //   // await fetch("./../../api/users/", {}).then((response) => response.json())
  // );

  const api = "http://localhost:3000/api/users/";
  const fm = new FormData(e.target);
  fm.set("origin", "login");

  const response = await fetch(api, {
    method: "post",
    body: fm,
  });

  const data = await response.json();

  if (!data.error) {
    console.log(data);
    sessionStorage.setItem("idUser", data.idUser);
    location.assign("./dashboard/");
  } else if (data.error) {
    alert("Datos incorrectos");
    message.innerHTML = "REVISE EL USUARIO Y CONTRASEÑA";
  }

  // console.log(data);
});

const getCurrentTime = () => {
  const time = new Date();
  let hour = time.getHours() < 10 ? `0${time.getHours()}` : time.getHours();
  let min =
    time.getMinutes() < 10 ? `0${time.getMinutes()}` : time.getMinutes();
  let sec =
    time.getSeconds() < 10 ? `0${time.getSeconds()}` : time.getSeconds();
  let ampm = hour < 12 ? "AM" : "PM";

  return `${hour}:${min}:${sec} ${ampm}`;
};

const htmlElement = document.getElementById("time");
const showTime = () => {
  htmlElement.innerHTML = getCurrentTime();
};

const timeRefresh = setInterval(showTime, 1000, "showTime");
