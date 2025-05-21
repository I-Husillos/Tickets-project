@extends('layouts.admin')

@section('title', __('general.admin_users.page_title'))

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

    {{-- Título + Botón crear usuario --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">
            <i class="fas fa-users-cog"></i> {{ __('general.admin_users.list_title') }}
        </h1>
        <a href="{{ route('admin.users.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success shadow rounded-4">
            <i class="fas fa-user-plus"></i> {{ __('general.admin_users.create_button') }}
        </a>
    </div>

    {{-- Filtro de busqueda --}}
    <form method="GET" action="{{ route('admin.filter.users', ['locale' => app()->getLocale()]) }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control rounded-start-4" placeholder="{{ __('general.admin_users.search_placeholder') }}">
            <button class="btn btn-outline-primary rounded-end-4" type="submit">
                <i class="fas fa-search"></i> {{ __('general.admin_users.search_button') }}
            </button>
            <div class="col-md-auto">
                <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_admins.clear_filter') }}</a>
            </div>
        </div>
    </form>

    <p class="text-muted text-end">
        {{ __('general.admin_users.showing_results', ['count' => $users->total()]) }}
    </p>


    {{-- Tarjeta con tabla --}}
    <div class="card card-outline card-primary shadow rounded-4">
        <div class="card-header bg-light">
            <h3 class="card-title">
                <i class="fas fa-address-book"></i> {{ __('general.admin_users.registered_users') }}
            </h3>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered mb-0">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th><i class="fas fa-user"></i> {{ __('general.admin_users.table_name') }}</th>
                            <th><i class="fas fa-envelope"></i> {{ __('general.admin_users.table_email') }}</th>
                            <th><i class="fas fa-tools"></i> {{ __('general.admin_users.table_actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="text-center align-middle">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'user' => $user->id]) }}"
                                       class="btn btn-sm btn-warning rounded-circle shadow"
                                       data-toggle="tooltip" title="{{ __('general.admin_users.edit') }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.users.confirmDelete', ['locale' => app()->getLocale(), 'user' => $user->id]) }}"
                                       class="btn btn-sm btn-danger rounded-circle shadow"
                                       data-toggle="tooltip" title="{{ __('general.admin_users.delete') }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">{{ __('general.admin_users.no_users') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Paginación elegante --}}
        <div class="card-footer d-flex justify-content-center bg-light">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- {{-- Botón volver --}}
    <div class="mt-4 text-center">
        <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary rounded-4 shadow">
            <i class="fas fa-arrow-left"></i> {{ __('general.admin_users.back_to_dashboard') }}
        </a>
    </div> -->
</div>
@endsection
