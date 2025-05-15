@extends('layouts.admin')

{{-- Se establece el título de la página mediante la traducción --}}
@section('title', __('general.admin_notifications.page_title'))

@section('admincontent')
<div class="container mt-5">
    <!-- Encabezado -->
    <h2 class="text-center">{{ __('general.admin_notifications.header') }}</h2>

    @if ($notifications->isEmpty())
        <p>{{ __('general.admin_notifications.no_notifications') }}</p>
    @else
    <form method="GET" action="{{ route('admin.notifications', ['locale' => app()->getLocale()]) }}" class="mb-4">
        <div class="form-row">
            <div class="col-md-4">
                <select name="type" class="form-control">
                    <!-- Opción por defecto -->
                    <option value="">{{ __('general.admin_notifications.filter_placeholder') }}</option>
                    <option value="ticket" {{ request('type') == 'ticket' ? 'selected' : '' }}>
                        {{ __('general.admin_notifications.option_ticket') }}
                    </option>
                    <option value="comment" {{ request('type') == 'comment' ? 'selected' : '' }}>
                        {{ __('general.admin_notifications.option_comment') }}
                    </option>
                </select>
            </div>
            <div class="col-md-">
                <button type="submit" class="btn btn-primary">
                    {{ __('general.admin_notifications.filter_button') }}
                </button>
            </div>
        </div>
    </form>

    <div class="list-group mt-4">
        @foreach ($notifications as $notification)
            <a href="{{ route('admin.view.ticket', ['locale' => app()->getLocale(), 'ticket' => $notification->data['ticket_id']]) }}" class="list-group-item list-group-item-action
                @if ($notification->read_at) 
                    list-group-item-secondary 
                @else
                    list-group-item-primary 
                @endif"
            >
                <strong>{{ $notification->data['message'] }}</strong><br>

                <!-- Si existe el estado en la data de la notificación -->
                @isset($notification->data['status'])
                    <p>
                        <strong>{{ __('general.admin_notifications.status_label') }}</strong>
                        {{ ucfirst($notification->data['status']) }}
                    </p>
                @endisset

                <!-- Si existe un autor -->
                @isset($notification->data['author'])
                    <p>
                        <strong>{{ __('general.admin_notifications.author_label') }}</strong>
                        {{ $notification->data['author'] }}
                    </p>
                @endisset

                <!-- Si existe un comentario -->
                @isset($notification->data['comment'])
                    <p>
                        <strong>{{ __('general.admin_notifications.comment_label') }}</strong>
                        "{{ $notification->data['comment'] }}"
                    </p>
                @endisset

                <small>{{ $notification->created_at->format('d/m/Y H:i') }}</small>

                @if (!$notification->read_at)
                    <form action="{{ route('admin.notifications.read', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-outline-secondary float-right">
                            {{ __('general.admin_notifications.mark_as_read') }}
                        </button>
                    </form>
                @endif
            </a>
        @endforeach
    </div>
    @endif
    <div class="d-flex justify-content-center mt-4">
        {{ $notifications->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
