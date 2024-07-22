<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Miembro</title>

  <link rel="shortcut icon" href="../../../../logos/ICAV-logo-pes.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../resources/css/styles.css">
  <script src="./../../trough.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="navbar">
      <div class="container-logo">
        <img src="../../../../logos/user_icon.png" alt="" />
      </div>
      <div class="container-info">
        <!--Nombre--><b id="nombre">Nombre de la persona</b> <br />
        <!--Cargo-->
        <i id="cargo">Cargo que desempeña</i>
      </div>
      <div class="container-menu-exit" style="align-self: flex-end">
        <div class="logo">
          <img src="../../../../logos/ICAV-logo-login.png" alt="" />
        </div>
        <div class="exit">
          <a href="../../../">
            <img src="../../../../logos/backbutton.png" alt="" />
          </a>
        </div>
      </div>
    </div>
    <div class="utilities">
      <div class="utilidad">
        <a href="../" id="atras">
          <b>
            < </b> VOLVER ATRAS
        </a>
      </div>
    </div>
    <div class="container-form">
      <div class="form">
        <form action="" method="POST" id="form">
          <div class="section active">
            <div class="title">
              REGISTRO DE FINANZAS
            </div>
            <div class="inputs">
              <div class="groups">
                <label for="nombre">
                  Nombre del miembro
                </label>
                <br>
                <input list="miembros" name="miembro" id="miembro">
                <datalist id="miembros">

                </datalist>
                <br>
                <label for="id">
                  Cédula
                </label>
                <br>
                <input list="ids" name="id" id="id">
                <datalist id="ids">

                </datalist>
              </div>
              <div class="groups">
                <label for="aporteId">
                  Tipo de Aporte
                </label>
                <br>
                <select name="aporteId" id="aporteId" required>
                  <option value="1">Diezmo</option>
                  <option value="2">Ofrenda</option>
                  <option value="3">Acción de Gracias</option>
                  <option value="4">Pro-templo</option>
                  <option value="5">Otros</option>
                </select>
                <br>
                <label for="monto">
                  Monto
                </label>
                <br>
                <input type="number" id="monto" name="monto" min="0" required>
              </div>
              <div class="groups">
                <label for="fecha">
                  fecha
                </label>
                <br>
                <input type="date" id="fecha" name="fecha" required>
                <br>
                <label for="servicio">
                  Dia del Aporte
                </label>
                <br>
                <input type="text" id="servicio" name="servicio" readonly required>
              </div>
            </div>
            <div class="submit">
              <input type="submit" value="Registrar">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="container-form">
      <div class="form">
        <form action="" method="POST" id="form">
          <div class="section active">
            <div class="title">
              ESTADISTICAS
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Monto</th>
                  <th scope="col">Fecha de Aporte</th>
                  <th scope="col">
                    <svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"
                      stroke="#000000">
                      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                      <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                      <g id="SVGRepo_iconCarrier">
                        <path
                          d="M13 21C13 21.5523 13.4477 22 14 22C14.5523 22 15 21.5523 15 21V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V21Z"
                          fill="#000000"></path>
                        <path
                          d="M5 21C5 21.5523 5.44772 22 6 22C6.55228 22 7 21.5523 7 21V11C7 10.4477 6.55228 10 6 10C5.44772 10 5 10.4477 5 11V21Z"
                          fill="#000000"></path>
                        <path
                          d="M10 22C9.44772 22 9 21.5523 9 21V13C9 12.4477 9.44772 12 10 12C10.5523 12 11 12.4477 11 13V21C11 21.5523 10.5523 22 10 22Z"
                          fill="#000000"></path>
                        <path
                          d="M17 21C17 21.5523 17.4477 22 18 22C18.5523 22 19 21.5523 19 21V7C19 6.44772 18.5523 6 18 6C17.4477 6 17 6.44772 17 7V21Z"
                          fill="#000000"></path>
                      </g>
                    </svg>
                  </th>
                </tr>
              </thead>
              <tbody id="tBody">

              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>