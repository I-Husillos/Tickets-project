@extends('layouts.admin')

@section('title', 'Ayuda · Notificaciones')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                <i class="fas fa-bell"></i>
                Notificaciones
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                        Ayuda
                    </a>
                </li>
                <li class="breadcrumb-item active">Notificaciones</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('admincontent')
    <div class="container-fluid">

        {{-- QUÉ SON --}}
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h4>
                    <i class="fas fa-info-circle"></i>
                    ¿Qué son las notificaciones?
                </h4>
                <p class="mt-2">
                    Las notificaciones informan a los administradores
                    sobre eventos importantes que requieren atención
                    o seguimiento.
                </p>
            </div>
        </div>

        {{-- EVENTOS --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bolt"></i>
                    Eventos que generan notificaciones
                </h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>🎟️ Asignación de un ticket</li>
                    <li>🔄 Cambio de estado de un ticket</li>
                    <li>💬 Nuevo comentario de un usuario</li>
                    <li>⚠️ Tickets pendientes de acción</li>
                </ul>
            </div>
        </div>

        {{-- CANALES --}}
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-envelope"></i>
                    Canales de notificación
                </h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>📬 Notificaciones internas en el panel</li>
                    <li>📧 Correos electrónicos (según configuración)</li>
                </ul>

                <p class="text-muted">
                    El envío de correos se realiza de forma asíncrona
                    mediante colas para no afectar al rendimiento.
                </p>
            </div>
        </div>

        {{-- BUENAS PRÁCTICAS --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-check-circle"></i>
                    Buenas prácticas
                </h3>
            </div>
            <div class="card-body">
                <ul>
                    <li>✔️ Revisar las notificaciones con frecuencia</li>
                    <li>✔️ Acceder al ticket desde la notificación</li>
                    <li>✔️ Marcar como leídas las notificaciones revisadas</li>
                    <li>✔️ Priorizar tickets críticos</li>
                </ul>
            </div>
        </div>

        {{-- AVISO --}}
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-circle mr-2"></i>
            Ignorar notificaciones puede provocar retrasos en la resolución
            de incidencias y afectar a la experiencia del usuario.
        </div>

    </div>
@endsection
