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
    <!-- Encabezado principal -->
    <h1 class="text-center mb-4">{{ __('general.admin_history_events.heading') }}</h1>

    <!-- Formulario de filtrado de eventos -->
    <form method="GET" action="{{ route('admin.history.events', ['locale' => app()->getLocale()]) }}">
        <div class="row">
            <div class="col-md-4">
                <label for="event_type">{{ __('general.admin_history_events.filter.label_event_type') }}</label>
                <input type="text" name="event_type" class="form-control" value="{{ request()->event_type }}">
            </div>
            <div class="col-md-4">
                <label for="date">{{ __('general.admin_history_events.filter.label_date') }}</label>
                <input type="date" name="date" class="form-control" value="{{ request()->date }}">
            </div>
            <div class="col-md-4">
                <label for="user">{{ __('general.admin_history_events.filter.label_user') }}</label>
                <input type="text" name="user" class="form-control" value="{{ request()->user }}">
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">{{ __('general.admin_history_events.filter.filter_button') }}</button>
            </div>
        </div>
    </form>

    <!-- Tabla para mostrar los eventos -->
    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('general.admin_history_events.table.header_event_type') }}</th>
                    <th>{{ __('general.admin_history_events.table.header_description') }}</th>
                    <th>{{ __('general.admin_history_events.table.header_user') }}</th>
                    <th>{{ __('general.admin_history_events.table.header_date') }}</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($events) && $events->count())
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->event_type }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->user }}</td>
                            <td>{{ $event->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">{{ __('general.admin_history_events.table.no_events') }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $events->links('pagination::bootstrap-4') }}
    </div>

    <!-- Botón para regresar al Panel de Control -->
    <!-- <div class="mt-4">
        <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_history_events.back_button') }}</a>
    </div> -->
</div>
@endsection
