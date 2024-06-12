<?php

// header("location: ../");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <script>
    let localdata = setTimeout(() => {
      const dir = "./../";
      if ((localStorage.getItem("nombres") != null) && (localStorage.getItem("apellidos") != null) && (localStorage.getItem("identificacion") != null) && (localStorage.getItem("ministerio") != null) && (localStorage.getItem("idMinisterio") != null)) {
        if (localStorage.getItem("idMinisterio") == 1) {
          location.assign("./administrador/")
        } else if (localStorage.getItem("idMinisterio") == 12) {
          location.assign("./secretaria/")
        } else if (localStorage.getItem("idMinisterio") == 2) {
          location.assign("./arteymusica/")
        } else if (localStorage.getItem("idMinisterio") == 5) {
          location.assign("./damas/")
        } else if (localStorage.getItem("idMinisterio") == 4) {
          location.assign("./caballeros/")
        } else if (localStorage.getItem("idMinisterio") == 6) {
          location.assign("./desarrollosocial/")
        } else if (localStorage.getItem("idMinisterio") == 8) {
          location.assign("./infancia/")
        } else if (localStorage.getItem("idMinisterio") == 9) {
          location.assign("./jovenes/")
        } else if (localStorage.getItem("idMinisterio") == 10) {
          location.assign("./ujier/")
        } else if (localStorage.getItem("idMinisterio") == 7) {
          location.assign("./evangelismo/")
        }
      } else {
        location.assign(dir)
      }
    }, 500)
  </script>
</head>

<body>
  <script>
    document.addEventListener("DOMContentLoaded", localdata)
  </script>
</body>

</html>