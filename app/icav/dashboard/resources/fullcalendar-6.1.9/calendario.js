document.addEventListener("DOMContentLoaded", function () {
  /**
   * Código necesario para ejecutar el calendario
   */

  var Calendar = FullCalendar.Calendar;
  var calendarEl = document.getElementById("calendar");

  // initialize the calendar
  // -----------------------------------------------------------------

  var calendar = new Calendar(calendarEl, {
    events: "http://localhost:3000/api/calendar/",
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    selectable: true,
    locale: "es",
  });

  calendar.render();
});
