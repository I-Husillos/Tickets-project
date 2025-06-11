<div class="btn-group btn-group-sm" role="group">
    {{-- Botón para marcar como leída --}}
    <button type="button"
            class="btn btn-outline-success mark-as-read"
            data-id="{{ $notification->id }}"
            title="{{ __('general.admin_notifications.mark_as_read') }}">
        <i class="fas fa-check"></i>
    </button>


    {{-- Botón para ver el contenido --}}
    <button type="button"
            class="btn btn-sm btn-outline-info show-notification"
            data-id="{{ $notification->id }}"
            title="{{ __('Ver detalle') }}">
        <i class="fas fa-eye"></i>
    </button>
</div>
