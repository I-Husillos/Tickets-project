@extends('layouts.admin')

{{-- Se establece el título de la página mediante la traducción --}}
@section('title', __('general.admin_notifications.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_notifications.page_title')]
    ];
@endphp

<script>
    window.notificationRoute = "{{ route('admin.notifications.show', ['locale' => app()->getLocale(), 'notification' => ':id']) }}";
</script>

<div class="container mt-5">
    <h2 class="text-center">{{ __('general.admin_notifications.header') }}</h2>

    @if ($notifications->isEmpty())
        <p class="text-center">{{ __('general.admin_notifications.no_notifications') }}</p>
    @else
        {{-- Filtro por tipo --}}
        <form method="GET" action="{{ route('admin.notifications', app()->getLocale()) }}" class="mb-4">
            <div class="form-row">
                <div class="col-md-4">
                    <select name="type" class="form-control">
                        <option value="">{{ __('general.admin_notifications.filter_placeholder') }}</option>
                        <option value="ticket" {{ request('type') == 'ticket' ? 'selected' : '' }}>
                            {{ __('general.admin_notifications.option_ticket') }}
                        </option>
                        <option value="comment" {{ request('type') == 'comment' ? 'selected' : '' }}>
                            {{ __('general.admin_notifications.option_comment') }}
                        </option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('general.admin_notifications.filter_button') }}
                    </button>
                </div>
            </div>
        </form>

        {{-- Lista de notificaciones --}}
        <div class="list-group">
            @foreach ($notifications as $notification)
                @include('components.notification-card', ['notification' => $notification])
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $notifications->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>
<!-- Modal donde se van a mostrar los detalles de la notificación -->
<div id="notificationModal" class="modal fade" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Detalles de la notificación</h5>
            </div>
            <div class="modal-body">
                <div id="notificationDetails">
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



    <!-- <div class="list-group mt-4">
        @foreach ($notifications as $notification)
            <a href="{{ route('admin.view.ticket', ['locale' => app()->getLocale(), 'ticket' => $notification->data['ticket_id']]) }}" class="list-group-item list-group-item-action
                @if ($notification->read_at) 
                    list-group-item-secondary 
                @else
                    list-group-item-primary 
                @endif"
            >
                <strong>{{ $notification->data['message'] }}</strong><br>

                Si existe el estado en la data de la notificación
                @isset($notification->data['status'])
                    <p>
                        <strong>{{ __('general.admin_notifications.status_label') }}</strong>
                        {{ ucfirst($notification->data['status']) }}
                    </p>
                @endisset

                Si existe un autor
                @isset($notification->data['author'])
                    <p>
                        <strong>{{ __('general.admin_notifications.author_label') }}</strong>
                        {{ $notification->data['author'] }}
                    </p>
                @endisset

                Si existe un comentario
                @isset($notification->data['comment'])
                    <p>
                        <strong>{{ __('general.admin_notifications.comment_label') }}</strong>
                        "{{ $notification->data['comment'] }}"
                    </p>
                @endisset

                <small>{{ $notification->created_at->format('d/m/Y H:i') }}</small>

                @if (!$notification->read_at)
                    <form action="{{ route('admin.notifications.read', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-outline-secondary float-right">
                            {{ __('general.admin_notifications.mark_as_read') }}
                        </button>
                    </form>
                @endif
            </a>
        @endforeach
    </div> -->