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

<div class="container mt-5">
    <h2 class="text-center">{{ __('general.admin_notifications.header') }}</h2>

    @if ($notifications->isEmpty())
        <p class="text-center">{{ __('general.admin_notifications.no_notifications') }}</p>
    @else
        
        {{-- Lista de notificaciones --}}
        <div class="list-group">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="tabla-notificaciones-admin"
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
    @endif


@push('modals')
    @include('components.modals.admin_notifications') {{-- sin pasar $notification --}}
@endpush
</div>

@endsection

