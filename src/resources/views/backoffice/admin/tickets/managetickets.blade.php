@extends('layouts.admin')

{{-- Se define el título de la página usando la traducción --}}
@section('title', __('general.admin_ticket_manage.page_title'))

@section('admincontent')
<div class="container mt-5">
    <!-- Título del listado de tickets -->
    <h2 class="text-center">{{ __('general.admin_ticket_manage.list_title') }}</h2>
    <div class="d-flex justify-content-end mt-4">
        <!-- Se ha comentado el formulario de logout, por lo que no se requiere traducción -->
    </div>
    <!-- Formulario de filtro -->
    <form method="GET" action="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="mt-4">
        <div class="form-row">
            <div class="col">
                <select name="status" class="form-control">
                    <!-- Opción por defecto para filtrar por estado -->
                    <option value="">{{ __('general.admin_ticket_manage.status_filter') }}</option>
                    <option value="new">{{ __('general.admin_ticket_manage.status_new') }}</option>
                    <option value="in_progress">{{ __('general.admin_ticket_manage.status_in_progress') }}</option>
                    <option value="resolved">{{ __('general.admin_ticket_manage.status_resolved') }}</option>
                    <option value="closed">{{ __('general.admin_ticket_manage.status_closed') }}</option>
                    <option value="cancelled">{{ __('general.admin_ticket_manage.status_cancelled') }}</option>
                </select>
            </div>

            <div class="mt-2"></div>

            <div class="col">
                <select name="priority" class="form-control">
                    <!-- Opción por defecto para filtrar por prioridad -->
                    <option value="">{{ __('general.admin_ticket_manage.priority_filter') }}</option>
                    <option value="low">{{ __('general.admin_ticket_manage.priority_low') }}</option>
                    <option value="medium">{{ __('general.admin_ticket_manage.priority_medium') }}</option>
                    <option value="high">{{ __('general.admin_ticket_manage.priority_high') }}</option>
                    <option value="critical">{{ __('general.admin_ticket_manage.priority_critical') }}</option>
                </select>
            </div>

            <div class="mt-2"></div>

            <div class="col">
                <button type="submit" class="btn btn-primary">
                    {{ __('general.admin_ticket_manage.filter_button') }}
                </button>
            </div>
        </div>
    </form>
    <!-- Tabla de tickets -->
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>{{ __('general.admin_ticket_manage.table_id') }}</th>
                <th>{{ __('general.admin_ticket_manage.table_title') }}</th>
                <th>{{ __('general.admin_ticket_manage.table_status') }}</th>
                <th>{{ __('general.admin_ticket_manage.table_priority') }}</th>
                <th>{{ __('general.admin_ticket_manage.table_type') }}</th>
                <th>{{ __('general.admin_ticket_manage.table_comments') }}</th>
                <th>{{ __('general.admin_ticket_manage.table_assigned_to') }}</th>
                <th style="text-align: center;">{{ __('general.admin_ticket_manage.table_actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->title }}</td>
                <td>{{ ucfirst($ticket->status) }}</td>
                <td>{{ ucfirst($ticket->priority) }}</td>
                <td>{{ ucfirst($ticket->type) }}</td>
                <td>{{ $ticket->comments->count() }}</td>
                <td>{{ $ticket->admin ? $ticket->admin->name : __('general.admin_ticket_manage.sin_asignar') }}</td>
                <td>
                    <div class="text-center">
                        <a href="{{ route('admin.view.ticket', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}" class="btn btn-info btn-sm me-3">
                            {{ __('general.admin_ticket_manage.view_edit') }}
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
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $tickets->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
