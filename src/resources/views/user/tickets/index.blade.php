@extends('layouts.user')

@section('title', __('frontoffice.tickets.list_title'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title')]
];
@endphp

<div class="container-fluid mt-3">

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Filtros -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-filter"></i> {{ __('Filtros Específicos') }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __('Estado') }}:</label>
                        <select class="form-control" id="filter-status">
                            <option value="Todos">{{ __('Todos') }}</option>
                            <option value="new">{{ __('Nuevo') }}</option>
                            <option value="pending">{{ __('Pendiente') }}</option>
                            <option value="in_progress">{{ __('En Proceso') }}</option>
                            <option value="resolved">{{ __('Resuelto') }}</option>
                            <option value="closed">{{ __('Cerrado') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __('Prioridad') }}:</label>
                        <select class="form-control" id="filter-priority">
                            <option value="Todas">{{ __('Todas') }}</option>
                            <option value="low">{{ __('Baja') }}</option>
                            <option value="medium">{{ __('Media') }}</option>
                            <option value="high">{{ __('Alta') }}</option>
                            <option value="critical">{{ __('Crítica') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ __('Tipo') }}:</label>
                        <select class="form-control" id="filter-type">
                            <option value="Todos">{{ __('Todos') }}</option>
                            <option value="bug">{{ __('Bug') }}</option>
                            <option value="improvement">{{ __('Mejora') }}</option>
                            <option value="request">{{ __('Solicitud') }}</option>
                            <option value="question">{{ __('Consulta') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card principal -->
    <div class="card">
        <div class="card-header bg-info text-white">
            <div class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                <h3 class="card-title m-0">
                    <i class="fas fa-ticket-alt"></i>
                    {{ __('frontoffice.tickets.list_title') }}
                </h3>
                <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}"
                   class="btn btn-light text-dark mt-2 mt-md-0 shadow rounded-4">
                    <i class="fas fa-plus"></i> {{ __('frontoffice.tickets.create_button') }}
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="tabla-tickets-usuario"
                    class="table table-hover table-striped table-bordered mb-0 dt-responsive nowrap"
                    data-api-url="{{ url('/api/user/tickets') }}"
                    data-locale="{{ app()->getLocale() }}">
                    <thead class="text-center bg-white font-weight-bold">
                        <tr>
                            <th>{{ __('Título') }}</th>
                            <th>{{ __('Estado') }}</th>
                            <th>{{ __('Prioridad') }}</th>
                            <th>{{ __('Comentarios') }}</th>
                            <th>{{ __('Fecha') }}</th>
                            <th>{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> <!-- /.card -->

</div> <!-- /.container-fluid -->
@endsection
