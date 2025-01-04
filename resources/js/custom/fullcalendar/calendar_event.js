import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import multiMonthPlugin from '@fullcalendar/multimonth';

import * as bootstrap from 'bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    //Agregamos If si el metodo calendar existe
    if(calendarEl){
        var calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, multiMonthPlugin],
            initialView: 'multiMonthYear',
            locale: 'es',//Idioma Espańol
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'multiMonthYear,dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '/calendar/api/events',//Cargar eventos desde el endpoint
            editable: false,//Permitir arrastrar eventos
            droppable: false,//Permitir soltar eventos
            multiMonthMaxColumns: 2,//Maximo de columnas (meses por fila)
            multiMonthMinWidth: 700,//Ancho minimo para mostrar multi-meses

            eventClick: function (info) {
                const event = info.event.extendedProps;

                //Verifica si el modal esta correctamente presente
                const modalElement = document.getElementById('eventDetailModal');
                if(!modalElement){
                    console.error('No se encontro el modal con el ID "eventDetailModal".');
                    return;
                }

                const modal = new bootstrap.Modal(document.getElementById('eventDetailModal'));
                document.getElementById('modalEventTitle').innerText = info.event.title || 'Sin Titulo';
                document.getElementById('modalClientName').innerText = event.client_name || 'No Disponible';
                document.getElementById('modalEventType').innerText = event.event_type || 'No Disponible';
                document.getElementById('modalGuests').innerText = event.guests || 'No Disponible';
                document.getElementById('modalPackage').innerText = event.package_type || 'No Disponible';
                document.getElementById('modalDescription').innerText = event.description || 'No Disponible';
                document.getElementById('modalStatus').innerText = event.status || 'No Disponible';

                modal.show();
            },
        });
        calendar.render();
    } else {
        console.error('No se encontro el contenedor del ID "Calendar".');
    }
});
