<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Importar Archivo</title>
  <link rel="shortcut icon" href="../../../../../logos/ICAV-logo-pes.png" type="image/x-icon">
  <link rel="stylesheet" href="../../../resources/css/styles.css">
  <script src="./../../../trough.js"></script>
</head>

<body>
  <div class="container">
    <div class="navbar">
      <div class="container-logo">
        <img src="../../../../../logos/user_icon.png" alt="" />
      </div>
      <div class="container-info">
        <!--Nombre--><b id="nombre">Nombre de la persona</b> <br />
        <!--Cargo-->
        <i id="cargo">Cargo que desempeña</i>
      </div>
      <div class="container-menu-exit" style="align-self: flex-end">
        <div class="logo">
          <img src="../../../../../logos/ICAV-logo-login.png" alt="" />
        </div>
        <div class="exit">
          <a href="../../../../">
            <img src="../../../../../logos/backbutton.png" alt="" />
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
        <form action="" method="POST" id="formFile">
          <div class="section active">
            <div class="title">
              IMPORTAR ARCHIVO CON MIEMBROS
            </div>
            <div class="inputs">
              <div class="groups">
                <input type="file" name="file" id="file">
              </div>
            </div>
            <div class="submit">
              <input type="submit" value="Importar" name="importar" id="importar">
            </div>
            <div class="result" id="result">
              &nbsp;
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="./../../../../../../api/modules/sheetjs/dist/xlsx.full.min.js"></script>
  <script src="index.js"></script>
</body>