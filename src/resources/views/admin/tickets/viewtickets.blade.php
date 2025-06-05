@extends('layouts.admin')

@section('title', __('general.admin_ticket_details.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_ticket_manage.page_title'), 'url' => route('admin.manage.tickets', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_ticket_details.page_title')]
    ];
@endphp


<div class="container-fluid mt-4">

    <div class="row">
        <!-- DATOS DEL TICKET -->
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        {{ __('general.admin_ticket_details.ticket_details', ['ticket_id' => $ticket->id]) }}
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.title_label') }}:</b> {{ $ticket->title }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.description_label') }}:</b><br> {{ $ticket->description }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.status_label') }}:</b> {{ ucfirst($ticket->status) }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.priority_label') }}:</b> {{ ucfirst($ticket->priority) }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.type_label') }}:</b> {{ ucfirst($ticket->type) }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.assigned_to_label') }}:</b>
                            {{ $ticket->admin ? $ticket->admin->name : __('general.admin_ticket_details.sin_asignar') }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.created_at_label') }}:</b> {{ $ticket->created_at->format('d/m/Y') }}
                        </li>
                        <li class="list-group-item">
                            <b>{{ __('general.admin_ticket_details.updated_at_label') }}:</b> {{ $ticket->updated_at->format('d/m/Y') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- FORMULARIO Y COMENTARIOS -->
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#edit" data-toggle="tab">{{ __('general.admin_ticket_details.edit_ticket') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#comments" data-toggle="tab">{{ __('general.admin_ticket_details.comments') }}</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">

                        <!-- TAB: Editar ticket -->
                        <div class="active tab-pane" id="edit">
                            @can('update', $ticket)
                            <form action="{{ route('admin.update.ticket', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="status">{{ __('general.admin_ticket_details.status_label') }}</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">{{ __('general.admin_ticket_details.select_option') }}</option>
                                        @foreach(['new', 'in_progress', 'pending', 'resolved', 'closed'] as $status)
                                            <option value="{{ $status }}" {{ $ticket->status == $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="priority">{{ __('general.admin_ticket_details.priority_label') }}</label>
                                    <select name="priority" id="priority" class="form-control">
                                        <option value="">{{ __('general.admin_ticket_details.select_option') }}</option>
                                        @foreach(['low', 'medium', 'high', 'critical'] as $priority)
                                            <option value="{{ $priority }}" {{ $ticket->priority == $priority ? 'selected' : '' }}>
                                                {{ ucfirst($priority) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type">{{ __('general.admin_ticket_details.type_label') }}</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="">{{ __('general.admin_ticket_details.select_option') }}</option>
                                        @foreach($ticketTypes as $type)
                                            <option value="{{ $type->name }}" {{ $ticket->type == $type->name ? 'selected' : '' }}>
                                                {{ ucfirst($type->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @if(Auth::guard('admin')->user()->superadmin)
                                <div class="form-group">
                                    <label for="assigned_to">{{ __('general.admin_ticket_details.assigned_to_label') }}</label>
                                    <select name="assigned_to" id="assigned_to" class="form-control">
                                        <option value="">{{ __('general.admin_ticket_details.sin_asignar') }}</option>
                                        @foreach($admins as $admin)
                                            <option value="{{ $admin->id }}" {{ $ticket->admin_id == $admin->id ? 'selected' : '' }}>
                                                {{ $admin->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> {{ __('general.admin_ticket_details.save_changes') }}
                                    </button>
                                </div>
                            </form>
                            @endcan
                        </div>

                        <!-- TAB: Comentarios -->
                        <div class="tab-pane" id="comments">
                            <h5>{{ __('general.admin_ticket_details.comments') }}</h5>

                            @if($ticket->comments->isEmpty())
                                <p class="text-muted">{{ __('general.admin_ticket_details.no_comments') }}</p>
                            @else
                            <div class="table-responsive">
                                <table 
                                    id="tabla-comentarios"
                                    class="table table-hover table-striped table-bordered dt-responsive nowrap"
                                    data-api-url="{{ url('/api/admin/tickets/' . $ticket->id . '/comments') }}"
                                    data-locale="{{ app()->getLocale() }}">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>{{ __('general.admin_ticket_details.author') }}</th>
                                            <th>{{ __('general.admin_ticket_details.message') }}</th>
                                            <th>{{ __('general.admin_ticket_details.date') }}</th>
                                            <th>{{ __('general.admin_ticket_details.actions') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            @endif

                            @can('comment', $ticket)
                            <form method="POST" action="{{ route('admin.comments.add', ['locale' => app()->getLocale(), 'ticket' => $ticket]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="message">{{ __('general.admin_ticket_details.add_comment_heading') }}</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="{{ __('general.admin_ticket_details.comment_placeholder') }}"></textarea>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    <i class="fas fa-comment"></i> {{ __('general.admin_ticket_details.add_comment') }}
                                </button>
                            </form>
                            @endcan
                        </div>

                    </div>
                </div>
            </div>

            <!-- Botón de volver -->
            <!-- <div class="text-center">
                <a href="{{ Auth::guard('admin')->user()->superadmin 
                            ? route('admin.manage.tickets', ['locale' => app()->getLocale()])
                            : route('admin.show.assigned.tickets', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> {{ __('general.admin_ticket_details.back_to_menu') }}
                </a>
            </div> -->
        </div>
    </div>
</div>
@endsection
