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
                @foreach ($tickets as $ticket)
                    <div class="col-md-4 mb-4">
                        <div class="card card-outline 
                            @if($ticket->status === 'new') card-primary 
                            @elseif($ticket->status === 'resolved') card-success 
                            @elseif($ticket->status === 'pending') card-warning 
                            @else card-secondary 
                            @endif">

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{ $ticket->title }}</h5>
                                <span class="badge">{{ ucfirst($ticket->status) }}</span>
                            </div>

                            <div class="card-body">
                                <p><i class="fas fa-flag"></i> <strong>{{ __('frontoffice.tickets.table.priority') }}:</strong> {{ ucfirst($ticket->priority) }}</p>
                                <p><i class="fas fa-comments"></i> <strong>{{ __('frontoffice.tickets.table.comments') }}:</strong> {{ $ticket->comments->count() }}</p>
                                <p><i class="fas fa-calendar-alt"></i> <strong>{{ __('frontoffice.tickets.table.date') }}:</strong> {{ $ticket->created_at->format('d/m/Y') }}</p>
                            </div>

                            <div class="card-footer d-flex justify-content-between">
                                <!-- Ver Ticket -->
                                <a href="{{ route('user.tickets.show', ['locale' => app()->getLocale(), 'ticket' => $ticket, 'username' => Auth::user()->id]) }}" 
                                class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> {{ __('frontoffice.tickets.detail') }}
                                </a>
                                <!-- Editar Ticket -->
                                <a href="{{ route('user.tickets.edit', ['locale' => app()->getLocale(), 'ticket' => $ticket, 'username' => Auth::user()->id]) }}" 
                                class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> {{ __('frontoffice.tickets.edit') }}
                                </a>
                                <!-- Eliminar Ticket -->
                                <form action="{{ route('user.tickets.destroy', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}" 
                                    method="POST" style="display: inline-block;" 
                                    onsubmit="return confirm('{{ __('¿Estás seguro de eliminar este ticket?') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> {{ __('Eliminar') }}
                                    </button>
                                </form>
                            </div>
                            @push('modals')
                                @include('components.modals.comment', ['ticket' => $ticket])
                            @endpush
                        </div>
                    </div>
                @endforeach
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


