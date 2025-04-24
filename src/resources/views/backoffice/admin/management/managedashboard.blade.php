@extends('layouts.admin')

@section('title', 'Gestión de Usuarios y Administradores')

@section('admincontent')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center mb-4">Gestión de Usuarios y Administradores</h1>

    <div class="mt-5">
        <h4>Acciones rápidas</h4>
        <a href="{{ route('admin.dashboard.list.users') }}" class="btn btn-outline-primary m-2">Ver Usuarios</a>
        <a href="{{ route('admin.dashboard.list.admins') }}" class="btn btn-outline-primary m-2">Ver Administradores</a>
    </div>
    <div class="mt-2">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary m-2">Crear Usuario</a>
        <a href="{{ route('admin.admins.create') }}" class="btn btn-success m-2">Crear Admin</a>
    </div>
    <a href="{{ route('admin.notifications') }}" class="btn btn-warning">
        Notificaciones 
        @if (Auth::user()->unreadNotifications->count() > 0)
            <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
        @endif
    </a>




</div>
@endsection

