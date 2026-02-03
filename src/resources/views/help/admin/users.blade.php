@extends('layouts.admin')

@section('title', 'Ayuda · Gestión de Usuarios')

@section('admincontent')
<div class="content-wrapper">

    {{-- HEADER --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-users"></i>
                        Gestión de Usuarios
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                                Ayuda
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTENIDO --}}
    <section class="content">
        <div class="container-fluid">

            {{-- TIPOS DE USUARIOS --}}
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <h4>
                        <i class="fas fa-user-tag"></i>
                        Tipos de cuentas en el sistema
                    </h4>
                    <p class="mt-2">
                        La plataforma diferencia claramente entre usuarios finales
                        y personal administrador.
                    </p>

                    <ul>
                        <li>
                            👤 <strong>Usuario</strong>:
                            crea tickets y realiza seguimiento de sus incidencias.
                        </li>
                        <li>
                            🛡️ <strong>Administrador</strong>:
                            gestiona tickets y responde a los usuarios.
                        </li>
                    </ul>
                </div>
            </div>

            {{-- PERMISOS --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-shield"></i>
                        Permisos y roles
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        Existen dos niveles dentro del rol administrador:
                    </p>

                    <ul>
                        <li>
                            <strong>Administrador</strong>:
                            solo puede gestionar tickets asignados.
                        </li>
                        <li>
                            <strong>Superadministrador</strong>:
                            puede gestionar usuarios, administradores y tipos de ticket.
                        </li>
                    </ul>

                    <p class="text-muted">
                        Estos permisos están controlados por el sistema de autenticación
                        y autorización de Laravel.
                    </p>
                </div>
            </div>

            {{-- GESTIÓN DE USUARIOS --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-cog"></i>
                        Acciones disponibles
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        Un superadministrador puede:
                    </p>

                    <ul>
                        <li>➕ Crear nuevos usuarios o administradores</li>
                        <li>✏️ Editar datos básicos</li>
                        <li>🚫 Desactivar o eliminar cuentas</li>
                        <li>🔐 Restablecer accesos</li>
                    </ul>

                    <p class="text-muted">
                        Todas las acciones quedan registradas en el historial de eventos.
                    </p>
                </div>
            </div>

            {{-- SEGURIDAD --}}
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-lock"></i>
                        Seguridad y buenas prácticas
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>✔️ Asignar solo los permisos necesarios</li>
                        <li>✔️ Evitar crear administradores innecesarios</li>
                        <li>✔️ Revisar el historial de eventos</li>
                        <li>✔️ Usar contraseñas seguras</li>
                    </ul>
                </div>
            </div>

            {{-- ADVERTENCIA --}}
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                La gestión de usuarios afecta directamente a la seguridad del sistema.
                Realiza estos cambios únicamente si estás autorizado.
            </div>

        </div>
    </section>
</div>
@endsection
