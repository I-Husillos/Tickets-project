@extends('layouts.admin')

@section('title', 'Crear Tipo de Ticket')

@section('admincontent')
<div class="container mt-4">
    <h2>Crear Nuevo Tipo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" name="description" class="form-control" required value="{{ old('description') }}">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
