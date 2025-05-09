@extends('layouts.admin')

{{-- Se establece el título de la página usando la traducción --}}
@section('title', __('general.admin_ticket_details.page_title'))

@section('admincontent')
<div class="container mt-5">
    <!-- Título dinámico del ticket con parámetro -->
    <h2>{{ __('general.admin_ticket_details.ticket_details', ['ticket_id' => $ticket->id]) }}</h2>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group mt-4">
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.title_label') }}</strong> {{ $ticket->title }}
                </li>
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.description_label') }}</strong> {{ $ticket->description }}
                </li>
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.status_label') }}</strong> {{ ucfirst($ticket->status) }}
                </li>
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.priority_label') }}</strong> {{ ucfirst($ticket->priority) }}
                </li>
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.type_label') }}</strong> {{ ucfirst($ticket->type) }}
                </li>
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.assigned_to_label') }}</strong>
                    {{ $ticket->admin ? $ticket->admin->name : __('general.admin_ticket_details.sin_asignar') }}
                </li>
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.created_at_label') }}</strong> {{ $ticket->created_at->format('d/m/Y') }}
                </li>
                <li class="list-group-item">
                    <strong>{{ __('general.admin_ticket_details.updated_at_label') }}</strong> {{ $ticket->updated_at->format('d/m/Y') }}
                </li>
            </ul>
        </div>
        @can('update', $ticket)
        <div class="col-md-6">
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

                @if (Auth::guard('admin')->user()->superadmin)
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

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('general.admin_ticket_details.save_changes') }}
                    </button>
                </div>
            </form>
        </div>
        @endcan

        <div class="form-group mt-4">
            <!-- Sección de Comentarios -->
            <h4>{{ __('general.admin_ticket_details.comments') }}</h4>
            @if ($ticket->comments->isEmpty())
                <p class="text-muted">{{ __('general.admin_ticket_details.no_comments') }}</p>
            @else
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('general.admin_ticket_details.author') }}</th>
                            <th>{{ __('general.admin_ticket_details.message') }}</th>
                            <th>{{ __('general.admin_ticket_details.date') }}</th>
                            <th>{{ __('general.admin_ticket_details.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ticket->comments as $comment)
                            <tr>
                                <td>{{ $comment->author->name }}</td>
                                <td>{{ $comment->message }}</td>
                                <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    {{-- Botón para eliminar comentario --}}
                                    @can('delete', $comment)
                                        <form method="POST" action="{{ route('admin.delete.comment', ['comment' => $comment->id, 'locale' => app()->getLocale()]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                {{ __('general.admin_ticket_details.delete') }}
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            @can('comment', $ticket)
            <div class="form-group">
                <h5>{{ __('general.admin_ticket_details.add_comment_heading') }}</h5>
                <form method="POST" action="{{ route('admin.add.comment', ['ticket' => $ticket->id, 'locale' => app()->getLocale()]) }}">
                    @csrf
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="4"
                                  placeholder="{{ __('general.admin_ticket_details.comment_placeholder') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        {{ __('general.admin_ticket_details.add_comment') }}
                    </button>
                </form>
            </div>
            @endcan
        </div>

        <div class="text-center mt-5">
            @if(Auth::guard('admin')->user()->superadmin)
                <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                    {{ __('general.admin_ticket_details.back_to_menu') }}
                </a>
            @else
                <a href="{{ route('admin.show.assigned.tickets', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">
                    {{ __('general.admin_ticket_details.back_to_menu') }}
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
