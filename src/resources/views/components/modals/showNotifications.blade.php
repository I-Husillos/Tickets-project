@push('modals')
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content shadow-lg rounded">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalLabel">
          <i class="fas fa-bell"></i> {{ __('Notificación') }}
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="{{ __('Cerrar') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="notificationDetails">
        {{-- Spinner o contenido dinámico --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
      </div>
    </div>
  </div>
</div>
@endpush
