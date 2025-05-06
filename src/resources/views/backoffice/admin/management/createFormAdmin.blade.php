@extends('layouts.admin')

@section('title', 'Crear Administrador')

@section('admincontent')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Nuevo Administrador</h1>

    <!-- Mostrar mensajes de error de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">Error al crear al administrador</div>
    @endif

    <!-- Formulario para crear el administrador -->
    <form action="{{ route('admin.admins.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="superadmin" class="form-label">¿Es Superadmin?</label>
            <select class="form-select @error('superadmin') is-invalid @enderror" id="superadmin" name="superadmin">
                <option value="">Seleccione una opción</option>
                <option value="0" {{ old('superadmin') == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('superadmin') == '1' ? 'selected' : '' }}>Sí</option>
            </select>
            @error('superadmin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Crear Administrador</button>
    </form>
    <div class="mt-4">
        <a href="{{ route('admin.manage.dashboard') }}" class="btn btn-secondary">Volver a la lista de Usuarios</a>
    </div>
</div>
@endsection
