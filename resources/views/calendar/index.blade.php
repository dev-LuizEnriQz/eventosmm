<x-app-layout title="Agenda de Eventos">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5>Agenda de Eventos M&M</h5>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="filterStatus" class="form-label">Filtrar por estado de Evento:</label>
                    <select id="filterStatus" class="form-select">
                        <option value="">Todos</option>
                        <option value="approved">Aprovado</option>
                        <option value="pending">Pendiente</option>
                        <option value="Cancelled">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div id="calendar" style="max-width: 100%; margin: 0 auto;"></div>
            </div>
            <div class="card-footer">
                <h7>En caso de inconsistencias, favor de reportarlas.</h7>
            </div>
        </div>
    </div>

    <!--Modal de detalles de Evento -->
    <div class="modal fade" id="eventDetailModal" tabindex="-1" aria-labelledby="eventDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEventTitle">Detalle del Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Folio:</strong><span id="modalFolio" class="ms-2"></span> </p>
                    <p><strong>Cliente:</strong><span id="modalClientName" class="ms-2"></span></p>
                    <p><strong>Tipo de Evento:</strong><span id="modalEventType" class="ms-2"></span></p>
                    <p><strong>Numero de Invitados:</strong><span id="modalGuests" class="ms-2"></span></p>
                    <p><strong>Tipo de Paquete:</strong><span id="modalPackage" class="ms-2"></span></p>
                    <p><strong>Descripción:</strong><span id="modalDescription" class="ms-2"></span></p>
                    <p><strong>Estado:</strong><span id="modalStatus" class="ms-2"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/app.js','resources/js/custom/fullcalendar/calendar_event.js'])
</x-app-layout>
