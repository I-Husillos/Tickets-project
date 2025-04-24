@extends('layouts.admin')

@section('title', 'Historial de Eventos')

@section('admincontent')
<div class="container mt-5">
    <h1 class="text-center mb-4">Historial de Eventos</h1>

    <!-- Formulario de filtrado de eventos -->
    <form method="GET" action="{{ route('admin.history.index') }}">
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
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->event_type }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->user }}</td>
                        <td>{{ $event->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $events->links() }}
    </div>
</div>
@endsection
