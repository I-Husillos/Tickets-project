@extends('layouts.user')

@section('title', __('frontoffice.dashboard.title'))

@section('content')
@php
$breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('frontoffice.dashboard.title')]
    ];
@endphp
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <!-- Resumen General -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">{{ __('frontoffice.dashboard.open_tickets') }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $openTickets }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">{{ __('frontoffice.dashboard.resolved_tickets') }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $resolvedTickets }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">{{ __('frontoffice.dashboard.pending_tickets') }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pendingTickets }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimos Tickets Modificados -->
    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">{{ __('frontoffice.dashboard.latest_tickets') }}</div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($latestTickets as $ticket)
                    <li class="list-group-item d-flex justify-content-between">
                    <span>{{ $ticket->title }}</span>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('user.tickets.show', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('user.tickets.edit', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Botón de Crear Ticket -->
    <div class="mt-4">
        <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success">
            {{ __('frontoffice.dashboard.create_ticket') }}
        </a>
    </div>
</div>
@endsection
