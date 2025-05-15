@extends('layouts.frontoffice')

@section('title', __('frontoffice.tickets.list_title'))

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">{{ __('frontoffice.tickets.list_title') }}</h3>
            <div class="card-tools">
                <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> {{ __('frontoffice.tickets.create_button') }}
                </a>
            </div>
        </div>

        <div class="card-body">
            @if ($tickets->isEmpty())
                <div class="alert alert-info text-center">
                    {{ __('frontoffice.tickets.heading') }}
                </div>
            @else
                <table id="tickets-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('frontoffice.tickets.table.id') }}</th>
                            <th>{{ __('frontoffice.tickets.table.title') }}</th>
                            <th>{{ __('frontoffice.tickets.table.status') }}</th>
                            <th>{{ __('frontoffice.tickets.table.priority') }}</th>
                            <th>{{ __('frontoffice.tickets.table.comments') }}</th>
                            <th>{{ __('frontoffice.tickets.table.date') }}</th>
                            <th>{{ __('frontoffice.tickets.table.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>
                                    <span class="badge 
                                        @if($ticket->status === 'new') badge-primary 
                                        @elseif($ticket->status === 'resolved') badge-success 
                                        @elseif($ticket->status === 'pending') badge-warning 
                                        @else badge-secondary 
                                        @endif">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td>{{ ucfirst($ticket->priority) }}</td>
                                <td>{{ $ticket->comments->count() }}</td>
                                <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('user.tickets.show', ['locale' => app()->getLocale(), 'ticket' => $ticket, 'username' => Auth::user()->id]) }}" 
                                       class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> {{ __('frontoffice.tickets.detail') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($tickets->hasPages())
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $tickets->links('pagination::bootstrap-4') }}
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('user.notifications', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" class="btn btn-warning">
            <i class="fas fa-bell"></i> {{ __('frontoffice.notifications') }}
            @if (Auth::user()->unreadNotifications->count() > 0)
                <span class="badge bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
            @endif
        </a>

        <form method="POST" action="{{ route('user.logout', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> {{ __('frontoffice.logout') }}
            </button>
        </form>
    </div>
@endsection
