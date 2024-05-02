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
  dateClick: function (info) {
    let eventName = window.prompt("Nombre del Evento");

    if (eventName != null) {
      console.log(info.date)
      calendar.addEvent({
        title: eventName,
        start: info.date
      });
    }
  },
  selectable: true,
  editable: true,
  locale: "es"
});

calendar.render();