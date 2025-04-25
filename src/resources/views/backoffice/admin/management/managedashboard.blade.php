@extends('layouts.admin')

@section('title', 'Panel de Administración')

@section('admincontent')
<div class="container mt-5">
    <h1 class="text-center mb-4">Panel de Control</h1>

    <p class="text-center">Bienvenido, {{ Auth::guard('admin')->user()->name }}</p>

    <!-- Accesos directos -->
    <div class="row text-center mb-4">
        @if ($isSuperAdmin)
            <!-- Acceso solo para Superadmin -->
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-dark shadow rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">Crear Usuario</h5>
                        <a href="{{ route('admin.users.create') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-primary shadow rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">Crear Admin</h5>
                        <a href="{{ route('admin.admins.create') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        @endif

        <!-- Acceso para Admins Regulares -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info shadow rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Ver Mis Tickets</h5>
                    <a href="{{ route('admin.show.assigned.tickets') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary shadow rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Historial de Eventos</h5>
                    <a href="{{ route('admin.history.events') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mb-4">
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">Usuarios Registrados</h5>
                    <h2 class="card-text text-shadow">{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">Administradores</h5>
                    <h2 class="card-text text-primary">{{ $totalAdmins }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">Tickets Totales</h5>
                    <h2 class="card-text text-warning">{{ $totalTickets }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">Tickets Pendientes</h5>
                    <h2 class="card-text text-danger">{{ $pendingTickets }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">Tickets Resueltos</h5>
                    <h2 class="card-text text-success">{{ $resolvedTickets }}</h2>
                </div>
            </div>
        </div>
    </div>


    <!-- Últimos eventos (Reducir tamaño) -->
    <div class="card shadow mb-4 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h5 class="mb-0">Últimos Eventos</h5>
        </div>
        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
            @if($recentEvents->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="sticky-top bg-primary text-white">
                            <tr>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentEvents as $event)
                                <tr>
                                    <td>{{ $event->event_type }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->user }}</td>
                                    <td>{{ $event->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">No hay eventos recientes.</p>
            @endif
        </div>
    </div>


    <!-- Notificaciones Recientes -->
    <div class="card shadow mb-4 rounded-4">
        <div class="card-header bg-info text-white rounded-top-4">
            <h5 class="mb-0">Notificaciones Recientes</h5>
        </div>
        <div class="card-body">
            @if($recentNotifications->count())
                <ul class="list-group">
                    @foreach($recentNotifications as $notification)
                        <li class="list-group-item">
                            {{ $notification->data['message'] }} <small class="text-muted">({{ $notification->created_at->diffForHumans() }})</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay notificaciones recientes.</p>
            @endif
        </div>
    </div>
</div>
@endsection
