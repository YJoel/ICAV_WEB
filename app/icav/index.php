<?php
require_once "./../variables.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo strtoupper($IGLESIAS[0]["shortcut"]); ?></title>
  <link rel="stylesheet" href="css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="shortcut icon" href="./../logos/ICAV-logo-pes.png" type="image/x-icon" />
</head>

<body>
  <!-- <a href="../" id="atras">
    ATRAS
  </a> -->
  <div class="circle-container">
    <div class="circles"></div>
    <div class="circles"></div>
    <div class="circles"></div>
    <div class="circles"></div>
  </div>
  <div class="flex-container">
    <div class="position-absolute top-0 start-50 translate-middle bg-light">
      <img src="../logos/ICAV-logo-login.png" alt="">
      <a style="text-decoration: none">
        <h5><?php echo strtoupper($IGLESIAS[0]["nombre"]); ?></h5>
      </a>
    </div>
    <h2 class="title-form">Iniciar Sesion</h2>
    <form class="row g-3 p-3" name="formLogin" id="formLogin" action="" method="POST">
      <div class="col-md-6">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
      </div>
      <div class="col-md-6">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
      </div>
      <div class="result" id="result">

      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
    </form>
    <p class="text-danger" id="message">

    </p>
    <div class="blur">

    </div>
  </div>
  <span id="time"></span>
  <script src="circleAnimation.js"></script>
  <script src="index.js"></script>
</body>

</html>