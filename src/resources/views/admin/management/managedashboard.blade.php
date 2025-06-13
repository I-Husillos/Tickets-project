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
        <div class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-history mr-2"></i> {{ __('general.admin_dashboard.latest_events_card_title') }}</h5>
            <a href="{{ route('admin.history.events', ['locale' => app()->getLocale()]) }}" class="btn btn-sm btn-light">
                <i class="fas fa-list"></i> Ver todo
            </a>
        </div>
        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
            @if($recentEvents->count())
                <div class="table-responsive">
                    <table class="table table-hover text-sm">
                        <thead class="sticky-top bg-primary text-white">
                            <tr>
                                <th><i class="fas fa-tag"></i></th>
                                <th>{{ __('general.admin_dashboard.latest_events_table_description') }}</th>
                                <th><i class="fas fa-user"></i></th>
                                <th><i class="fas fa-clock"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentEvents as $event)
                                <tr>
                                    <td>
                                        <span class="badge 
                                            @if($event->event_type === 'created') badge-success
                                            @elseif($event->event_type === 'updated') badge-warning
                                            @elseif($event->event_type === 'deleted') badge-danger
                                            @else badge-secondary
                                            @endif">
                                            {{ ucfirst($event->event_type) }}
                                        </span>
                                    </td>
                                    <td>{{ $event->description }}</td>
                                    <td><i class="fas fa-user-circle text-primary mr-1"></i> {{ $event->user }}</td>
                                    <td>{{ $event->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center text-muted">
                    <i class="fas fa-history fa-2x mb-2"></i>
                    <p>{{ __('general.admin_dashboard.latest_events_none') }}</p>
                </div>
            @endif
        </div>
    </div>



    <!-- Notificaciones Recientes -->
    <div class="card shadow mb-4 rounded-4">
        <div class="card-header bg-info text-white rounded-top-4 d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-bell mr-2"></i> {{ __('general.admin_dashboard.recent_notifications_card_title') }}</h5>
            <a href="{{ route('admin.notifications', ['locale' => app()->getLocale()]) }}" class="btn btn-sm btn-light">
                <i class="fas fa-eye"></i> Ver todas
            </a>
        </div>
        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
            @if($recentNotifications->count())
                <ul class="list-group list-group-flush">
                    @foreach($recentNotifications as $notification)
                        @php
                            $type = $notification->data['type'] ?? 'info';
                            $icon = match($type) {
                                'comment' => 'fas fa-comment',
                                'status' => 'fas fa-sync-alt',
                                'close' => 'fas fa-lock',
                                'open', 'reopened' => 'fas fa-unlock',
                                default => 'fas fa-info-circle'
                            };

                            $badge = match($type) {
                                'comment' => 'primary',
                                'status' => 'warning',
                                'close' => 'danger',
                                'open', 'reopened' => 'success',
                                default => 'secondary'
                            };
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="d-flex align-items-center">
                                <span class="badge badge-{{ $badge }} mr-3 p-2">
                                    <i class="{{ $icon }}"></i>
                                </span>
                                <div>
                                    <div>{{ $notification->data['message'] }}</div>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    {{-- Botón para ver detalle (mismo que en la vista de notificaciones) --}}
                                    <div>
                                        <button 
                                            class="btn btn-link btn-sm text-info p-0 show-notification-dashboard"
                                            data-id="{{ $notification->id }}">
                                            <i class="fas fa-eye"></i> {{ __('Ver detalle') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center text-muted">
                    <i class="fas fa-bell-slash fa-2x mb-2"></i>
                    <p>{{ __('general.admin_dashboard.recent_notifications_none') }}</p>
                </div>
            @endif
        </div>
    </div>


@push('modals')
    @include('components.modals.showNotifications')
@endpush


</div>
@endsection
