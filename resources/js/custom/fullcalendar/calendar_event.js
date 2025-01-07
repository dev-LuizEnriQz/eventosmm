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
            initialView: 'multiMonthFourMonth',
            views:{
                multiMonthFourMonth: {
                    type: 'multiMonth',
                    duration: { months: 4},
                    multiMonthMaxColumns: 2,//Maximo de columnas (meses por fila)
                    multiMonthMinWidth: 700,//Ancho minimo para mostrar multi-meses
                }
            },
            locale: 'es',//Idioma Espańol
            headerToolbar: {
                left: 'multiMonthYear,dayGridMonth',//,timeGridWeek,timeGridDay Pendiente para agregar
                center: 'title',
                right: 'today,prev,next',
            },
            aspectRatio:2, //Ajusta la relación de aspecto para mas espacio horizontal
            height:'auto', //Ajusta la altura de manera automatica

            events: function (fetchInfo, successCallback, failureCallback){
              let status = document.getElementById('filterStatus').value;//Obtener resultados por estado seleccionado

              fetch(`/calendar/api/events?status=${status}`)
                  .then(response => {
                      if (!response.ok){
                          throw new Error('Error al obtener los eventos');
                      }
                      return response.json();
                  })
                  .then(data => successCallback(data))
                  .catch(error => {
                      console.error('Error cargando eventos:', error);
                      failureCallback(error);
                  });
            },

            editable: false,//Permitir arrastrar eventos
            droppable: false,//Permitir soltar eventos

            eventClick: function (info) {
                const event = info.event.extendedProps;

                //Verifica si el modal esta correctamente presente
                const modalElement = document.getElementById('eventDetailModal');
                if(!modalElement){
                    console.error('No se encontro el modal con el ID "eventDetailModal".');
                    return;
                }

                const modal = new bootstrap.Modal(document.getElementById('eventDetailModal'));
                document.getElementById('modalFolio').innerText = event.folio || 'No Disponible';
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
        //Detectar cambio en el selector del estado
        document.getElementById('filterStatus').addEventListener('change', function (){
            calendar.refetchEvents(); //Recargar eventos
        });
    } else {
        console.error('No se encontro el contenedor del ID "Calendar".');
    }
});
