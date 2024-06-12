<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Miembro</title>
  <link rel="shortcut icon" href="../../../../logos/ICAV-logo-pes.png" type="image/x-icon">
  <link rel="stylesheet" href="../../resources/css/styles.css">
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
      <div class="utilidad">
        <a href="./importar/">
          IMPORTAR ARCHIVO
        </a>
      </div>

    </div>
    <div class="container-form">
      <div class="list-sections">
        <button onclick="transicionFormulario(this.value)" class="btn active" value="1">
          Información <br> Personal
        </button>
        <button onclick="transicionFormulario(this.value)" class="btn" value="2">
          Información de <br> Contacto
        </button>
        <button onclick="transicionFormulario(this.value)" class="btn" value="3">
          Información <br> Familiar
        </button>
        <button onclick="transicionFormulario(this.value)" class="btn" value="4">
          Información <br> Eclesiastica
        </button>
        <button onclick="transicionFormulario(this.value)" class="btn" value="5">
          Información Académica <br> y Profesional
        </button>
        <button onclick="transicionFormulario(this.value)" class="btn" value="6">
          Información <br> Médica
        </button>
      </div>
      <div class="form">
        <form action="" method="POST" id="form">
          <div class="section active">
            <div class="title">
              INFORMACIÓN PERSONAL
            </div>
            <div class="inputs">
              <div class="groups">
                <label for="nombres">
                  Nombres
                </label>
                <br>
                <input type="text" id="nombres" name="nombres" required>
                <br>
                <label for="genero">
                  Genero
                </label>
                <br>
                <select id="genero" name="genero" required>
                  <option value="M">M</option>
                  <option value="F">F</option>
                </select>
                <br>
                <label for="fNacimiento">
                  Fecha de Nacimiento
                </label>
                <br>
                <input type="date" id="fNacimiento" name="fNacimiento" required>
                <br>
                <label for="nacionalidad">
                  Nacionalidad
                </label>
                <br>
                <input type="text" id="nacionalidad" name="nacionalidad" required>
                <br>
                <label for="fotoperfil">
                  Foto Perfil
                </label>
                <br>
                <input type="file" id="fotoperfil" name="fotoperfil">
                <br>
              </div>
              <div class="groups">
                <label for="apellidos">
                  Apellidos
                </label>
                <br>
                <input type="text" id="apellidos" name="apellidos" required>
                <br>
                <label for="tipoid">Tipo Identificacion</label>
                <br>
                <select id="tipoid" name="tipoid" required>
                  <option value="TI">Tarjeta de Identidad</option>
                  <option value="CC">Cedula de Ciudadania</option>
                  <option value="CE">Cedula de Extranjeria</option>
                  <option value="PP">Pasaporte</option>
                </select>
                <br>
                <label for="identificacion">
                  No. Identificación
                </label>
                <br>
                <input type="number" id="identificacion" name="identificacion" min="8000000" required>
                <br>
                <label for="lNacimiento">
                  Lugar de Nacimiento
                </label>
                <br>
                <input type="text" id="lNacimiento" name="lNacimiento" required>
                <br>
                <label for="estadocivil">
                  Estado Civil
                </label>
                <br>
                <select id="estadocivil" name="estadocivil" required>
                  <option value="Soltero">Soltero</option>
                  <option value="Casado">Casado</option>
                  <option value="Divorciado">Viudo</option>
                </select>
                <br>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="title">
              INFORMACIÓN DE CONTACTO
            </div>
            <div class="inputs">
              <div class="groups">
                <label for="direccion">
                  Dirección
                </label>
                <br>
                <input type="text" id="direccion" name="direccion" required>
                <br>
                <label for="correo">
                  Correo eletronico
                </label>
                <br>
                <input type="email" id="correo" name="correo">
                <br>
              </div>
              <div class="groups">
                <label for="telefono">
                  Teléfono
                </label>
                <br>
                <input type="tel" id="telefono" name="telefono" required>
                <br>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="title">
              INFORMACIÓN FAMILIAR
            </div>
            <div class="inputs">
              <div class="groups">
                <label for="fMatrimonio">
                  Fecha de Matrimonio
                </label>
                <br>
                <input type="date" id="fMatrimonio" name="fMatrimonio">
                <br>
                <label for="CMsi CMno">
                  Conyugue es miembro de la Iglesia
                </label>
                <br>
                <input type="radio" name="CM" value="SI" id="CMsi">
                <label for="CMsi">SI</label>
                <input type="radio" name="CM" value="NO" id="CMno">
                <label for="CMno">NO</label>
                <br>
              </div>
              <div class="groups">
                <label for="nHijos">
                  Número de Hijos
                </label>
                <br>
                <input type="number" id="nHijos" name="nHijos" min="0">
                <br>
                <label for="resCMsino">
                  En caso que la respuesta anterior: <b>conyugue miembro de la iglesia</b> sea sí, indicar el nombre del
                  conyugue
                </label>
                <br>
                <input type="text" readonly id="resCMsino" name="resCMsino">
                <br>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="title">
              INFORMACIÓN ECLESIASTICA
            </div>
            <div class="inputs">
              <div class="groups">
                <label for="">
                  Ministerio que Representa
                </label>
                <br>
                <input type="text">
                <br>
                <label for="">
                  Nombre del Ministro que lo Bautizó
                </label>
                <br>
                <input type="text" id="">
                <br>
                <label for="AIsi AIno">
                  Asistía antes a otra Iglesia?
                </label>
                <br>
                <input type="radio" name="AI" value="SI" id="AIsi">
                <label for="AIsi">SI</label>
                <input type="radio" name="AI" value="NO" id="AIno">
                <label for="AIno">NO</label>
                <br>
              </div>
              <div class="groups">
                <label for="fechabautismo">
                  Fecha de Bautismo
                </label>
                <br>
                <input type="date" id="fechabautismo" name="fechabautismo">
                <br>
                <label for="iglesiabautismo">
                  Lugar e Iglesia de Bautismo
                </label>
                <br>
                <input type="text" id="iglesiabautismo" name="iglesiabautismo">
                <br>
                <label for="resAIsino">
                  En caso que la respuesta anterior: <b>asistía antes a otra iglesia</b> sea sí, indique el nombre de la
                  iglesia
                </label>
                <br>
                <input type="text" readonly name="resAIsino" id="resAIsino">
                <br>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="title">
              INFORMACIÓN ACADÉMICA Y PROFESIONAL
            </div>
            <div class="inputs">
              <div class="groups">
                <label for="nivelescolar">
                  Nivel Escolar
                </label>
                <br>
                <select name="nivelescolar" id="nivelescolar" required>
                  <option value="Ninguno">Ninguno</option>
                  <option value="Primaria">Primaria</option>
                  <option value="Secundaria">Secundaria</option>
                  <option value="Bachillerato">Bachillerato</option>
                  <option value="Universitario">Universitario</option>
                </select>
                <br>
                <label for="lug_trab">
                  Lugar de Trabajo / Estudio
                </label>
                <br>
                <input type="text" id="lug_trab" name="lug_trab">
                <br>
              </div>
              <div class="groups">
                <label for="profesion">
                  Profesión u Oficio
                </label>
                <br>
                <input type="text" id="profesion" name="profesion">
                <br>
              </div>
            </div>
          </div>
          <div class="section">
            <div class="title">
              INFORMACIÓN MÉDICA
            </div>
            <div class="inputs">
              <div class="groups">
                <label for="tiposangre">
                  Tipo de Sangre
                </label>
                <br>
                <select id="tiposangre" name="tiposangre" required>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
                <br>
              </div>
              <div class="groups">
                <label for="alergias">
                  Alergias o Indicaciones Médicas
                </label>
                <br>
                <input type="text" id="alergias" name="alergias">
                <br>
              </div>
            </div>
            <div class="submit">
              <input type="submit" value="Agregar Miembro">
            </div>
            <div class="result" id="result">
              &nbsp;
            </div>
          </div>
          <div class="buttonsnum">
            <div class="buttons">
              <button onclick="transicionFormulario(this.value)" class="btn active" value="1">
                1
              </button>
              <button onclick="transicionFormulario(this.value)" class="btn" value="2">
                2
              </button>
              <button onclick="transicionFormulario(this.value)" class="btn" value="3">
                3
              </button>
              <button onclick="transicionFormulario(this.value)" class="btn" value="4">
                4
              </button>
              <button onclick="transicionFormulario(this.value)" class="btn" value="5">
                5
              </button>
              <button onclick="transicionFormulario(this.value)" class="btn" value="6">
                6
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="./../../pastoral/agregarMiembro/index.js"></script>
  <script src="./../../pastoral/agregarMiembro/events.js"></script>
</body>

</html>