import flatpickr from "flatpickr";
import {Spanish} from "flatpickr/dist/l10n/es.js";

// Configurar el calendario
document.addEventListener('DOMContentLoaded',function () {
    flatpickr("#event-dateTime", {
        enableTime: true, // Si no necesitas seleccionar hora agrega (false)
        time_24hr: false, //Usa el formato de 24 hrs
        dateFormat: "Y-m-d H:i", // Formato de fecha y Hora H->24 hrs h->12 hrs(ej: 2024-12-27 17:55)
        minDate: "today", // No permitir fechas pasadas
        disable: [],
        locale: Spanish, //Establecer el idioma en español
        firstDayOfWeek: 1 // Semana comienza en lunes
    });
});
