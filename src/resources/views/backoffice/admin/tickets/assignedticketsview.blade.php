@extends('layouts.admin')

{{-- Título de la página utilizando la traducción --}}
@section('title', __('general.admin_assigned_tickets.page_title'))

@section('admincontent')

<div class="container mt-5">
    <!-- Encabezado principal -->
    <h1 class="text-center mb-4">{{ __('general.admin_assigned_tickets.title') }}</h1>
    
    <!-- Formulario de filtrado -->
    <form method="GET" action="{{ route('admin.show.assigned.tickets') }}" class="mt-4">
        <div class="form-row">
            <div class="col">
                <select name="status" class="form-control">
                    <!-- La opción por defecto y cada opción se obtienen de las traducciones -->
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
            <div class="col mt-2">
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
            <div class="col mt-2">
                <!-- Botón de filtrado -->
                <button type="submit" class="btn btn-primary">
                    {{ __('general.admin_assigned_tickets.filter_button') }}
                </button>
            </div>
        </div>
    </form>

    <!-- Tabla de Tickets Asignados -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>{{ __('general.admin_assigned_tickets.table_id') }}</th>
                <th>{{ __('general.admin_assigned_tickets.table_title') }}</th>
                <th>{{ __('general.admin_assigned_tickets.table_description') }}</th>
                <th>{{ __('general.admin_assigned_tickets.table_status') }}</th>
                <th>{{ __('general.admin_assigned_tickets.table_priority') }}</th>
                <th>{{ __('general.admin_assigned_tickets.table_type') }}</th>
                <th>{{ __('general.admin_assigned_tickets.table_comments') }}</th>
                <th style="text-align: center;">{{ __('general.admin_assigned_tickets.table_actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assignedTickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ ucfirst($ticket->priority) }}</td>
                    <td>{{ ucfirst($ticket->type) }}</td>
                    <td>{{ $ticket->comments->count() }}</td>
                    <td>
                        <!-- Botón para ver y editar -->
                        <a href="{{ route('admin.view.ticket', $ticket->id) }}" class="btn btn-info btn-sm">
                            {{ __('general.admin_assigned_tickets.view_edit') }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $assignedTickets->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection
