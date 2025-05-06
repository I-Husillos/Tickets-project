@extends('layouts.admin')

@section('title', 'Notificaciones')

@section('admincontent')
<div class="container mt-5">
    <h2 class="text-center">Notificaciones</h2>

    @if ($notifications->isEmpty())
        <p>No tienes notificaciones.</p>
    @else
    <form method="GET" action="{{ route('admin.notifications') }}" class="mb-4">
        <div class="form-row">
            <div class="col-md-4">
                <select name="type" class="form-control">
                    <option value="">-- Filtrar por tipo --</option>
                    <option value="ticket" {{ request('type') == 'ticket' ? 'selected' : '' }}>Ticket creado</option>
                    <option value="comment" {{ request('type') == 'comment' ? 'selected' : '' }}>Comentario añadido</option>
                </select>
            </div>
            <div class="col-md-">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="list-group mt-4">
        @foreach ($notifications as $notification)
            <a href="{{ route('admin.view.ticket', $notification->data['ticket_id']) }}" class="list-group-item list-group-item-action
                @if ($notification->read_at) 
                    list-group-item-secondary 
                @else
                    list-group-item-primary 
                @endif"
            >
                <strong>{{ $notification->data['message'] }}</strong><br>

                <!-- Si es cambio de estado -->
                @isset($notification->data['status'])
                <p><strong>Estado:</strong> {{ ucfirst($notification->data['status']) }}</p>
                @endisset

                <!-- Si tiene autor -->
                @isset($notification->data['author'])
                <p><strong>Autor:</strong> {{ $notification->data['author'] }}</p>
                @endisset

                <!-- Si tiene contenido del comentario -->
                @isset($notification->data['comment'])
                <p><strong>Comentario:</strong> "{{ $notification->data['comment'] }}"</p>
                @endisset

                <small>{{ $notification->created_at->format('d/m/Y H:i') }}</small>

                @if (!$notification->read_at)
                    <form action="{{ route('admin.notifications.read', $notification->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-outline-secondary float-right">Marcar como leída</button>
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
