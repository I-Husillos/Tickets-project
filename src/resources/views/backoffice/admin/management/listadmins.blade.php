@extends('layouts.admin')

@section('title', __('general.admin_admins.page_title'))

@section('admincontent')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('general.admin_admins.close', 'Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-center mb-0">{{ __('general.admin_admins.list_title') }}</h1>
        <a href="{{ route('admin.admins.create', ['locale' => app()->getLocale()]) }}" class="btn btn-primary shadow rounded-4">
            <i class="fas fa-user-shield"></i> {{ __('general.admin_admins.create_button') }}
        </a>
    </div>

    <form method="GET" action="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="mb-4">
        <div class="form-row align-items-center">
            <div class="col-md-4">
                <select name="superadmin" class="form-control">
                    <option value="">{{ __('general.admin_admins.filter_placeholder') }}</option>
                    <option value="1" {{ request('superadmin') === '1' ? 'selected' : '' }}>{{ __('general.admin_admins.option_superadmin') }}</option>
                    <option value="0" {{ request('superadmin') === '0' ? 'selected' : '' }}>{{ __('general.admin_admins.option_regular') }}</option>
                </select>
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary">{{ __('general.admin_admins.filter_button') }}</button>
                <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary">{{ __('general.admin_admins.clear_filter') }}</a>
            </div>
        </div>
    </form>

    <div class="card shadow rounded-4">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">{{ __('general.admin_admins.registered_admins') }}</h3>

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>{{ __('general.admin_admins.table_name') }}</th>
                            <th>{{ __('general.admin_admins.table_email') }}</th>
                            <th>{{ __('general.admin_admins.table_actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                            <tr class="text-center align-middle">
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <a href="{{ route('admin.admins.edit', ['locale' => app()->getLocale(), 'admin' => $admin->id]) }}" class="btn btn-warning btn-sm rounded-4">
                                        <i class="fas fa-edit"></i> {{ __('general.admin_admins.edit') }}
                                    </a>
                                    <a href="{{ route('admin.admins.confirmDelete', ['locale' => app()->getLocale(), 'admin' => $admin->id]) }}" class="btn btn-danger btn-sm rounded-4">
                                        <i class="fas fa-trash-alt"></i> {{ __('general.admin_admins.delete') }}
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

            <div class="d-flex justify-content-center mt-4">
                {{ $admins->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" class="btn btn-secondary rounded-4 shadow">
            <i class="fas fa-arrow-left"></i> {{ __('general.admin_admins.back_to_dashboard') }}
        </a>
    </div>
</div>
@endsection
