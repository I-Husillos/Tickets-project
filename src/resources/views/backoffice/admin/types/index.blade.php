@extends('layouts.admin')

@section('title', 'Types de Tickets - Administrador')

@section('admincontent')
<div class="container mt-4">
    <h2 class="text-center">Listado de Tipos de Ticket</h2>

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
                        <a href="{{ route('admin.types.confirmDelete', $type->id) }}" class="btn btn-danger btn-sm">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <div class="text-center mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Volver al menú de principal</a>
    </div> -->
</div>
@endsection