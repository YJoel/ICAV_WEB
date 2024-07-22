/**
 * Código necesario para ejecutar el calendario
 */

var Calendar = FullCalendar.Calendar;
var calendarEl = document.getElementById("calendar");

// initialize the calendar
// -----------------------------------------------------------------

var calendar = new Calendar(calendarEl, {
  initialView: "dayGridMonth",
  headerToolbar: {
    left: "prev,next",
    center: "title",
    right: "dayGridMonth,timeGridWeek,timeGridDay",
  },
  selectable: true,
  locale: "es"
});

calendar.render();

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
          backgroundColor: ev.color,
          borderColor: ev.color
        });
      });
    });

  /**
   *
   */
}