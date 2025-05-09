@extends('layouts.frontoffice')

@section('title', 'Listado de Tickets')

@section('content')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-5">
    <h2 class="text-center">{{ __('frontoffice.tickets.list_title') }}</h2>
    

    <div class="mt-5">
        @if ($tickets->isEmpty())
            <div class="alert alert-info text-center">
                {{ __('frontoffice.tickets.heading') }}
            </div>
        @else
            <table class="table table-striped">
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
                                <a href="{{ route('user.tickets.show', ['locale' => app()->getLocale(), 'ticket' => $ticket, 'username' => Auth::user()->id]) }}" class="btn btn-info btn-sm">
                                    {{ __('frontoffice.tickets.detail') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($tickets->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $tickets->links('pagination::bootstrap-4') }}
                </div>
            @endif
        @endif

    </div>
    <a href="{{ route('user.notifications', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}" class="btn btn-warning">
        {{ __('frontoffice.notifications') }}
        @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
        @endif
    </a>

    <div class="d-flex justify-content-end mt-4">
        <form method="POST" action="{{ route('logout', ['locale' => app()->getLocale(), 'username' => Auth::user()->id]) }}">
            @csrf
            <button type="submit" class="btn btn-danger">{{ __('frontoffice.logout') }}</button>
        </form>
    </div>
</div>
@endsection
