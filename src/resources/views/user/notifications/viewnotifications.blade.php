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

        <div class="list-group mt-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="tabla-notificaciones-usuario"
                        class="table table-bordered table-hover mb-0 dt-responsive nowrap"
                        data-api-url="{{ url('/api/user/notifications') }}"
                        data-locale="{{ app()->getLocale() }}">
                        <thead class="text-center bg-white font-weight-bold">
                            <tr>
                                <th>{{ __('Tipo') }}</th>
                                <th>{{ __('Contenido') }}</th>
                                <th>{{ __('Fecha') }}</th>
                                <th>{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    
        @push('modals')
            @include('components.modals.showNotifications', [
                'notifications' => $notifications,
                'guard' => 'user'
            ])
        @endpush


        @if ($notifications->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $notifications->links('pagination::bootstrap-4') }}
            </div>
        @endif
    @endif
</div>
@endsection
