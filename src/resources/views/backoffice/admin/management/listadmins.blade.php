@extends('layouts.admin')

@section('title', 'Gestión de Administradores')

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
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-center mb-0">Lista de Administradores</h1>
        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary shadow rounded-4">
            <i class="fas fa-user-shield"></i> Crear Nuevo Administrador
        </a>
    </div>

    <form method="GET" action="{{ route('admin.dashboard.list.admins') }}" class="mb-4">
        <div class="form-row align-items-center">
            <div class="col-md-4">
                <select name="superadmin" class="form-control">
                    <option value="">-- Filtrar por rol --</option>
                    <option value="1" {{ request('superadmin') === '1' ? 'selected' : '' }}>Superadministradores</option>
                    <option value="0" {{ request('superadmin') === '0' ? 'selected' : '' }}>Administradores normales</option>
                </select>
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <a href="{{ route('admin.dashboard.list.admins') }}" class="btn btn-secondary">Limpiar filtro</a>
            </div>

        </div>
    </form>


    <div class="card shadow rounded-4">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Administradores Registrados</h3>

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                            <tr class="text-center align-middle">
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-warning btn-sm rounded-4">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('admin.admins.confirmDelete', $admin->id) }}" class="btn btn-danger btn-sm rounded-4">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No hay administradores registrados.</td>
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
        <a href="{{ route('admin.manage.dashboard') }}" class="btn btn-secondary rounded-4 shadow">
            <i class="fas fa-arrow-left"></i> Volver al Panel de Control
        </a>
    </div>
</div>
@endsection
