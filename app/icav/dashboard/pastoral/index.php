<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ministerio - Pastoral</title>
  <link rel="shortcut icon" href="../../../logos/ICAV-logo-pes.png" type="image/x-icon">
  <link rel="stylesheet" href="../resources/css/styles.css" />
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #external-events {
      position: fixed;
      z-index: 2;
      top: 20px;
      left: 20px;
      width: 150px;
      padding: 0 10px;
      border: 1px solid #ccc;
      background: #eee;
    }

    .demo-topbar+#external-events {
      /* will get stripped out */
      top: 60px;
    }

    #external-events .fc-event {
      cursor: move;
      margin: 3px 0;
    }

    #calendar-container {
      position: relative;
      z-index: 1;
      margin-left: 200px;
    }

    #calendar {
      max-width: 1100px;
      margin: 20px auto;
    }

    .fc-license-message {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="navbar">
      <div class="container-logo">
        <img src="../../../logos/user_icon.png" alt="" />
      </div>
      <div class="container-info">
        <!--Nombre--><b id="nombre">Nombre de la persona</b> <br />
        <!--Cargo-->
        <i id="cargo">Cargo que desempeña</i>
      </div>
      <div class="container-menu-exit" style="align-self: flex-end">
        <div class="logo">
          <img src="../../../logos/ICAV-logo-login.png" alt="" />
        </div>
        <div class="exit">
          <a href="../../">
            <img src="../../../logos/backbutton.png" alt="" />
          </a>
        </div>
      </div>
    </div>
    <div class="utilities">
      <div class="utilidad">
        <a href="../administrador/" id="atras" style="margin-top: 100px;">
          <b>
            < </b> MINISTERIOS
        </a>
      </div>
    </div>
  </div>
  <div class="content">
    <h1 class="tituloMinisterio" style="color: var(--gris)">MINISTERIO PASTORAL</h1>
    <a href="../pastoral/" class="ministerios">
      <img src="../../../logos/icon-pastoral.png" alt="" style="--color: var(--gris)">
    </a>
    <div class="container-funciones">
      <div class="funciones">
        <a href="./agregarMiembro/">Agregar Miembros</a>
      </div>
      <div class="funciones">
        <a href="./perfiles/">Perfiles</a>
      </div>
      <div class="funciones">
        <a href="">Finanzas</a>
      </div>
    </div>
    <div class="calendario">
      <div id="calendar">

      </div>
      <div class="calendar-option">
        <h2>Calendario</h2>
        <form action="" id="formAgregar">
          <h3>AGREGAR EVENTO</h3>
          <input type="text" id="nombreAgregar" name="nombreAgregar" placeholder="Nombre del Evento" required><br>
          <label for="horaAgregar">Desde:</label>
          <input type="datetime-local" id="horaInicio" name="horaInicio" required><br>
          <label for="horaAgregar">Hasta:</label>
          <input type="datetime-local" id="horaFinal" name="horaFinal"><br>
          <input type="submit" value="Agregar" id="agregar" name="agregar">
        </form>
        <form action="" id="formEliminar">
          <h3>ELIMINAR EVENTO</h3>
          <input type="text" id="nombreEliminar" name="nombreEliminar" placeholder="Nombre del Evento" required>
          <input type="submit" value="Eliminar" id="eliminar" id="eliminar">
        </form>
        <form action="" id="formGuardarEventos">
          <input type="submit" class="submit" value="Guardar Eventos">
        </form>
      </div>
    </div>
  </div>
  <script src="./../resources/fullcalendar-6.1.9/dist/index.global.min.js"></script>
  <script src="./../resources/fullcalendar-6.1.9/dist/locales-all.global.min.js"></script>
  <script src="./../resources/fullcalendar-6.1.9/logica.js"></script>
  <script src="index.js"></script>
</body>

</html>