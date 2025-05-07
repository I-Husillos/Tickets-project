@extends('layouts.admin')

{{-- Se establece el título de la página usando la traducción --}}
@section('title', __('general.admin_users.page_title'))

@section('admincontent')
<div class="container mt-5">
    {{-- Mensajes de sesión (success y error) se mantienen sin traducir, ya que provienen de la lógica --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('general.admin_users.close', 'Cerrar') }}">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-center mb-0">{{ __('general.admin_users.list_title') }}</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success shadow rounded-4">
            <i class="fas fa-user-plus"></i> {{ __('general.admin_users.create_button') }}
        </a>
    </div>

    <div class="card shadow rounded-4">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">{{ __('general.admin_users.registered_users') }}</h3>

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>{{ __('general.admin_users.table_name') }}</th>
                            <th>{{ __('general.admin_users.table_email') }}</th>
                            <th>{{ __('general.admin_users.table_actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="text-center align-middle">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm rounded-4">
                                        <i class="fas fa-edit"></i> {{ __('general.admin_users.edit') }}
                                    </a>
                                    <a href="{{ route('admin.users.confirmDelete', $user->id) }}" class="btn btn-danger btn-sm rounded-4">
                                        <i class="fas fa-trash-alt"></i> {{ __('general.admin_users.delete') }}
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

            <div class="d-flex justify-content-center mt-4">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('admin.manage.dashboard') }}" class="btn btn-secondary rounded-4 shadow">
            <i class="fas fa-arrow-left"></i> {{ __('general.admin_users.back_to_dashboard') }}
        </a>
    </div>
</div>
@endsection
