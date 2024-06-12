document.body.addEventListener("load", cargarPerfil());

function cargarPerfil() {
  let formData = new FormData();
  let vistaperfil = document.getElementById("vistaPerfil");

  let param = location.href.slice(location.href.search("=") + 1);

  formData.append("op", "select");
  formData.append("table", "miembros");
  formData.append("condicion", `WHERE identificacion = ${param}`);

  let dbControllerRoute = "./../../../../../../api/DB/dbcontroller.php";
  fetch(dbControllerRoute, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      data.forEach((miembro) => {
        vistaperfil.innerHTML = perfil(miembro);
      });
    });
}

function perfil(miembro) {
  return `
    <div class="section">
    <div class="title">
      INFORMACIÓN PERSONAL
    </div>
    <div class="inputs">
      <div class="groups">
        <label for="nombres">
          Nombres
        </label>
        <br>
        <input type="text" id="nombres" name="nombres" required value="${
          miembro.nombres
        }">
        <br>
        <label for="genero">
          Genero
        </label>
        <br>
        <select id="genero" name="genero" required>
            ${
              miembro.genero == "M"
                ? '<option value="M" selected>M</option><option value="F">F</option>'
                : '<option value="M">M</option><option value="F" selected>F</option>'
            }
        </select>
        <br>
        <label for="fNacimiento">
          Fecha de Nacimiento
        </label>
        <br>
        <input type="date" id="fNacimiento" name="fNacimiento" required value="${
          miembro.fecha_nac
        }">
        <br>
        <label for="nacionalidad">
          Nacionalidad
        </label>
        <br>
        <input type="text" id="nacionalidad" name="nacionalidad" required value="${miembro.nacionalidad.toUpperCase()}">
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
        <input type="text" id="apellidos" name="apellidos" required value="${
          miembro.apellidos
        }">
        <br>
        <label for="tipoid">Tipo Identificacion</label>
        <br>
        <select id="tipoid" name="tipoid" required>
            ${
              miembro.tipo == "TI"
                ? '<option value="TI" selected>Tarjeta de Identidad</option><option value="CC">Cedula de Ciudadania</option><option value="CE">Cedula de Extranjeria</option><option value="PP">Pasaporte</option>'
                : miembro.tipo == "CC"
                ? '<option value="TI">Tarjeta de Identidad</option><option value="CC" selected>Cedula de Ciudadania</option><option value="CE">Cedula de Extranjeria</option><option value="PP">Pasaporte</option>'
                : miembro.tipo == "CE"
                ? '<option value="TI">Tarjeta de Identidad</option><option value="CC">Cedula de Ciudadania</option><option value="CE" selected>Cedula de Extranjeria</option><option value="PP">Pasaporte</option>'
                : '<option value="TI">Tarjeta de Identidad</option><option value="CC">Cedula de Ciudadania</option><option value="CE">Cedula de Extranjeria</option><option value="PP" selected>Pasaporte</option>'
            }
        </select>
        <br>
        <label for="identificacion">
          No. Identificación
        </label>
        <br>
        <input type="number" id="identificacion" name="identificacion" min="8000000" required value="${
          miembro.identificacion
        }">
        <br>
        <label for="lNacimiento">
          Lugar de Nacimiento
        </label>
        <br>
        <input type="text" id="lNacimiento" name="lNacimiento" required value="${miembro.lug_nac.toUpperCase()}">
        <br>
        <label for="estadocivil">
          Estado Civil
        </label>
        <br>
        <select id="estadocivil" name="estadocivil" required>
            ${
              miembro.estado_civil.toLowerCase() == "SOLTERO".toLowerCase()
                ? '<option value="Soltero" selected>Soltero(a)</option><option value="Casado(a)">Casado</option><option value="Divorciado">Viudo(a)</option>'
                : miembro.estado_civil.toLowerCase() == "CASADO".toLowerCase()
                ? '<option value="Soltero">Soltero(a)</option><option value="Casado" selected>Casado(a)</option><option value="Divorciado">Viudo(a)</option>'
                : '<option value="Soltero">Soltero(a)</option><option value="Casado">Casado(a)</option><option value="Divorciado" selected>Viudo(a)</option>'
            }
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
        <input type="text" id="direccion" name="direccion" required value="${
          miembro.direccion
        }">
        <br>
        <label for="correo">
          Correo eletronico
        </label>
        <br>
        <input type="email" id="correo" name="correo" value="${miembro.correo}">
        <br>
      </div>
      <div class="groups">
        <label for="telefono">
          Teléfono
        </label>
        <br>
        <input type="number" id="telefono" name="telefono" required value="${
          miembro.telefono
        }">
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
        <input type="date" id="fMatrimonio" name="fMatrimonio" value="${
          miembro.fecha_matr != "0000-00-00" ? miembro.fecha_matr : ""
        }">
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
        <input type="number" id="nHijos" name="nHijos" min="0" value="${
          miembro.numero_hijos
        }">
        <br>
        <label for="resCMsino">
          En caso que la respuesta anterior: <b>conyugue miembro de la iglesia</b> sea sí, indicar el nombre del
          conyugue
        </label>
        <br>
        <input type="text" readonly id="resCMsino" name="resCMsino" value="${
          miembro.conyugue
        }">
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
        <label for="ministerio">
          Ministerio que Representa
        </label>
        <br>
        <input type="text" id="ministerio">
        <br>
        <label for="ministroBautizo">
          Nombre del Ministro que lo Bautizó
        </label>
        <br>
        <input type="text" id="ministroBautizo">
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
        <input type="date" id="fechabautismo" name="fechabautismo" value="${
          miembro.fecha_baut != "0000-00-00" ? miembro.fecha_baut : ""
        }">
        <br>
        <label for="iglesiabautismo">
          Lugar e Iglesia de Bautismo
        </label>
        <br>
        <input type="text" id="iglesiabautismo" name="iglesiabautismo" value="${
          miembro.iglesia_anterior
        }">
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
            ${
              miembro.escolaridad == "Ninguno"
                ? '<option value="Ninguno" selected>Ninguno</option><option value="Primaria">Primaria</option><option value="Secundaria">Secundaria</option><option value="Bachillerato">Bachillerato</option><option value="Universitario">Universitario</option>'
                : miembro.escolaridad == "Primaria"
                ? '<option value="Ninguno">Ninguno</option><option value="Primaria" selected>Primaria</option><option value="Secundaria">Secundaria</option><option value="Bachillerato">Bachillerato</option><option value="Universitario">Universitario</option>'
                : miembro.escolaridad == "Secundaria"
                ? '<option value="Ninguno">Ninguno</option><option value="Primaria">Primaria</option><option value="Secundaria" selected>Secundaria</option><option value="Bachillerato">Bachillerato</option><option value="Universitario">Universitario</option>'
                : miembro.escolaridad == "Bachillerato"
                ? '<option value="Ninguno">Ninguno</option><option value="Primaria">Primaria</option><option value="Secundaria">Secundaria</option><option value="Bachillerato" selected>Bachillerato</option><option value="Universitario">Universitario</option>'
                : '<option value="Ninguno">Ninguno</option><option value="Primaria">Primaria</option><option value="Secundaria">Secundaria</option><option value="Bachillerato">Bachillerato</option><option value="Universitario" selected>Universitario</option>'
            }
        </select>
        <br>
        <label for="lug_trab">
          Lugar de Trabajo / Estudio
        </label>
        <br>
        <input type="text" id="lug_trab" name="lug_trab" value="${
          miembro.lug_trab
        }">
        <br>
      </div>
      <div class="groups">
        <label for="profesion">
          Profesión u Oficio
        </label>
        <br>
        <input type="text" id="profesion" name="profesion" value="${
          miembro.profesion
        }">
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
            ${
              miembro.tipo_sangre == "A+"
                ? '<option value="A+" selected>A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O+">O+</option><option value="O-">O-</option>'
                : miembro.tipo_sangre == "A-"
                ? '<option value="A+">A+</option><option value="A-" selected>A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O+">O+</option><option value="O-">O-</option>'
                : miembro.tipo_sangre == "B+"
                ? '<option value="A+">A+</option><option value="A-">A-</option><option value="B+" selected>B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O+">O+</option><option value="O-">O-</option>'
                : miembro.tipo_sangre == "B-"
                ? '<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-" selected>B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O+">O+</option><option value="O-">O-</option>'
                : miembro.tipo_sangre == "AB+"
                ? '<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+" selected>AB+</option><option value="AB-">AB-</option><option value="O+">O+</option><option value="O-">O-</option>'
                : miembro.tipo_sangre == "AB-"
                ? '<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-" selected>AB-</option><option value="O+">O+</option><option value="O-">O-</option>'
                : miembro.tipo_sangre == "O+"
                ? '<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O+" selected>O+</option><option value="O-">O-</option>'
                : '<option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O+">O+</option><option value="O-" selected>O-</option>'
            }
        </select>
        <br>
      </div>
      <div class="groups">
        <label for="alergias">
          Alergias o Indicaciones Médicas
        </label>
        <br>
        <input type="text" id="alergias" name="alergias" value="${
          miembro.indicaciones_medicas
        }">
        <br>
      </div>
    </div>
    <div class="submit">
      <input type="submit" value="Actualizar Miembro">
    </div>

  </div>`;
}

async function cargarGraficas() {
  const xValues = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  const yValues = [55, 49, 44, 24, 15, 55, 49, 44, 24, 15];
  let barColors = "blue";

  let graficas = document.querySelectorAll(".grafica");
  graficas.forEach((grafica, i) => {
    let canvas = document.createElement("canvas");
    canvas.id = `grafica${i}`;
    grafica.append(canvas)

    new Chart(`grafica${i}`, {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [
          {
            backgroundColor: barColors,
            data: yValues,
          },
        ],
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: "Meses",
        },
        scales: {
          yAxes: [
            {
              ticks: {
                beginAtZero: true,
              },
            },
          ],
        },
      },
    });
  });
}
