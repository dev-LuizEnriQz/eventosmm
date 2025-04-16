import $ from 'jquery';
window.$ = $;
window.jQuery = $;

import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import './bootstrap';
import './custom/forms/form-validation';
import 'datatables.net'; // Importar la funcionalidad de DataTables
import 'datatables.net-bs5'; // Importar DataTables con soporte de Bootstrap 5
import './custom/flatpickr/event_date_quote';//Importar Flatpickr para calendario de eventos
import 'datatables.net-responsive-bs5';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
