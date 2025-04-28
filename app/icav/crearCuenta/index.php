<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Crear Cuenta</title>

  <title>ICAV</title>
  <link rel="stylesheet" href="../css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="./../../logos/ICAV-logo-login.png" type="image/x-icon" />
  <script src="events.js"></script>
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
      <img src="./../../logos/ICAV-logo-login.png" alt="">
      <a style="text-decoration: none">
        <h5>IGLESIA CRISTIANA AGUILAS DE VICTORIA</h5>
      </a>
    </div>
    <h2 class="text-light">Crear Cuenta</h2>

    <form class="row g-3 p-5" name="formCrearCuenta" id="formCrearCuenta" action="" method="POST">
      <h4 class="text-light">Información del Miembro</h4>
      <div class="col-md-6">
        <label for="usuario" class="form-label">Nombre del Lider</label>
        <input type="text" class="form-control" id="nombreLider" name="nombreLider" placeholder="Nombre" required>
      </div>
      <div class="col-md-6">
        <label for="usuario" class="form-label">Cedula</label>
        <input type="text" class="form-control" id="cedulaLider" name="cedulaLider" placeholder="Cedula" required>
      </div>
      <h4 class="text-light">Datos de la nueva cuenta</h4>
      <div class="col-md-6">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
      </div>
      <div class="col-md-6">
        <label for="contrasena" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña">
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
  <script src="./../circleAnimation.js"></script>
  <script src="./index.js" type="module"></script>
</body>

</html>