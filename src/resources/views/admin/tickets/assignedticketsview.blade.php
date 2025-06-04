@extends('layouts.admin')

@section('title', __('general.admin_assigned_tickets.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_assigned_tickets.page_title'), 'url' => route('admin.manage.tickets', ['locale' => app()->getLocale()])],
    ];
@endphp


<!-- Tabla -->
<div class="card-body pt-0">
    <div class="table-responsive">
        <table id="tabla-tickets-asignados"
            class="table table-hover table-striped table-bordered text-center"
            data-api-url="{{ url('/api/admin/assigned-tickets') }}"
            data-locale="{{ app()->getLocale() }}">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>{{ __('Título') }}</th>
                    <th>{{ __('Descripción') }}</th>
                    <th>{{ __('Estado') }}</th>
                    <th>{{ __('Prioridad') }}</th>
                    <th>{{ __('Tipo') }}</th>
                    <th>{{ __('Comentarios') }}</th>
                    <th>{{ __('Acciones') }}</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection


