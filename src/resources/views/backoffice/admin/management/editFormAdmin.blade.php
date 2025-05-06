@extends('layouts.admin')

@section('title', 'Editar Administrador')

@section('admincontent')
<div class="container mt-5">
    <h2>Editar Administrador</h2>

    <form method="POST" action="{{ route('admin.admins.update', $admin->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $admin->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $admin->email) }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Nueva contraseña (opcional)</label>
            <input type="password" class="form-control" name="password">
            <small class="text-muted">Déjalo vacío si no deseas cambiarla.</small>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar nueva contraseña</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            <small class="text-muted">Si has ingresado una nueva contraseña, confírmala aquí.</small>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="superadmin" class="form-check-input" id="superadmin"
                   {{ old('superadmin', $admin->superadmin) ? 'checked' : '' }}>
            <label for="superadmin" class="form-check-label">Superadmin</label>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('admin.dashboard.list.admins') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
