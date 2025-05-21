<div class="p-3">
    <h5>{{ $notification->data['title'] ?? __('general.admin_notifications.notification') }}</h5>

    <p>{{ $notification->data['message'] ?? __('general.admin_notifications.no_message') }}</p>

    @isset($notification->data['status'])
        <p><strong>Estado:</strong> {{ ucfirst($notification->data['status']) }}</p>
    @endisset

    @isset($notification->data['author'])
        <p><strong>Autor:</strong> {{ $notification->data['author'] }}</p>
    @endisset

    <hr>
    <small>{{ __('general.admin_notifications.sent_at') }}: {{ $notification->created_at->format('d/m/Y H:i') }}</small>
</div>
