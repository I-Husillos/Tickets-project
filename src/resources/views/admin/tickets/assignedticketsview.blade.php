@extends('layouts.admin')

@section('title', __('general.admin_assigned_tickets.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_assigned_tickets.page_title'), 'url' => route('admin.manage.tickets', ['locale' => app()->getLocale()])],
    ];
@endphp


<div class="container-fluid mt-3">
    <div class="card shadow">
        <!-- Encabezado -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">{{ __('general.admin_assigned_tickets.title') }}</h3>
        </div>

        <!-- Filtros -->
        <div class="card-body pt-3 pb-0">
            <form method="GET" action="{{ route('admin.show.assigned.tickets', ['locale' => app()->getLocale()]) }}">
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <select name="status" class="form-control">
                            <option value="">{{ __('general.admin_assigned_tickets.status_filter') }}</option>
                            <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.status_new') }}
                            </option>
                            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.status_in_progress') }}
                            </option>
                            <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.status_resolved') }}
                            </option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.status_closed') }}
                            </option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.status_cancelled') }}
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-2">
                        <select name="priority" class="form-control">
                            <option value="">{{ __('general.admin_assigned_tickets.priority_filter') }}</option>
                            <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.priority_low') }}
                            </option>
                            <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.priority_medium') }}
                            </option>
                            <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.priority_high') }}
                            </option>
                            <option value="critical" {{ request('priority') == 'critical' ? 'selected' : '' }}>
                                {{ __('general.admin_assigned_tickets.priority_critical') }}
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-2">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-filter"></i> {{ __('general.admin_assigned_tickets.filter_button') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tabla -->
        <div class="card-body pt-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>{{ __('general.admin_assigned_tickets.table_title') }}</th>
                            <th>{{ __('general.admin_assigned_tickets.table_description') }}</th>
                            <th>{{ __('general.admin_assigned_tickets.table_status') }}</th>
                            <th>{{ __('general.admin_assigned_tickets.table_priority') }}</th>
                            <th>{{ __('general.admin_assigned_tickets.table_type') }}</th>
                            <th>{{ __('general.admin_assigned_tickets.table_comments') }}</th>
                            <th class="text-center">{{ __('general.admin_assigned_tickets.table_actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($assignedTickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ Str::limit($ticket->description, 50) }}</td>
                                <td>
                                    <span class="badge badge-{{ $ticket->status == 'new' ? 'primary' : ($ticket->status == 'resolved' ? 'success' : ($ticket->status == 'closed' ? 'secondary' : 'warning')) }}">
                                        {{ __('general.statuses.' . $ticket->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $ticket->priority == 'critical' ? 'danger' : ($ticket->priority == 'high' ? 'warning' : ($ticket->priority == 'medium' ? 'info' : 'secondary')) }}">
                                        {{ __('general.priorities.' . $ticket->priority) }}
                                    </span>
                                </td>
                                <td>{{ ucfirst($ticket->type) }}</td>
                                <td><span class="badge badge-info">{{ $ticket->comments->count() }}</span></td>
                                <td class="text-center">
                                    <a href="{{ route('admin.view.ticket', ['locale' => app()->getLocale(), 'ticket' => $ticket->id]) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if ($ticket->status === 'closed')
                                        <form method="POST" action="{{ route('admin.reopen.ticket', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                {{ __('general.admin_ticket_manage.reopen_ticket') }}
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.close.ticket', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                {{ __('general.admin_ticket_manage.close_ticket') }}
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">{{ __('general.no_results_found') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginación -->
        @if ($assignedTickets->hasPages())
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $assignedTickets->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @endif
    </div>
</div>
@endsection


