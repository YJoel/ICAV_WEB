<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ministerio - Escuela Para Padres</title>
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
  <script>
    let ministerio = 11;
  </script>
  <script src="./../trough.js"></script>
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
  </div>
  <div class="content">
    <h1 class="tituloMinisterio" style="color: var(--morado)">MINISTERIO ESCUELA PARA PADRES</h1>
    <a href="../escuelaparapadres/" class="ministerios">
      <img src="../../../logos/icon-escuela-para-padres.png" alt="" style="--color: var(--morado)">
    </a>
    <div class="container-funciones">

    </div>
    <div class="calendario">
      <div id="calendar">

      </div>
    </div>
  </div>
  <script src="./../resources/fullcalendar-6.1.9/dist/index.global.min.js"></script>
  <script src="./../resources/fullcalendar-6.1.9/dist/locales-all.global.min.js"></script>
  <script src="./../resources/fullcalendar-6.1.9/calendario.js"></script>
</body>

</html>