@extends('layouts.user')

@section('title', 'Mis Notificaciones')

@section('content')
<div class="container   ">
    <h2 class="text-center">{{ __('frontoffice.notifications_title') }}</h2>

    @if ($notifications->isEmpty())
        <p>No tienes notificaciones.</p>
    @else
    <form method="GET" action="{{ route('user.notifications', ['locale' => app()->getLocale()]) }}" class="mb-4">
        <div class="form-row">
            <div class="col-md-4">
            <select name="type" class="form-control">
                <option value="">-- {{ __('frontoffice.filter_by_type') }} --</option>
                <option value="status" {{ request('type') == 'status' ? 'selected' : '' }}>{{ __('frontoffice.filter_by_change_status') }}</option>
                <option value="comment" {{ request('type') == 'comment' ? 'selected' : '' }}>{{ __('frontoffice.filter_by_add_comment') }}</option>
            </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">{{ __('frontoffice.filter') }}</button>
            </div>
        </div>
    </form>

        <div class="list-group mt-4">
            @foreach ($notifications as $notification)
                <a href="{{ route('user.tickets.show', ['ticket' => $notification->data['ticket_id'], 'locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action
                    @if ($notification->read_at) 
                        list-group-item-light 
                    @else
                        list-group-item-info 
                    @endif
                ">
                    <!-- Mensaje principal -->
                    <strong>{{ $notification->data['message'] }}</strong><br>

                    <!-- Si es cambio de estado -->
                    @isset($notification->data['status'])
                        <p><strong>{{ __('frontoffice.tickets.new_status') }}:</strong> {{ ucfirst($notification->data['status']) }}</p>
                    @endisset

                    <!-- Si tiene autor -->
                    @isset($notification->data['author'])
                        <p><strong>{{ __('frontoffice.tickets.author') }}:</strong> {{ $notification->data['author'] }}</p>
                    @endisset

                    <!-- Si tiene contenido del comentario -->
                    @isset($notification->data['comment'])
                        <p><strong>{{ __('frontoffice.tickets.comment') }}:</strong> "{{ $notification->data['comment'] }}"</p>
                    @endisset

                    <!-- Si tiene info del que actualizó -->
                    @isset($notification->data['name'])
                        <p><strong>Actualizado por:</strong> {{ $notification->data['name']}}</p>
                    @endisset

                    <!-- Fecha -->
                    <small>{{ __('frontoffice.received_at') }}: {{ $notification->created_at->format('d/m/Y H:i') }}</small>

                    <!-- Marcar como leído -->
                    @if (!$notification->read_at)
                        <form action="{{ route('user.notifications.read', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm btn-outline-secondary float-right">{{ __('frontoffice.mark_as_read') }}</button>
                        </form>
                    @else
                        <span class="badge badge-success float-right">{{ __('frontoffice.readed') }}</span>
                    @endif
                </a>
            @endforeach
        </div>
        @if ($notifications->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $notifications->links('pagination::bootstrap-4') }}
            </div>
        @endif
    @endif
</div>
@endsection
