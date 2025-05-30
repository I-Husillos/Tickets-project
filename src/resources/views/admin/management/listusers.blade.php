@extends('layouts.admin')

@section('title', __('general.admin_users.page_title'))

@section('admincontent')
@php
    $breadcrumbs = [
        ['label' => __('general.home'), 'url' => route('admin.dashboard', ['locale' => app()->getLocale()])],
        ['label' => __('general.admin_users.page_title')]
    ];
@endphp
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

    {{-- Título + Botón crear usuario --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="fas fa-users-cog"></i> {{ __('general.admin_users.list_title') }}
        </h1>
        <a href="{{ route('admin.users.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success shadow rounded-4">
            <i class="fas fa-user-plus"></i> {{ __('general.admin_users.create_button') }}
        </a>
    </div>
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table id="tabla-usuarios"
                class="table table-hover table-striped table-bordered mb-0" 
                data-api-url="{{ url('/api/admin/users') }}"
                data-locale="{{ app()->getLocale() }}">

                <thead class="thead-dark text-center">
                    <tr>
                        <th>{{ __('general.admin_users.table_name') }}</th>
                        <th>{{ __('general.admin_users.table_email') }}</th>
                        <th>{{ __('general.admin_users.table_actions') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection


