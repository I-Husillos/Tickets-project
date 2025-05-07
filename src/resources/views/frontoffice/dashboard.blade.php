@extends('layouts.frontoffice')

@section('title', __('general.frontoffice.tech_panel.title'))

@section('content')
<div class="container mt-5">
    <h2 class="text-center" >{{ __('general.frontoffice.tech_panel.welcome', ['name' => Auth::guard('admin')->user()->name]) }}</h2>

    <div class="d-flex justify-content-end mt-4">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">{{ __('general.frontoffice.tech_panel.logout') }}</button>
        </form>
    </div>

    {{-- Notificaciones --}}
    <div class="mt-5">
        <h4>{{ __('general.frontoffice.tech_panel.recent_notifications') }}</h4>
        @if($notifications->isEmpty())
            <div class="alert alert-info">{{ __('general.frontoffice.tech_panel.no_notifications') }}</div>
        @else
            <ul class="list-group">
                @foreach($notifications as $notification)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $notification->data['title'] }}</strong><br>
                            {{ $notification->data['message'] }}<br>
                            <small>{{ __('general.frontoffice.tech_panel.created_by') }}: {{ $notification->data['created_by'] }}</small>
                        </div>
                        <span class="badge bg-light text-dark">
                            {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    {{-- Tabla de tickets --}}
    <div class="mt-5">
        <h3>{{ __('general.frontoffice.tech_panel.all_tickets') }}</h3>
        @if ($tickets->isEmpty())
            <div class="alert alert-info">{{ __('general.frontoffice.tech_panel.no_tickets') }}</div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('general.frontoffice.tech_panel.table.id') }}</th>
                        <th>{{ __('general.frontoffice.tech_panel.table.title') }}</th>
                        <th>{{ __('general.frontoffice.tech_panel.table.status') }}</th>
                        <th>{{ __('general.frontoffice.tech_panel.table.priority') }}</th>
                        <th>{{ __('general.frontoffice.tech_panel.table.created_by') }}</th>
                        <th>{{ __('general.frontoffice.tech_panel.table.date') }}</th>
                        <th>{{ __('general.frontoffice.tech_panel.table.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ ucfirst($ticket->status) }}</td>
                            <td>{{ ucfirst($ticket->priority) }}</td>
                            <td>{{ $ticket->user->name ?? __('general.frontoffice.tech_panel.unassigned') }}</td>
                            <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.view.ticket', $ticket->id) }}" class="btn btn-info btn-sm">{{ __('general.frontoffice.tech_panel.view') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
