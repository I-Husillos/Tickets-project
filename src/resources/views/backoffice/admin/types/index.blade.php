@extends('layouts.frontoffice')

@section('title', 'Types de Tickets - Administrador')

@section('content')


@section('content')
<div class="container mt-4">
    <h2>Listado de Tipos de Ticket</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.types.create') }}" class="btn btn-primary mb-3">+ Nuevo Tipo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->description }}</td>
                    <td>
                        <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin.types.confirmDelete', $type->id) }}" class="btn btn-danger btn-sm">
                                Eliminar
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Volver al menú de principal</a>
    </div>
</div>
@endsection