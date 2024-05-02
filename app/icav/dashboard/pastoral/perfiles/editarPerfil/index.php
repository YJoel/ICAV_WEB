<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil</title>
</head>

<body>
  <div class="container">
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
    <div class="content">
      <div class="vistaPerfil">
        <?php
          if(isset($_GET[""]))
        ?>
      </div>
    </div>
  </div>
</body>

</html>