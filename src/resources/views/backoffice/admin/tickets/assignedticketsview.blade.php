@extends('layouts.admin')

@section('title', 'Tickets Asignados')

@section('admincontent')

<div class="container mt-5">
    <h1 class="text-center mb-4">Tickets Asignados</h1>
    
    <form method="GET" action="{{ route('admin.show.assigned.tickets') }}" class="mt-4">
        <div class="form-row">
            <div class="col">
                <select name="status" class="form-control">
                    <option value="">Estado</option>
                    <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="col mt-2">
                <select name="priority" class="form-control">
                    <option value="">Prioridad</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                    <option value="critical" {{ request('priority') == 'critical' ? 'selected' : '' }}>Critical</option>
                </select>
            </div>
            <div class="col mt-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <!-- Tabla de Tickets Asignados -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Prioridad</th>
                <th>Tipo</th>
                <th>Comentarios</th>
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignedTickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ ucfirst($ticket->priority) }}</td>
                    <td>{{ ucfirst($ticket->type) }}</td>
                    <td>{{ $ticket->comments->count() }}</td>
                    <td>
                        <a href="{{ route('admin.view.ticket', $ticket->id) }}" class="btn btn-info btn-sm">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $assignedTickets->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection
