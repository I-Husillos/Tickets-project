@extends('layouts.admin')

@section('title', 'Gestión de Usuarios y Administradores')

@section('admincontent')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1 class="text-center mb-4">Lista de Usuarios</h1>

    <h3>Usuarios</h3>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.confirmDelete', $user->id) }}" class="btn btn-danger btn-sm">
                            Eliminar
                        </a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay usuarios registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Volver a la lista de Usuarios</a>
    </div>
</div>
@endsection
