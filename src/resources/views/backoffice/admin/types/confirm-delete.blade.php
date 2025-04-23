@extends('layouts.frontoffice')

@section('title', 'Confirmar Eliminación')

@section('content')
<div class="container mt-5" >
    <h2>⚠ Confirmar Eliminación</h2>

    <p>¿Estás seguro de que deseas eliminar el tipo <strong>"{{ $type->name }}"</strong>?</p>

    <form method="POST" action="{{ route('admin.types.destroy', $type->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
