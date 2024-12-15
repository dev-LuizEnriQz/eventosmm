import flatpickr from "flatpickr";

// Configurar el calendario
flatpickr("#event-date", {
    enableTime: false, // Si no necesitas seleccionar hora
    dateFormat: "Y-m-d", // Formato de fecha
    minDate: "today", // No permitir fechas pasadas
    disable: [
        // Lista de fechas ocupadas, estas deben venir desde tu backend
        "2024-12-25",
        "2024-12-31"
    ],
    locale: {
        firstDayOfWeek: 1 // Semana comienza en lunes
    },
});
