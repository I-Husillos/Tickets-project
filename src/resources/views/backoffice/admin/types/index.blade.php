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
                <th style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->description }}</td>
                    <td>
                        <div class="text-center">
                            <a href="{{ route('admin.types.confirmDelete', $type->id) }}" class="btn btn-danger btn-sm">
                                Eliminar
                            </a>
                            <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection