@php
    $isRead = $notification->read_at !== null;
@endphp

<div class="list-group-item {{ $isRead ? 'list-group-item-secondary' : 'list-group-item-primary' }}">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <strong>{{ $notification->data['message'] }}</strong><br>
            <small>{{ $notification->created_at->format('d/m/Y H:i') }}</small>
        </div>

        <div class="btn-group">
            {{-- Botón para abrir modal --}}
            <button class="btn btn-sm btn-info view-notification-btn"
                    data-id="{{ $notification->id }}">
                <i class="fas fa-eye"></i> {{ __('general.admin_notifications.view_button') }}
            </button>

            {{-- Botón para marcar como leída --}}
            @if (! $isRead)
                <form action="{{ route('admin.notifications.read', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-check"></i> {{ __('general.admin_notifications.mark_as_read') }}
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
