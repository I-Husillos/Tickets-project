@extends('layouts.admin')

@section('title', 'Editar Tipo de Ticket')

@section('admincontent')
<div class="container mt-4">
    <h2>Editar Tipo: {{ $type->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $type->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" name="description" class="form-control" required value="{{ old('description', $type->description) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
