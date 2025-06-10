@extends('layouts.user')

@section('title', __('frontoffice.tickets.list_title'))

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.tickets.list_title')]
];
@endphp


<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ __('frontoffice.tickets.list_title') }}</h3>
        <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" class="btn btn-success float-right">
            <i class="fas fa-plus"></i> {{ __('frontoffice.tickets.create_button') }}
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card-body">
        @if ($tickets->isEmpty())
            <div class="alert alert-info text-center">
                {{ __('frontoffice.tickets.heading') }}
            </div>
        @else
            <div class="row">
                <div class="card-body">
                    <table id="tabla-tickets"
                        class="table table-bordered table-hover"
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

            @if ($tickets->hasPages())
                <div class="mt-3 d-flex justify-content-center">
                    {{ $tickets->links('pagination::bootstrap-4') }}
                </div>
            @endif
        @endif
        <!-- <a href="{{ route('user.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary mt-3">
            {{ __('frontoffice.dashboard.return_to_user_dashboard') }}
        </a> -->
    </div>
</div>
@endsection


