@extends('layouts.admin')

{{-- Se utiliza la traducción para el título de la página --}}
@section('title', __('general.admin_dashboard.page_title'))

@section('admincontent')
<div class="container mt-5">
    {{-- Título principal del panel de control --}}
    <h1 class="text-center mb-4">{{ __('general.admin_dashboard.control_panel') }}</h1>

    {{-- Mensaje de bienvenida dinámico (se pasa el nombre del usuario como parámetro) --}}
    <p class="text-center">{{ __('general.admin_dashboard.welcome_message', ['name' => Auth::guard('admin')->user()->name]) }}</p>

    <!-- Accesos directos -->
    <div class="row text-center mb-4">
        @if ($isSuperAdmin)
            {{-- Acceso solo para Superadmin --}}
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-dark shadow rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('general.admin_dashboard.superadmin_manage_users') }}</h5>
                        <a href="{{ route('admin.dashboard.list.users') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-white bg-primary shadow rounded-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('general.admin_dashboard.superadmin_manage_admins') }}</h5>
                        <a href="{{ route('admin.dashboard.list.admins') }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        @endif

        {{-- Acceso para Admins Regulares --}}
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info shadow rounded-4">
                <div class="card-body">
                    <h5 class="card-title">{{ __('general.admin_dashboard.regular_view_tickets') }}</h5>
                    <a href="{{ route('admin.show.assigned.tickets') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-secondary shadow rounded-4">
                <div class="card-body">
                    <h5 class="card-title">{{ __('general.admin_dashboard.regular_event_history') }}</h5>
                    <a href="{{ route('admin.history.events') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row text-center mb-4">
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">{{ __('general.admin_dashboard.registered_users') }}</h5>
                    <h2 class="card-text text-shadow">{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">{{ __('general.admin_dashboard.admins') }}</h5>
                    <h2 class="card-text text-primary">{{ $totalAdmins }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">{{ __('general.admin_dashboard.total_tickets') }}</h5>
                    <h2 class="card-text text-warning">{{ $totalTickets }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">{{ __('general.admin_dashboard.pending_tickets') }}</h5>
                    <h2 class="card-text text-danger">{{ $pendingTickets }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-light shadow rounded-4 h-100">
                <div class="card-body">
                    <h5 class="card-title text-muted">{{ __('general.admin_dashboard.resolved_tickets') }}</h5>
                    <h2 class="card-text text-success">{{ $resolvedTickets }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimos eventos (Reducir tamaño) -->
    <div class="card shadow mb-4 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h5 class="mb-0">{{ __('general.admin_dashboard.latest_events_card_title') }}</h5>
        </div>
        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
            @if($recentEvents->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="sticky-top bg-primary text-white">
                            <tr>
                                <th>{{ __('general.admin_dashboard.latest_events_table_type') }}</th>
                                <th>{{ __('general.admin_dashboard.latest_events_table_description') }}</th>
                                <th>{{ __('general.admin_dashboard.latest_events_table_user') }}</th>
                                <th>{{ __('general.admin_dashboard.latest_events_table_date') }}</th>
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
                <p class="text-muted">{{ __('general.admin_dashboard.latest_events_none') }}</p>
            @endif
        </div>
    </div>

    <!-- Notificaciones Recientes -->
    <div class="card shadow mb-4 rounded-4">
        <div class="card-header bg-info text-white rounded-top-4">
            <h5 class="mb-0">{{ __('general.admin_dashboard.recent_notifications_card_title') }}</h5>
        </div>
        <div class="card-body">
            @if($recentNotifications->count())
                <ul class="list-group">
                    @foreach($recentNotifications as $notification)
                        <li class="list-group-item">
                            {{ $notification->data['message'] }} 
                            <small class="text-muted">({{ $notification->created_at->diffForHumans() }})</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">{{ __('general.admin_dashboard.recent_notifications_none') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
