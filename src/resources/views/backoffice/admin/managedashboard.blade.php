@extends('layouts.frontoffice')

@section('title', 'Gestión de Usuarios y Administradores')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Gestión de Usuarios y Administradores</h1>

    <h3>Usuarios</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">No hay usuarios registrados.</td></tr>
            @endforelse
        </tbody>
    </table>

    <h3 class="mt-5">Administradores</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">No hay administradores registrados.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Volver al Panel</a>
    </div>
</div>
@endsection
