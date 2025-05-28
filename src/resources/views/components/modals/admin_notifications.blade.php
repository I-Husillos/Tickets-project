@push('modals')
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="notificationModalLabel">
          {{ __('general.admin_notifications.modal_title') }}
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="{{ __('Close') }}">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="notificationDetails">
        <div class="text-center text-muted">
          <i class="fas fa-spinner fa-spin fa-2x"></i>
        </div>
      </div>
    </div>
  </div>
</div>
@endpush
