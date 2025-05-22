@extends('layouts.admin')

{{-- Se utiliza la traducción para el título de la página --}}
@section('title', __('general.admin_dashboard.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_dashboard.page_title')]
    ];
@endphp

<div class="container">
    {{-- Título principal del panel de control --}}
    <h1 class="text-center mb-4">{{ __('general.admin_dashboard.control_panel') }}</h1>
    

    {{-- Mensaje de bienvenida dinámico (se pasa el nombre del usuario como parámetro) --}}
    <p class="text-center">{{ __('general.admin_dashboard.welcome_message', ['name' => Auth::guard('admin')->user()->name]) }}</p>

    <!-- Accesos directos -->
    <div class="row">
        @if ($isSuperAdmin)
            {{-- Acceso solo para Superadmin --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalUsers }}</h3>
                        <p>{{ __('general.admin_dashboard.registered_users') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="small-box-footer">
                        {{ __('general.admin_dashboard.superadmin_manage_users') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $totalAdmins }}</h3>
                        <p>{{ __('general.admin_dashboard.admins') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="small-box-footer">
                        {{ __('general.admin_dashboard.superadmin_manage_admins') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Acceso directo a tickets asignados -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalTickets }}</h3>
                        <p>Tickets asignados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="{{ route('admin.show.assigned.tickets', ['locale' => app()->getLocale()]) }}" class="small-box-footer">
                        Adminisrar tickets asignados<i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Acceso directo a tickets totales -->
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalTickets }}</h3>
                        <p>{{ __('general.admin_dashboard.total_tickets') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="small-box-footer">
                        Adminisrar tickets <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- Acceso directo a historial de eventos -->
            <!-- <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>25</h3>
                        <p>Historial de eventos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <a href="{{ route('admin.history.events', ['locale' => app()->getLocale()]) }}" class="small-box-footer">
                        Ver historial de eventos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div> -->
             
        @endif

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
