<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrador</title>
  <link rel="shortcut icon" href="../../../logos/ICAV-logo-pes.png" type="image/x-icon">
  <link rel="stylesheet" href="../resources/css/styles.css" />

  <style>
    .ministerios {
      margin: 50px;
    }
  </style>
  <script>
    let ministerio = 1;
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
    <a href="../pastoral/" class="ministerios">
      <img src="../../../logos/icon-pastoral.png" alt="" style="--color: var(--gris)">
    </a>
    <a href="../secretaria/" class="ministerios">
      <img src="../../../logos/icon-secretaria.png" alt="" style="--color: var(--gris)">
    </a>
    <a href="../escuelaparapadres/" class="ministerios">
      <img src="../../../logos/icon-escuela-para-padres.png" alt="" style="--color: var(--morado)">
    </a>
    <a href="../arteymusica/" class="ministerios">
      <img src="../../../logos/icon-arte-y-musica.png" alt="" style="--color: var(--azul)">
    </a>
    <a href="../infancia/" class="ministerios">
      <img src="../../../logos/icon-infancia.png" alt="" style="--color: var(--amarillo)">
    </a>
    <a href="../jovenes/" class="ministerios">
      <img src="../../../logos/icon-jovenes.png" alt="" style="--color: var(--rojo)">
    </a>
    <a href="../damas/" class="ministerios">
      <img src="../../../logos/icon-damas.png" alt="" style="--color: var(--rosa)">
    </a>
    <a href="../audiovisuales/" class="ministerios">
      <img src="../../../logos/icon-audiovisuales.png" alt="" style="--color: var(--gris-oscuro)">
    </a>
    <a href="../caballeros/" class="ministerios">
      <img src="../../../logos/icon-caballeros.png" alt="" style="--color: var(--azul-oscuro)">
    </a>
    <a href="../ujier/" class="ministerios">
      <img src="../../../logos/icon-ujieres.png" alt="" style="--color: var(--naranja)">
    </a>
    <a href="../desarrollosocial/" class="ministerios">
      <img src="../../../logos/icon-desarrollo-social.png" alt="" style="--color: var(--verde)">
    </a>
    <a href="../evangelismo/" class="ministerios">
      <img src="../../../logos/icon-evangelismo.png" alt="" style="--color: var(--azul-claro)">
    </a>
  </div>
  <script>
    fetch("../../../../Base de Datos/MEMBRECIA ICAV (Respuestas).csv")
      .then((response => response.text()))
      .then((data) => {
        let matriz = data.split("\n")
        matriz.forEach((row) => {
          console.log(row)
        })
      })
  </script>
</body>

</html>