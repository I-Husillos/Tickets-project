{{-- Este modal estará vacío al principio y se llenará por JS --}}
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="notificationLabel">{{ __('frontoffice.notifications_detail') }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- Aquí se inyectará contenido dinámico -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
            </div>
        </div>
    </div>
</div>
