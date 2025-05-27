<form action="{{ route('admin.notifications.read', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}"
      method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    <button type="submit" class="btn btn-sm btn-outline-success">
        {{ __('general.admin_notifications.mark_as_read') }}
    </button>
</form>

<button type="button"
        class="btn btn-sm btn-outline-info show-notification"
        data-id="{{ $notification->id }}">
    <i class="fas fa-eye"></i>
</button>
