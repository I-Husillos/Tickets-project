@extends('layouts.admin')

@section('title', 'Ayuda · Historial de Eventos')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-info-circle"></i>
                    Introducción al Panel de Administración
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Ayuda</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('admincontent')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-history"></i>
                    Historial de Eventos
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                            Ayuda
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Eventos</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        {{-- QUÉ ES --}}
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h4>
                    <i class="fas fa-info-circle"></i>
                    ¿Qué es el historial de eventos?
                </h4>
                <p class="mt-2">
                    El historial de eventos registra automáticamente
                    todas las acciones relevantes realizadas dentro
                    del sistema.
                </p>
                <p>
                    Su objetivo es proporcionar trazabilidad, control
                    y auditoría de las operaciones.
                </p>
            </div>
        </div>

        {{-- QUÉ SE REGISTRA --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list"></i>
                    Acciones registradas
                </h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>🎟️ Creación, modificación y cierre de tickets</li>
                    <li>👥 Alta, edición o eliminación de usuarios</li>
                    <li>🛡️ Creación o cambios en administradores</li>
                    <li>🔄 Cambios de estado y asignaciones</li>
                    <li>⚙️ Acciones críticas del sistema</li>
                </ul>
            </div>
        </div>

        {{-- QUIÉN LO VE --}}
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-shield"></i>
                    Acceso al historial
                </h3>
            </div>
            <div class="card-body">
                <p>
                    El historial de eventos es accesible únicamente
                    para administradores autorizados.
                </p>

                <ul>
                    <li>👤 Administrador: consulta de eventos generales</li>
                    <li>👑 Superadministrador: acceso completo</li>
                </ul>

                <p class="text-muted">
                    El acceso está protegido por middleware y políticas.
                </p>
            </div>
        </div>

        {{-- UTILIDAD --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-search"></i>
                    ¿Para qué sirve?
                </h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>✔️ Auditoría de acciones</li>
                    <li>✔️ Detección de errores o abusos</li>
                    <li>✔️ Seguimiento de incidencias</li>
                    <li>✔️ Cumplimiento de buenas prácticas</li>
                </ul>
            </div>
        </div>

        {{-- BUENAS PRÁCTICAS --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Buenas prácticas
                </h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>✔️ Revisar eventos ante incidencias</li>
                    <li>✔️ Usar filtros para localizar acciones</li>
                    <li>✔️ No eliminar registros sin justificación</li>
                </ul>
            </div>
        </div>

        {{-- AVISO --}}
        <div class="alert alert-danger">
            <i class="fas fa-lock mr-2"></i>
            El historial de eventos es un componente crítico del sistema
            y debe usarse con responsabilidad.
        </div>

    </div>
@endsection
