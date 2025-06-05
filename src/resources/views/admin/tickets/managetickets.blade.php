@extends('layouts.admin')

{{-- Se define el título de la página usando la traducción --}}
@section('title', __('general.admin_ticket_manage.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_ticket_manage.page_title')]
    ];
@endphp


<div class="container mt-5">
    <!-- Título del listado de tickets -->
    <h2 class="text-center">{{ __('general.admin_ticket_manage.list_title') }}</h2>
    <div class="d-flex justify-content-end mt-4">
    </div>
    <!-- Formulario de filtro -->
    <!-- <div class="card p-3 shadow-sm rounded-4 mt-4">
        <form method="GET" action="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}">
            <div class="row g-3">
                <div class="col-md-4">
                    status
                </div>
                <div class="col-md-4">
                    priority
                </div>
                <div class="col-md-4 text-end">
                    submit
                </div>
            </div>
        </form>
    </div> -->

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning">
                    <i class="fas fa-ticket-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('general.admin_dashboard.total_tickets') }}</span>
                    <span class="info-box-number">{{ $totalTickets }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success">
                    <i class="fas fa-ticket-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('general.admin_dashboard.resolved_tickets') }}</span>
                    <span class="info-box-number">{{ $resolvedTickets }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger">
                    <i class="fas fa-ticket-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('general.admin_dashboard.pending_tickets') }}</span>
                    <span class="info-box-number">{{ $pendingTickets }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
            <!-- Tabla de tickets -->
            <div class="table-responsive">
            <table id="tabla-tickets"
                class="table table-hover table-striped table-bordered text-center"
                data-api-url="{{ url('/api/admin/tickets') }}"
                data-locale="{{ app()->getLocale() }}">
                <thead class="text-center bg-white font-weight-bold">
                    <tr>
                        <th>#</th>
                        <th>{{ __('Título') }}</th>
                        <th>{{ __('Estado') }}</th>
                        <th>{{ __('Prioridad') }}</th>
                        <th>{{ __('Tipo') }}</th>
                        <th>{{ __('Comentarios') }}</th>
                        <th>{{ __('Asignado a') }}</th>
                        <th>{{ __('Acciones') }}</th>
                    </tr>
                </thead>
            </table>

            </div>
        </div>
    
    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $tickets->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection



