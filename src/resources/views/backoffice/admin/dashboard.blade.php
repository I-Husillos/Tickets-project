@extends('layouts.admin')

@section('title', 'Dashboard - Administrador')

@section('admincontent')
<div class="container mt-5">
    <h1 class="text-center">Panel de Administrador</h1>
    <p class="text-center">Bienvenido, {{ Auth::guard('admin')->user()->name }}</p>
    <div class="d-flex justify-content-end mt-4">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
    @if ($isSuperAdmin)
        <div class="mt-5">
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('admin.manage.tickets') }}" class="btn btn-success">Gestionar Tickets</a>
                <a href="{{ route('admin.types.index') }}" class="btn btn-info">Tipos de Tickets</a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-warning">Usuarios y Admins</a>
            </div>
        </div>
    @endif
    
    <div class="mt-5 text-center">
        <a href="{{ route('admin.show.assigned.tickets') }}" class="btn btn-primary btn-lg">Tickets Asignados</a>
    </div>

</div>
@endsection


