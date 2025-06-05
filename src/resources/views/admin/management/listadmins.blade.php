@extends('layouts.admin')

@section('title', __('general.admin_admins.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_admins.page_title')]
    ];
@endphp
<!-- <ol class="breadcrumb">
  <li><a href="/dashboard"></i> Home</a></li>
  <li class="active">Task Phases</li>
</ol> -->

<div class="container mt-5">

    {{-- Alertas de éxito o error --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Título y botón de crear --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="fas fa-user-shield"></i> {{ __('general.admin_admins.list_title') }}
        </h1>
        <a href="{{ route('admin.admins.create', ['locale' => app()->getLocale()]) }}" class="btn btn-primary shadow rounded-4">
            <i class="fas fa-user-plus"></i> {{ __('general.admin_admins.create_button') }}
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
        <table id="tabla-admins"
            class="table table-hover table-striped table-bordered mb-0 dt-responsive nowrap"
            data-api-url="{{ url('/api/admin/admins') }}"
            data-locale="{{ app()->getLocale() }}">
            <thead class="text-center bg-white font-weight-bold">
                <tr>
                    <th><i class="fas fa-user-shield"></i> {{ __('general.admin_admins.table_name') }}</th>
                    <th><i class="fas fa-envelope"></i> {{ __('general.admin_admins.table_email') }}</th>
                    <th><i class="fas fa-tools"></i> {{ __('general.admin_admins.table_actions') }}</th>
                </tr>
            </thead>
        </table>

        </div>
    </div>



    <!-- {{-- Botón volver --}}
    <div class="mt-4 text-center">
        <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary rounded-4 shadow">
            <i class="fas fa-arrow-left"></i> {{ __('general.admin_admins.back_to_dashboard') }}
        </a>
    </div> -->
</div>
@endsection
