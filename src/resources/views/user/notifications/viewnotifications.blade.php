@extends('layouts.user')

@section('title', 'Mis Notificaciones')

@section('content')
@php
$breadcrumbs = [
    ['label' => __('general.home'), 'url' => route('user.dashboard', ['locale' => app()->getLocale()])],
    ['label' => __('frontoffice.notifications_title')]
];
@endphp


<div class="container">

    @if ($notifications->isEmpty())
        <p>No tienes notificaciones.</p>
    @else
    <form method="GET" action="{{ route('user.notifications', ['locale' => app()->getLocale()]) }}" class="mb-4">
        <div class="form-row">
            <div class="col-md-4">
            <select name="type" class="form-control">
                <option value="">-- {{ __('frontoffice.filter_by_type') }} --</option>
                <option value="status" {{ request('type') == 'status' ? 'selected' : '' }}>{{ __('frontoffice.filter_by_change_status') }}</option>
                <option value="comment" {{ request('type') == 'comment' ? 'selected' : '' }}>{{ __('frontoffice.filter_by_add_comment') }}</option>
            </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">{{ __('frontoffice.filter') }}</button>
            </div>
        </div>
    </form>

        <div class="list-group mt-4">
            @foreach ($notifications as $notification)
                <div class="list-group-item list-group-item-action 
                    @if ($notification->read_at) list-group-item-light @else list-group-item-info @endif
                    view-notification-btn" 
                    data-id="{{ $notification->id }}">

                    <!-- Mensaje principal -->
                    <strong>{{ $notification->data['message'] }}</strong><br>

                    <!-- Marcar como leído -->
                    <div class="d-flex justify-content-end align-items-center gap-2" style="gap: 0.5rem;">
                        {{-- Botón Ver --}}
                        <button type="button" 
                                class="btn btn-sm btn-outline-info view-notification-btn" 
                                data-id="{{ $notification->id }}" title="{{ __('Ver detalles') }}">
                            <i class="fas fa-eye"></i>
                        </button>

                        {{-- Marcar como leída o mostrar "Leída" --}}
                        @if (!$notification->read_at)
                            <form action="{{ route('user.notifications.read', ['locale' => app()->getLocale(), 'notification' => $notification->id]) }}" 
                                method="POST" class="mb-0">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-outline-success" title="{{ __('frontoffice.mark_as_read') }}">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            </form>
                        @else
                            <span class="badge badge-success d-flex align-items-center">
                                <i class="fas fa-check mr-1"></i> {{ __('frontoffice.readed') }}
                            </span>
                        @endif
                    </div>


                </div>
            @endforeach
        </div>

        @push('modals')
            @include('components.modals.showNotifications') {{-- sin pasar $notification --}}
        @endpush


        @if ($notifications->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $notifications->links('pagination::bootstrap-4') }}
            </div>
        @endif
    @endif
</div>
@endsection
