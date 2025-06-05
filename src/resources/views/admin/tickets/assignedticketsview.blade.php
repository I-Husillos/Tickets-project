@extends('layouts.admin')

@section('title', __('general.admin_assigned_tickets.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_assigned_tickets.page_title'), 'url' => route('admin.manage.tickets', ['locale' => app()->getLocale()])],
    ];
@endphp
<div class="container mt-5">
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


        <!-- Tabla -->
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table id="tabla-tickets-asignados"
                    class="table table-hover table-striped table-bordered text-center dt-responsive nowrap"
                    data-api-url="{{ url('/api/admin/assigned-tickets') }}"
                    data-locale="{{ app()->getLocale() }}">
                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th>ID</th>
                            <th>{{ __('Título') }}</th>
                            <th>{{ __('Descripción') }}</th>
                            <th>{{ __('Estado') }}</th>
                            <th>{{ __('Prioridad') }}</th>
                            <th>{{ __('Tipo') }}</th>
                            <th>{{ __('Comentarios') }}</th>
                            <th>{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


