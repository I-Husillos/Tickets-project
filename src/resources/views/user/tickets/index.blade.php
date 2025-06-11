@extends('layouts.user')

@section('title', __('frontoffice.tickets.list_title'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title')]
];
@endphp


<div class="container mt-5">

    {{-- Título y botón --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="fas fa-ticket-alt"></i> {{ __('frontoffice.tickets.list_title') }}
        </h1>
        <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}"
           class="btn btn-success shadow rounded-4">
            <i class="fas fa-plus"></i> {{ __('frontoffice.tickets.create_button') }}
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Tabla --}}
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

</div>
@endsection


