import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";

import "@fullcalendar/common/main.css";
import "@fullcalendar/daygrid/main.css";
import "@fullcalendar/timegrid/main.css";

import "./calendar.css"; // this will create a calendar.css file reachable to 'encore_entry_link_tags'

document.addEventListener("DOMContentLoaded", () => {
  var calendarEl = document.getElementById("calendar-holder");

  var eventsUrl = calendarEl.dataset.eventsUrl;

  var calendar = new Calendar(calendarEl, {
    initialView: "dayGridMonth",
    editable: true,
    eventSources: [
      {
        url: eventsUrl,
        method: "POST",
        extraParams: {
          filters: JSON.stringify({})
        },
        failure: () => {
          // alert("There was an error while fetching FullCalendar!");
        },
      },
    ],
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: 'dayGridMonth,timeGridWeek,timeGridDay addEventButton',
    },
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin], // https://fullcalendar.io/docs/plugin-index
    timeZone: "UTC+2",
    customButtons: {
      addEventButton: {
        text: 'add event...',
        click: function() {
          var dateStr = prompt('Enter a date in YYYY-MM-DD format');
          var date = new Date(dateStr + 'T00:00:00'); // will be in local time

          if (!isNaN(date.valueOf())) { // valid?
            calendar.addEvent({
              title: 'dynamic event',
              start: date,
              allDay: true
            });
            alert('Great. Now, update your database...');
          } else {
            alert('Invalid date.');
          }
        }
      }
    }
  });
  calendar.render();
});
