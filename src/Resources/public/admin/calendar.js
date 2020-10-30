import { Calendar } from '@fullcalendar/core';
import { formatDate } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';

import '@fullcalendar/common/main.css';
import '@fullcalendar/daygrid/main.css';
import '@fullcalendar/timegrid/main.css';

import './calendar.css'; // this will create a calendar.css file reachable to 'encore_entry_link_tags'

document.addEventListener('DOMContentLoaded', () => {
  const calendarEl = document.getElementById('calendar-holder');

  const eventsGetUrl = calendarEl.dataset.eventsGetUrl;
  const eventsPushUrl = calendarEl.dataset.eventsPushUrl;

  var calendar = new Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    editable: true,
    eventSources: [
      {
        url: eventsGetUrl,
        method: 'POST',
        extraParams: {
          filters: JSON.stringify({}),
        },
        failure() {
          // alert("There was an error while fetching FullCalendar!");
        },
      },
    ],
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay addEventButton',
    },
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin], // https://fullcalendar.io/docs/plugin-index
    timeZone: 'UTC+2',
    customButtons: {
      addEventButton: {
        text: 'add event...',
        click() {
          const dateStr = prompt('Enter a date in YYYY-MM-DD format');
          const date = new Date(`${dateStr}T00:00:00`); // will be in local time

          if (!isNaN(date.valueOf())) { // valid?
            calendar.addEvent({
              title: 'dynamic event',
              start: date,
              allDay: true,
            });
            alert('Great. Now, update your database...');
          } else {
            alert('Invalid date.');
          }
        },
      },
    },
    eventDrop(info) {
      const start = info.event.start;
      const end = info.event.end;

      const data = {
        _method: 'PUT',
        rob_air_sylius_calendar_booking: {
          title: info.event.title,
          beginAt: {
            date: start.getUTCFullYear() + '-' + start.getUTCMonth() + '-' + start.getUTCDate(),
            time: start.getUTCHours() + ':' + start.getUTCMinutes(),
          },
          endAt: {
            date: end.getUTCFullYear() + '-' + end.getUTCMonth() + '-' + end.getUTCDate(),
            time: end.getUTCHours() + ':' + end.getUTCMinutes(),
          },
          calendar: info.event.extendedProps.calendarId,
        },
      };

      jQuery.ajax({
        url: info.event.url + '/edit',
        data: data,
        type: "PUT",
        success: function(json) {
          console.log(json);
        },
      });
    },
  });

  calendar.render();
});
