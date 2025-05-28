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
                @include('components.notification-card', ['notification' => $notification, 'context' => 'user'])
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
