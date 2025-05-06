@extends('layouts.admin')

@section('title', 'Editar Usuario')

@section('admincontent')
<div class="container mt-5">
    <h2>Editar Usuario</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nueva contraseña (opcional)</label>
            <input type="password" class="form-control" name="password">
            <small class="text-muted">Déjalo en blanco si no deseas cambiar la contraseña.</small>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
                <input type="password" class="form-control" name="password_confirmation">
                <small class="text-muted">Si has ingresado una nueva contraseña, confírmala aquí.</small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.dashboard.list.users') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
