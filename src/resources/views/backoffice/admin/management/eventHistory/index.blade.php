@extends('layouts.admin')

@section('title', 'Historial de Eventos')

@section('admincontent')
<div class="container mt-5">
    <h1 class="text-center mb-4">Historial de Eventos</h1>

    <!-- Formulario de filtrado de eventos -->
    <form method="GET" action="{{ route('admin.history.events') }}">
        <div class="row">
            <div class="col-md-4">
                <label for="event_type">Tipo de Evento</label>
                <input type="text" name="event_type" class="form-control" value="{{ request()->event_type }}">
            </div>
            <div class="col-md-4">
                <label for="date">Fecha</label>
                <input type="date" name="date" class="form-control" value="{{ request()->date }}">
            </div>
            <div class="col-md-4">
                <label for="user">Usuario</label>
                <input type="text" name="user" class="form-control" value="{{ request()->user }}">
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Tabla para mostrar los eventos -->
    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipo de Evento</th>
                    <th>Descripción</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            @if(isset($events) && $events->count())
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->event_type }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->user}}</td>
                        <td>{{ $event->created_at }}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No hay eventos disponibles.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Volver a la lista de Usuarios</a>
    </div>


</div>
@endsection
