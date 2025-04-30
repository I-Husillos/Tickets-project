@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

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
        <h1 class="text-center mb-0">Lista de Usuarios</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success shadow rounded-4">
            <i class="fas fa-user-plus"></i> Crear Nuevo Usuario
        </a>
    </div>

    <div class="card shadow rounded-4">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Usuarios Registrados</h3>

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
                        @forelse($users as $user)
                            <tr class="text-center align-middle">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm rounded-4">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('admin.users.confirmDelete', $user->id) }}" class="btn btn-danger btn-sm rounded-4">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No hay usuarios registrados.</td>
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
            <i class="fas fa-arrow-left"></i> Volver al Panel de Control
        </a>
    </div>
</div>
@endsection
