@extends('layouts.admin')

@section('title', __('general.admin_history_events.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_history_events.page_title')]
    ];
@endphp


<div class="container mt-5">
    <!-- Tabla para mostrar los eventos -->
    <div class="table-responsive mt-4">
        <table id="tabla-eventos"
            class="table table-striped table-bordered text-center"
            data-api-url="{{ url('/api/admin/historyEvents') }}"
            data-locale="{{ app()->getLocale() }}">
            <thead class="text-center bg-white font-weight-bold">
                <tr>
                    <th>{{ __('general.admin_history_events.table.header_event_type') }}</th>
                    <th>{{ __('general.admin_history_events.table.header_description') }}</th>
                    <th>{{ __('general.admin_history_events.table.header_user') }}</th>
                    <th>{{ __('general.admin_history_events.table.header_date') }}</th>
                </tr>
            </thead>
        </table>

    </div>

    <!-- Botón para regresar al Panel de Control -->
    <!-- <div class="mt-4">
        <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_history_events.back_button') }}</a>
    </div> -->
</div>
@endsection
