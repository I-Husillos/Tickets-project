@extends('layouts.admin')

@section('title', 'Crear Usuario')

@section('admincontent')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Nuevo Usuario</h1>

    <!-- Mostrar mensajes de error de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">Error al intentar crear el usuario</div>
    @endif

    <!-- Formulario para crear el usuario -->
    <form action="{{ route('admin.users.store') }}" method="POST">
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
            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
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
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
    <div class="mt-4">
        <a href="{{ route('admin.manage.dashboard') }}" class="btn btn-secondary">Volver a la lista de Usuarios</a>
    </div>
</div>
@endsection
