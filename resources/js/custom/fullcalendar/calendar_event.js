import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import multiMonthPlugin from '@fullcalendar/multimonth';

import * as bootstrap from 'bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    //Verificar si existe el contenedor del calendario
    if(!calendarEl){
        console.error('No se encontro el contenedor con el ID "Calendar".');
        return;
    }

    //Detectar si el dispositivo es movil
    const isMobile = window.innerWidth < 768;

    //Inicia Calendario
    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, multiMonthPlugin],
        initialView: isMobile ? 'dayGridMonth' : 'multiMonthFourMonth', //Vista Diferente para Moviles
        locale: 'es', //Configuración de Idioma
        aspectRatio: isMobile ? 1:2, //Relación mas compacta para Moviles
        height: 'auto', //Altura automatica
        headerToolbar: isMobile
            ? {
                left: 'prev,next',
                center: 'title',
                right: 'today',
            }
            : {
                left: 'multiMonthYear, dayGridMonth',
                center: 'title',
                right: 'today,prev,next',
            },
        views: {
            multiMonthFourMonth: {
                type: 'multiMonth',
                duration: {months: 4},
                multiMonthMaxColumns: isMobile ? 1:2, //Solo una columna si es Movil
                multiMonthMinWidth: 300, //Ancho minimo para mostrar multiples meses
            },
        },
        events: function (fetchInfo,successCallback,failureCallback){
            let status = document.getElementById('filterStatus').value; //Obtener filtro de estado selecionado
            fetch(`/calendar/api/events?status=${status}`)
                .then((response)=>{
                    if(!response.ok) throw new Error('Error al obtener los eventos');
                    return response.json();
                })
                .then((data)=> successCallback(data))
                .catch((error)=>{
                    console.error('Error al cargar los eventos:', error);
                    failureCallback(error);
                });
        },
        editable: false, //Deshabilitar edicion de arrastre
        droppable: false, //Deshabilitar soltando eventos

        //Manejo del evento al hacer click en un evento de calendario
        eventClick: function (info){
            const event = info.event.extendedProps;

            //Verificar si el modal existe
            const modalElement = document.getElementById('eventDetailModal');
            if (!modalElement){
                console.error('No se encontro el modal con el ID "eventDetailModal".');
                return;
            }

            //Mostrar detalles del evento en el modal
            const modal = new bootstrap.Modal(modalElement);
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

    //Renderizar el calendario
    calendar.render();

    //Manejar el cambio en el filtro del estado
    const filterStatusElement = document.getElementById('filterStatus');
    if (filterStatusElement){
        filterStatusElement.addEventListener('change', function (){
            calendar.refetchEvents(); //Recargar eventos
        });
    }
});
