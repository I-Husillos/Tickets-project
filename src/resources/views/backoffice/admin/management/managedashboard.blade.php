@extends('layouts.admin')

@section('title', 'Panel de Control')

@section('admincontent')
<div class="container mt-5">

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-center mb-4">Panel de Control</h1>

    <!-- Resumen de actividades -->
    <div class="row">
        <!-- Historial de Tickets -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Historial de Tickets</h5>
                    <p class="card-text">Accede al historial de tickets creados por los usuarios.</p>
                    <a href="{{ route('admin.manage.tickets') }}" class="btn btn-light">Ver Tickets</a>
                </div>
            </div>
        </div>

        <!-- Historial de Usuarios -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Historial de Usuarios</h5>
                    <p class="card-text">Consulta el historial de usuarios registrados.</p>
                    <a href="{{ route('admin.dashboard.list.users') }}" class="btn btn-light">Ver Usuarios</a>
                </div>
            </div>
        </div>

        <!-- Historial de Administradores -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Historial de Administradores</h5>
                    <p class="card-text">Consulta el historial de administradores registrados.</p>
                    <a href="{{ route('admin.dashboard.list.admins') }}" class="btn btn-light">Ver Administradores</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Historial de Cambios en el Sistema -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Historial de Cambios en el Sistema</h5>
                    <p class="card-text">Accede al historial de cambios realizados en el sistema.</p>
                    <a href="{{ route('admin.history.system') }}" class="btn btn-light">Ver Historial de Cambios</a>
                </div>
            </div>
        </div>

        <!-- Enlace a otras secciones -->
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">Otras Secciones</h5>
                    <p class="card-text">Accede a secciones adicionales del sistema.</p>
                    <a href="{{ route('admin.settings') }}" class="btn btn-light">Configuraciones</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Acciones rápidas -->
    <div class="mt-5">
        <h4>Acciones rápidas</h4>
        <a href="{{ route('admin.dashboard.list.users') }}" class="btn btn-outline-primary m-2">Ver Usuarios</a>
        <a href="{{ route('admin.dashboard.list.admins') }}" class="btn btn-outline-primary m-2">Ver Administradores</a>
    </div>

    <!-- Crear nuevo usuario y admin -->
    <div class="mt-2">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary m-2">Crear Usuario</a>
        <a href="{{ route('admin.admins.create') }}" class="btn btn-success m-2">Crear Admin</a>
    </div>
</div>
@endsection
