/**
 * Código necesario para ejecutar el calendario
 */

const dias = [
  "Domingo",
  "Lunes",
  "Martes",
  "Miércoles",
  "Jueves",
  "Viernes",
  "Sabado",
];

const ministerios = [
  {
    id: "Alabanza",
    title: "Ministerio de Alabanza",
    eventColor: "#004aad",
  },
  {
    id: "Pastoral",
    title: "Ministerio Pastoral",
    eventColor: "#878993",
  },
  {
    id: "Damas",
    title: "Ministerio de Damas",
    eventColor: "#ff66c4",
  },
  {
    id: "Caballeros",
    title: "Ministerio de Caballeros",
    eventColor: "#1e225b",
  },
  {
    id: "Jovenes",
    title: "Ministerio de Jovenes",
    eventColor: "#ff3131",
  },
  {
    id: "AudioVisuales",
    title: "Ministerio de AudioVisuales",
    eventColor: "#545454",
  },
  {
    id: "Evangelismo",
    title: "Ministerio de Evangelismo",
    eventColor: "#38b6ff",
  },
  {
    id: "DesarrolloSocial",
    title: "Ministerio de Desarrollo Social",
    eventColor: "#00bf63",
  },
  {
    id: "Servicio",
    title: "Ministerio de Ujieres",
    eventColor: "#ff914d",
  },
  {
    id: "Infancia",
    title: "Ministerio de Infancia",
    eventColor: "#ffde59",
  },
];

var Calendar = FullCalendar.Calendar;
var calendarEl = document.getElementById("calendar");

// initialize the calendar
// -----------------------------------------------------------------

var calendar = new Calendar(calendarEl, {
  //timeZone: "UTC",
  initialView: "resourceTimelineDay",
  aspectRatio: 1.5,
  headerToolbar: {
    left: "prev,next",
    center: "title",
    right:
      "resourceTimelineMonth,resourceTimelineWeek,resourceTimelineDay,dayGridMonth,timeGridWeek,timeGridDay",
  },
  /*initialView: "dayGridMonth",
  headerToolbar: {
    left: "prev,next",
    center: "title",
    right: "dayGridMonth,timeGridWeek,timeGridDay",
  },*/
  selectable: true,
  editable: true,
  eventClick: function (info) {
    let res = window.prompt(
      "Qué opción va a realizar\n1. Eliminar evento\n2. Editar nombre del evento"
    );
    switch (res) {
      case "1":
        const formData = new FormData();
        formData.append("op", "delete");
        formData.append("table", "eventos");
        formData.append(
          "condicion",
          `WHERE id = '${info.event._def.resourceIds}' and nombre = '${info.event._def.title}'`
        );

        fetch("./../../../../api/DB/dbcontroller.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.res == 1) {
              alert("Evento eliminado satisfactoriamente!!!");
              info.event.remove();
            } else {
              alert("No se pudo eliminar el evento");
            }
          });
        break;
      case "2":
        let eventName = window.prompt("Ingrese el nombre del Evento:");
        if (eventName) {
          const start = new Date(
            info.event._instance.range.start.getTime() + 18000000
          );
          const end = new Date(
            info.event._instance.range.end.getTime() + 18000000
          );
          const formData = new FormData();
          formData.append("nombre", eventName);
          formData.append("start", dateSQL(start));
          formData.append("end", dateSQL(end));
          formData.append("id", info.event._def.resourceIds);
          formData.append("op", "update");
          formData.append("table", "eventos");
          formData.append(
            "condicion",
            `WHERE id = '${info.event._def.resourceIds}'`
          );

          fetch("./../../../../api/DB/dbcontroller.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.res == 1) {
                console.log("Evento editado");
                info.event.setProp("title", eventName);
              } else {
                console.log("No se editó el evento");
              }
            });
        }
        break;

      default:
        alert("Opcion no Valida!");
    }
  },
  eventResize: function (info) {
    console.log(info);
    const oldStart = new Date(
      info.oldEvent._instance.range.start.getTime() + 18000000
    );
    const oldEnd = new Date(
      info.oldEvent._instance.range.end.getTime() + 18000000
    );
    const newStart = new Date(
      info.event._instance.range.start.getTime() + 18000000
    );
    const newEnd = new Date(
      info.event._instance.range.end.getTime() + 18000000
    );
    let oldResourceId = info.oldEvent._def.resourceIds;
    let newResourceId = info.event._def.resourceIds;
    console.log({
      title: info.event._def.title,
      oldStart: oldStart,
      oldEnd: oldEnd,
      newStart: newStart,
      newEnd: newEnd,
      oldResourceId: oldResourceId,
      newResourceId: newResourceId,
    });

    const formData = new FormData();
    formData.append("nombre", info.event._def.title);
    formData.append("start", dateSQL(newStart));
    formData.append("end", dateSQL(newEnd));
    formData.append("id", newResourceId);
    formData.append("op", "update");
    formData.append("table", "eventos");
    formData.append("condicion", `WHERE nombre = '${info.event._def.title}'`);

    fetch("./../../../../api/DB/dbcontroller.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.res == 1) {
          console.log("Evento editado");
        } else {
          console.log("No se editó el evento");
        }
      });
  },
  eventDrop: function (info) {
    console.log(info);
    const oldStart = new Date(
      info.oldEvent._instance.range.start.getTime() + 18000000
    );
    const oldEnd = new Date(
      info.oldEvent._instance.range.end.getTime() + 18000000
    );
    const newStart = new Date(
      info.event._instance.range.start.getTime() + 18000000
    );
    const newEnd = new Date(
      info.event._instance.range.end.getTime() + 18000000
    );
    let oldResourceId = info.oldEvent._def.resourceIds;
    let newResourceId = info.event._def.resourceIds;
    console.log({
      oldStart: oldStart,
      oldEnd: oldEnd,
      newStart: newStart,
      newEnd: newEnd,
      oldResourceId: oldResourceId,
      newResourceId: newResourceId,
    });

    const formData = new FormData();
    formData.append("nombre", info.event._def.title);
    formData.append("start", dateSQL(newStart));
    formData.append("end", dateSQL(newEnd));
    formData.append("id", newResourceId);
    formData.append("op", "update");
    formData.append("table", "eventos");
    formData.append("condicion", `WHERE nombre = '${info.event._def.title}'`);

    fetch("./../../../../api/DB/dbcontroller.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.res == 1) {
          console.log("Evento editado");
        } else {
          console.log("No se editó el evento");
        }
      });
  },
  select: function (info) {
    let eventName = window.prompt(
      `Nombre del Evento que empieza: ${dias[info.start.getDay()]} ${
        info.start.getHours() < 12
          ? info.start.getHours() < 10
            ? "0" + info.start.getHours()
            : info.start.getHours()
          : info.start.getHours()
      }:${
        info.start.getMinutes() < 12
          ? "0" + info.start.getMinutes()
          : info.start.getMinutes()
      } y termina a las ${dias[info.start.getDay()]} ${
        info.end.getHours() < 12
          ? info.end.getHours() < 10
            ? "0" + info.end.getHours()
            : info.end.getHours()
          : info.end.getHours()
      }:${
        info.end.getMinutes() < 12
          ? "0" + info.end.getMinutes()
          : info.end.getMinutes()
      }`
    );

    if (eventName != null) {
      const formData = new FormData();
      formData.append("id", info.resource._resource.id);
      formData.append("titulo", eventName);
      formData.append("fInicio", dateSQL(info.start));
      formData.append("fFin", dateSQL(info.end));
      formData.append("op", "insert");
      formData.append("table", "eventos");

      fetch("./../../../../api/DB/dbcontroller.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data.res);
        });

      calendar.addEvent({
        resourceId: info.resource._resource.id,
        title: eventName,
        start: info.startStr,
        end: info.endStr,
      });
    }

    //console.log(info)
  },
  dateClick: (info) => {
    console.log(info);
  },
  resourceAreaHeaderContent: "MINISTERIOS",
  resources: ministerios,
  locale: "es",
});

calendar.render();

function dateSQL(date) {
  // YYYY-MM-DD HH:MI:SS
  return `${date.getFullYear()}-${
    date.getMonth() + 1
  }-${date.getDate()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
}

document
  .getElementById("calendar")
  .addEventListener("DOMContentLoaded", loadEvents());
function loadEvents() {

  const formdata = new FormData();
  formdata.append("op", "select");
  formdata.append("table", "eventos");

  fetch("./../../../../../api/DB/dbcontroller.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("calendar iniciado");
      data.forEach((ev) => {
        calendar.addEvent({
          resourceId: ev.id,
          title: ev.titulo,
          start: ev.fInicio,
          end: ev.fFin,
        });
      });
    });

  /**
   *
   */
}