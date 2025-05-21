@extends('layouts.admin')

{{-- Se define el título de la página usando la traducción --}}
@section('title', __('general.admin_ticket_manage.page_title'))

@section('admincontent')
<div class="container mt-5">
    <!-- Título del listado de tickets -->
    <h2 class="text-center">{{ __('general.admin_ticket_manage.list_title') }}</h2>
    <div class="d-flex justify-content-end mt-4">
    </div>
    <!-- Formulario de filtro -->
    <!-- <div class="card p-3 shadow-sm rounded-4 mt-4">
        <form method="GET" action="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}">
            <div class="row g-3">
                <div class="col-md-4">
                    status
                </div>
                <div class="col-md-4">
                    priority
                </div>
                <div class="col-md-4 text-end">
                    submit
                </div>
            </div>
        </form>
    </div> -->
    
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning">
                    <i class="fas fa-ticket-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('general.admin_dashboard.total_tickets') }}</span>
                    <span class="info-box-number">100</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success">
                    <i class="fas fa-ticket-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('general.admin_dashboard.resolved_tickets') }}</span>
                    <span class="info-box-number">100</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger">
                    <i class="fas fa-ticket-alt"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('general.admin_dashboard.pending_tickets') }}</span>
                    <span class="info-box-number">100</span>
                </div>
            </div>
        </div>
    </div>


    <form method="GET" action="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="form-inline mt-4">
    <!-- Estado -->
    <div class="form-group mx-sm-2 mb-2">
        <label for="status" class="sr-only">{{ __('general.admin_ticket_manage.status_filter') }}</label>
        <select name="status" id="status" class="form-control form-control-sm">
            <option value="">{{ __('general.admin_ticket_manage.status_filter') }}</option>
            <option value="new">{{ __('general.admin_ticket_manage.status_new') }}</option>
            <option value="in_progress">{{ __('general.admin_ticket_manage.status_in_progress') }}</option>
            <option value="resolved">{{ __('general.admin_ticket_manage.status_resolved') }}</option>
            <option value="closed">{{ __('general.admin_ticket_manage.status_closed') }}</option>
            <option value="cancelled">{{ __('general.admin_ticket_manage.status_cancelled') }}</option>
        </select>
    </div>

    <!-- Prioridad -->
    <div class="form-group mx-sm-2 mb-2">
        <label for="priority" class="sr-only">{{ __('general.admin_ticket_manage.priority_filter') }}</label>
        <select name="priority" id="priority" class="form-control form-control-sm">
            <option value="">{{ __('general.admin_ticket_manage.priority_filter') }}</option>
            <option value="low">{{ __('general.admin_ticket_manage.priority_low') }}</option>
            <option value="medium">{{ __('general.admin_ticket_manage.priority_medium') }}</option>
            <option value="high">{{ __('general.admin_ticket_manage.priority_high') }}</option>
            <option value="critical">{{ __('general.admin_ticket_manage.priority_critical') }}</option>
        </select>
    </div>

    <!-- Botones -->
    <div class="form-group mx-sm-2 mb-2">
        <button type="submit" class="btn btn-sm btn-primary">
            {{ __('general.admin_ticket_manage.filter_button') }}
        </button>
    </div>

    <div class="form-group mx-sm-2 mb-2">
        <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="btn btn-sm btn-secondary">
            {{ __('general.admin_admins.clear_filter') }}
        </a>
    </div>
</form>
    <p class="text-muted text-end">
        {{ __('general.admin_ticket_manage.showing_results', ['count' => $tickets->total()]) }}
    </p>

    <div class="table-responsive">
            <!-- Tabla de tickets -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th><i class="fas fa-heading"></i> {{ __('general.admin_ticket_manage.table_title') }}</th>
                            <th><i class="fas fa-info-circle"></i> {{ __('general.admin_ticket_manage.table_status') }}</th>
                            <th><i class="fas fa-flag"></i> {{ __('general.admin_ticket_manage.table_priority') }}</th>
                            <th><i class="fas fa-tag"></i> {{ __('general.admin_ticket_manage.table_type') }}</th>
                            <th><i class="fas fa-comments"></i> {{ __('general.admin_ticket_manage.table_comments') }}</th>
                            <th><i class="fas fa-user-cog"></i> {{ __('general.admin_ticket_manage.table_assigned_to') }}</th>
                            <th class="text-center"><i class="fas fa-tools"></i> {{ __('general.admin_ticket_manage.table_actions') }}</th>
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
            </div>
        </div>
    
    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $tickets->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
