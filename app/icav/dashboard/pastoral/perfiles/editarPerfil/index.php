<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" href="./../../../../../logos/ICAV-logo-pes.png" type="image/x-icon">
  <link rel="stylesheet" href="./../../../resources/css/styles.css">
  <script src="./../../../trough.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="navbar">
      <div class="container-logo">
        <img src="./../../../../../logos/user_icon.png" alt="" />
      </div>
      <div class="container-info">
        <!--Nombre--><b id="nombre">Nombre de la persona</b> <br />
        <!--Cargo-->
        <i id="cargo">Cargo que desempeña</i>
      </div>
      <div class="container-menu-exit" style="align-self: flex-end">
        <div class="logo">
          <img src="./../../../../../logos/ICAV-logo-login.png" alt="" />
        </div>
        <div class="exit">
          <a href="./../../../../">
            <img src="./../../../../../logos/backbutton.png" alt="" />
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
    <div class="content">
      <div class="vistaPerfil">
        <form action="" name="vistaPerfil" id="vistaPerfil" style="display:inline-block">
          &nbsp;
        </form>
        <div class="result" id="result" style="text-align: center">

        </div>
      </div>
      <div class="estadisticas">
        <div class="titulo">
          <h2>Estadisticas</h2>
        </div>
        <div class="contenido">
          <div class="diezmo">
            <div class="titulo">
              <h3>
                Diezmo
              </h3>
            </div>
            <div class="grafica" id="diezmo">
              
            </div>
          </div>
          <div class="ofrenda">
            <div class="titulo">
              <h3>
                Ofrenda
              </h3>
            </div>
            <div class="grafica" id="ofrenda">
              
            </div>
          </div>
          <div class="pro-templo">
            <div class="titulo">
              <h3>
                Pro-templo
              </h3>
            </div>
            <div class="grafica" id="pro-templo">
              
            </div>
          </div>
          <div class="acciondegracias">
            <div class="titulo">
              <h3>
                Acción de Gracias
              </h3>
            </div>
            <div class="grafica" id="acciondegracias">
              
            </div>
          </div>
          <div class="otros">
            <div class="titulo">
              <h3>
                Otros
              </h3>
            </div>
            <div class="grafica" id="otros">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="index.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script>
    document.body.addEventListener("DOMContentLoaded", cargarGraficas())
  </script>
</body>

</html>