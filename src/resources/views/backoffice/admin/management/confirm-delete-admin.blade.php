@extends('layouts.admin')

@section('title', 'Confirmar Eliminación Administrador')

@section('admincontent')
<div class="container mt-5" >
    <h2>Confirmar Eliminación de administrador</h2>

    <p>¿Estás seguro de que deseas eliminar el usuario <strong>"{{ $admin->name }}"</strong>?</p>

    <form method="POST" action="{{ route('admin.admins.destroy', $admin->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
        <a href="{{ route('admin.dashboard.list.admins') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
