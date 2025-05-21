@extends('layouts.admin')

@section('title', __('general.admin_admins.page_title'))

@section('admincontent')
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


    {{-- Filtro elegante con AdminLTE style --}}
    <div class="card card-outline card-secondary shadow rounded-4 mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-filter"></i> {{ __('general.admin_admins.advanced_search') }}
            </h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="row g-3 align-items-end">
                {{-- Buscar por nombre --}}
                <div class="col-md-5">
                    <label for="search" class="form-label">{{ __('general.admin_admins.search_label') }}</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fas fa-search"></i></span>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="form-control" placeholder="{{ __('general.admin_admins.search_placeholder') }}">
                    </div>
                </div>

                {{-- Filtro por tipo --}}
                <div class="col-md-3">
                    <label for="superadmin" class="form-label">{{ __('general.admin_admins.filter_label') }}</label>
                    <select name="superadmin" id="superadmin" class="form-select">
                        <option value="">{{ __('general.admin_admins.filter_placeholder') }}</option>
                        <option value="1" {{ request('superadmin') === '1' ? 'selected' : '' }}>{{ __('general.admin_admins.option_superadmin') }}</option>
                        <option value="0" {{ request('superadmin') === '0' ? 'selected' : '' }}>{{ __('general.admin_admins.option_regular') }}</option>
                    </select>
                </div>

                {{-- Botones --}}
                <div class="col-md-24d-flex gap-2">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-filter"></i> {{ __('general.admin_admins.filter_button') }}
                    </button>
                    <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}"
                    class="btn btn-secondary">
                        <i class="fas fa-times-circle"></i> {{ __('general.admin_admins.clear_filter') }}
                    </a>
                </div>
            </form>
        </div>
        
</div>



    {{-- Resultados --}}
    <p class="text-muted text-end">
        {{ __('general.admin_admins.showing_results', ['count' => $admins->total()]) }}
    </p>

    {{-- Tabla de admins con estilo AdminLTE --}}
<div class="card card-outline card-primary shadow rounded-4">
    <div class="card-header bg-light">
        <h3 class="card-title">
            <i class="fas fa-users"></i> {{ __('general.admin_admins.registered_admins') }}
        </h3>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered mb-0">
                <thead class="thead-light text-center">
                    <tr>
                        <th><i class="fas fa-user"></i> {{ __('general.admin_admins.table_name') }}</th>
                        <th><i class="fas fa-envelope"></i> {{ __('general.admin_admins.table_email') }}</th>
                        <th><i class="fas fa-tools"></i> {{ __('general.admin_admins.table_actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr class="text-center align-middle">
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <a href="{{ route('admin.admins.edit', ['locale' => app()->getLocale(), 'admin' => $admin->id]) }}"
                                   class="btn btn-sm btn-warning rounded-circle shadow"
                                   data-toggle="tooltip" title="{{ __('general.admin_admins.edit') }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.admins.confirmDelete', ['locale' => app()->getLocale(), 'admin' => $admin->id]) }}"
                                   class="btn btn-sm btn-danger rounded-circle shadow"
                                   data-toggle="tooltip" title="{{ __('general.admin_admins.delete') }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">{{ __('general.admin_admins.no_admins') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Paginación elegante --}}
    <div class="card-footer d-flex justify-content-center bg-light">
        {{ $admins->links('pagination::bootstrap-4') }}
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
