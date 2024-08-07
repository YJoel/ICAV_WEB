<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ICAV</title>
  <link rel="stylesheet" href="css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="../logos/ICAV-logo-pes.png" type="image/x-icon" />
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
        <h5>IGLESIA CRISTIANA AGUILAS DE VICTORIA</h5>
      </a>
    </div>
    <h2 class="text-light">Iniciar Sesion</h2>
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
        <!--<a type="button" href="" class="btn btn-outline-light">Registrate</a>-->
      </div>
    </form>
    <p class="text-danger" id="message">
      <!--
                PENDIENTE POR TERMINAR
            -->
    </p>
    <div class="blur">

    </div>
  </div>
  <script src="circleAnimation.js"></script>
  <script src="index.js"></script>
  <!-- <div class="container">
    <div class="container-form">
      <div class="header">
        <div class="logo">
          <img src="../logos/ICAV-logo-login.png" alt="" />
        </div>
        <div class="text">Inicio de Sesión</div>
      </div>
      <div class="content">
        <form name="formLogin" id="formLogin" action="" method="POST">
          <div class="inputgroup">
            <label for="usuario">
              Usuario
            </label>
            <br>
            <input type="text" name="usuario" id="usuario" placeholder="Ingrese su nombre" required>
          </div>

          <div class="inputgroup">
            <label for="password">
              Cedula
            </label>
            <br>
            <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required>
          </div>
          <div class="result" id="result">

          </div>
          <div class="inputgroup">
            <input type="submit" value="Iniciar Sesión" />
          </div>
        </form>
      </div>
    </div>
  </div> -->
  <script src="circleAnimation.js"></script>
  <script src="index.js"></script>
</body>

</html>