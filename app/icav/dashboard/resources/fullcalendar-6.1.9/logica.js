/**
 * Código necesario para ejecutar el calendario
 */

const ENDPOINT = "./../../../../api/calendar/";

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
    title: "Alabanza",
    eventColor: "#004aad",
  },
  {
    id: "Pastoral",
    title: "Pastoral",
    eventColor: "#878993",
  },
  {
    id: "Damas",
    title: "Damas",
    eventColor: "#ff66c4",
  },
  {
    id: "Caballeros",
    title: "Caballeros",
    eventColor: "#1e225b",
  },
  {
    id: "Jovenes",
    title: "Jovenes",
    eventColor: "#ff3131",
  },
  {
    id: "AudioVisuales",
    title: "AudioVisuales",
    eventColor: "#545454",
  },
  {
    id: "Evangelismo",
    title: "Evangelismo",
    eventColor: "#38b6ff",
  },
  {
    id: "DesarrolloSocial",
    title: "Desarrollo Social",
    eventColor: "#00bf63",
  },
  {
    id: "Servicio",
    title: "Ujieres",
    eventColor: "#ff914d",
  },
  {
    id: "Infancia",
    title: "Infancia",
    eventColor: "#ffde59",
  },
];

document.addEventListener("DOMContentLoaded", function () {
  var Calendar = FullCalendar.Calendar;
  var calendarEl = document.getElementById("calendar");

  // initialize the calendar
  // -----------------------------------------------------------------

  var calendar = new Calendar(calendarEl, {
    events: ENDPOINT,
    timeZone: "UTC",
    initialView: "resourceTimelineDay",
    dayMaxEvents: true,
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
    eventClick: async function (info) {
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

          fetch(ENDPOINT, {
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
            const dataJSON = {
              evento: {
                resourceId: info.event._def.resourceIds,
                title: eventName,
                start: start,
                end: end,
                backgroundColor: "",
              },
              title: eventName,
            };

            const config = {
              method: "PUT",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify(dataJSON),
            };

            const response = await fetch(
              ENDPOINT,
              config
            );
            const data = await response.json();

            console.log(data);
          }
          break;

        default:
          alert("Opcion no Valida!");
      }
    },
    eventResize: async function (info) {
      // const oldStart = new Date(
      //   info.oldEvent._instance.range.start.getTime() + 18000000
      // );
      // const oldEnd = new Date(
      //   info.oldEvent._instance.range.end.getTime() + 18000000
      // );
      // const newStart = new Date(
      //   info.event._instance.range.start.getTime() + 18000000
      // );
      // const newEnd = new Date(
      //   info.event._instance.range.end.getTime() + 18000000
      // );
      // let oldResourceId = info.oldEvent._def.resourceIds;
      let newResourceId = info.event._def.resourceIds;

      const evento = {
        resourceId: newResourceId,
        title: info.event._def.title,
        start: info.event._instance.range.start,
        end: info.event._instance.range.end,
        backgroundColor: "",
      };

      console.log(evento);

      const dataJSON = {
        evento: evento,
        title: evento.title,
      };

      const config = {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(dataJSON),
      };

      const response = await fetch(ENDPOINT, config);
      const data = await response.json();

      console.log(data);

      if (data.queryResult) {
        console.log("Evento editado", data.evento);
      } else {
        console.log("No se editó el evento", data.evento);
      }
    },
    eventDrop: async function (info) {
      let newResourceId = info.event._def.resourceIds;

      const evento = {
        resourceId: newResourceId,
        title: info.event._def.title,
        start: info.event._instance.range.start,
        end: info.event._instance.range.end,
        backgroundColor: "",
      };

      console.log(evento);

      const dataJSON = {
        evento: evento,
        title: evento.title,
      };

      const config = {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(dataJSON),
      };

      const response = await fetch(ENDPOINT, config);
      const data = await response.json();

      if (data.queryResult) {
        console.log("Evento editado", data.evento);
      } else {
        console.log("No se editó el evento", data.evento);
      }
    },
    select: async function (info) {
      let eventName = window.prompt(
        `Ingrese el ombre del Evento. Hora Inicio: ${
          dias[info.start.getDay()]
        } ${
          info.start.getHours() < 12
            ? info.start.getHours() < 10
              ? "0" + info.start.getHours()
              : info.start.getHours()
            : info.start.getHours()
        }:${
          info.start.getMinutes() < 12
            ? "0" + info.start.getMinutes()
            : info.start.getMinutes()
        }, Hora Fin:  ${dias[info.start.getDay()]} ${
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
        const evento = {
          resourceId: info.resource._resource.id,
          title: eventName,
          start: info.start,
          end: info.end,
          backgroundColor: "",
        };

        const dataJSON = {
          evento: evento,
        };

        const config = {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(dataJSON),
        };

        console.log("evento antes de enviar", evento);
        const response = await fetch(ENDPOINT, config);
        const data = await response.json();

        console.log("evento despues de enviar", data);
        if (data.queryResult) {
          console.log("Evento creado", data.evento);
          calendar.addEvent({
            resourceId: info.resource._resource.id,
            title: eventName,
            start: info.startStr,
            end: info.endStr,
          });
        } else {
          console.log("No se creó el evento", data.evento);
        }
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

  // loadEvents(calendar);
});

function dateSQL(date) {
  // YYYY-MM-DD HH:MI:SS
  return `${date.getFullYear()}-${
    date.getMonth() + 1
  }-${date.getDate()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
}

async function loadEvents() {
  const response = await fetch(ENDPOINT);
  return await response.json();
  // .then((data) => {
  //   console.log(data);
  //   return data;
  //   // console.log("calendar iniciado");
  //   // data.forEach((ev) => {
  //   //   console.log(ev);
  //   //   calendar.addEvent({
  //   //     resourceId: ev.resourceId,
  //   //     title: ev.title,
  //   //     start: ev.start,
  //   //     end: ev.end,
  //   //     backgroundColor: ev.backgroundColor,
  //   //     borderColor: ev.backgroundColor,
  //   //   });
  //   // });
  // });
  // const data = await response.json();
  // console.log("calendar iniciado");
  // data.forEach((ev) => {
  //   console.log(ev);
  //   calendar.addEvent({
  //     resourceId: ev.id,
  //     title: ev.titulo,
  //     start: ev.fInicio,
  //     end: ev.fFin,
  //     backgroundColor: ev.color,
  //     borderColor: ev.color,
  //   });
  // });

  // const formdata = new FormData();
  // formdata.append("op", "select");
  // formdata.append("table", "eventos");

  // fetch("./../../../../../api/DB/dbcontroller.php", {
  //   method: "POST",
  //   body: formdata,
  // })
  //   .then((response) => response.json())
  //   .then((data) => {
  //     console.log("calendar iniciado");
  //     data.forEach((ev) => {
  //       calendar.addEvent({
  //         resourceId: ev.id,
  //         title: ev.titulo,
  //         start: ev.fInicio,
  //         end: ev.fFin,
  //         backgroundColor: ev.color,
  //         borderColor: ev.color,
  //       });
  //     });
  //   });

  /**
   *
   */
}
