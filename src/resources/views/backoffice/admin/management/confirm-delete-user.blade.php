@extends('layouts.admin')

@section('title', 'Confirmar Eliminación Usuario')

@section('admincontent')
<div class="container mt-5" >
    <h2>Confirmar Eliminación de usuario</h2>

    <p>¿Estás seguro de que deseas eliminar el usuario <strong>"{{ $user->name }}"</strong>?</p>

    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
        <a href="{{ route('admin.dashboard.list.users') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
