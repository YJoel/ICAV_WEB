<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ICAV</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link
      rel="shortcut icon"
      href="../logos/ICAV-logo-pes.png"
      type="image/x-icon"
    />
  </head>
  <body>
    <a href="../" id="atras">
        ATRAS
    </a>
    <div class="container">
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
                <input type="text" name="usuario" id="usuario" placeholder="**********">
            </div>

            <div class="inputgroup">
                <label for="password">
                    Contraseña
                </label>
                <br>
                <input type="password" name="password" id="password" placeholder="**********">
            </div>

            <div class="inputgroup">
                <input type="submit" value="Iniciar Sesión" /><a href="./crearCuenta/"> Crear cuenta</a>
            </div>
          </form>
          <table>
            <tr>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>