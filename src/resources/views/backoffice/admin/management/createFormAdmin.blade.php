@extends('layouts.admin')

@section('title', 'Crear Administrador')

@section('admincontent')
<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Nuevo Administrador</h1>

    <!-- Mostrar mensajes de error de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para crear el administrador -->
    <form action="{{ route('admin.admins.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="superadmin" class="form-label">¿Es Superadmin?</label>
            <select class="form-select" id="superadmin" name="superadmin">
                <option value="1" {{ old('superadmin') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('superadmin') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear Administrador</button>
    </form>
    <div class="mt-4">
        <a href="{{ route('admin.manage.dashboard') }}" class="btn btn-secondary">Volver a la lista de Usuarios</a>
    </div>
</div>
@endsection
