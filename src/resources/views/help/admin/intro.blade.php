@extends('layouts.admin')

@section('title', 'Ayuda · Introducción')

@section('admincontent')
<div class="content-wrapper">

    {{-- HEADER --}}
    <section class="content-header">
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
    </section>

    {{-- CONTENIDO --}}
    <section class="content">
        <div class="container-fluid">

            {{-- BIENVENIDA --}}
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h4>
                        <i class="fas fa-user-shield"></i>
                        Bienvenido al Panel de Administración
                    </h4>

                    <p class="mt-3">
                        Este panel está diseñado para que los administradores puedan
                        <strong>gestionar tickets</strong>, <strong>responder a los usuarios</strong>
                        y <strong>supervisar la actividad del sistema</strong> de forma clara y ordenada.
                    </p>

                    <p>
                        Dependiendo de tu rol, tendrás acceso a distintas funcionalidades
                        dentro de la plataforma.
                    </p>
                </div>
            </div>

            <div class="row">

                {{-- ADMIN NORMAL --}}
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-cog"></i>
                                Administrador
                            </h3>
                        </div>
                        <div class="card-body">
                            <p>Un administrador puede:</p>
                            <ul>
                                <li>📄 Ver los tickets asignados</li>
                                <li>💬 Responder a usuarios mediante comentarios</li>
                                <li>🔄 Cambiar el estado de los tickets</li>
                                <li>📜 Consultar el historial de eventos</li>
                            </ul>

                            <p class="text-muted">
                                No tiene acceso a la gestión de usuarios ni otros administradores.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- SUPERADMIN --}}
                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-crown"></i>
                                Superadministrador
                            </h3>
                        </div>
                        <div class="card-body">
                            <p>Además de lo anterior, un superadministrador puede:</p>
                            <ul>
                                <li>👥 Gestionar usuarios</li>
                                <li>🛡️ Gestionar administradores</li>
                                <li>🎟️ Ver todos los tickets del sistema</li>
                                <li>⚙️ Reasignar y modificar tickets</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            {{-- RESPONSABILIDADES PRINCIPALES --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tasks"></i>
                        Responsabilidades principales
                    </h3>
                </div>
                <div class="card-body">
                    <p>Como administrador, tus tareas diarias incluyen:</p>
                    <ul>
                        <li>🎯 <strong>Gestionar tickets:</strong> revisar, asignar y resolver incidencias</li>
                        <li>💬 <strong>Comunicación:</strong> responder a usuarios con claridad y profesionalidad</li>
                        <li>📊 <strong>Seguimiento:</strong> mantener los tickets actualizados con el estado correcto</li>
                        <li>📋 <strong>Documentación:</strong> registrar información importante en comentarios</li>
                        <li>🔔 <strong>Notificaciones:</strong> responder de forma oportuna a usuarios y colegas</li>
                        <li>📈 <strong>Análisis:</strong> identificar problemas recurrentes y áreas de mejora</li>
                    </ul>
                </div>
            </div>

            {{-- WORKFLOW RECOMENDADO --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-diagram-project"></i>
                        Flujo de trabajo recomendado
                    </h3>
                </div>
                <div class="card-body">
                    <ol>
                        <li><strong>Revisar nuevos tickets:</strong> abre el dashboard y mira los pendientes</li>
                        <li><strong>Asignar:</strong> asígnate los tickets que vayas a gestionar</li>
                        <li><strong>Priorizar:</strong> comprende la urgencia y complejidad</li>
                        <li><strong>Investigar:</strong> solicita información adicional si la necesitas</li>
                        <li><strong>Resolver:</strong> trabaja en la solución del problema</li>
                        <li><strong>Documentar:</strong> añade comentarios con el proceso seguido</li>
                        <li><strong>Confirmar:</strong> comunica la solución al usuario</li>
                        <li><strong>Cerrar:</strong> marca el ticket como cerrado una vez confirmado</li>
                    </ol>
                </div>
            </div>

            {{-- HERRAMIENTAS DISPONIBLES --}}
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-wrench"></i>
                        Herramientas disponibles
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>🎟️ <strong>Gestión de tickets:</strong> crear, editar, asignar, cambiar estado</li>
                        <li>👥 <strong>Gestión de usuarios:</strong> ver, editar, crear (solo superadmin)</li>
                        <li>🛡️ <strong>Gestión de administradores:</strong> controlar roles y permisos (solo superadmin)</li>
                        <li>📜 <strong>Historial de eventos:</strong> auditoría completa de acciones</li>
                        <li>🔔 <strong>Centro de notificaciones:</strong> mantenerse actualizado</li>
                        <li>🎭 <strong>Tipos de ticket:</strong> personalizar categorías (solo superadmin)</li>
                    </ul>
                </div>
            </div>

            {{-- NAVEGACIÓN --}}
            <div class="card card-secondary card-outline">
                <div class="card-body">
                    <h5>
                        <i class="fas fa-compass"></i>
                        Navegación por el Panel
                    </h5>

                    <p class="mt-2">
                        El panel de administración se compone de:
                    </p>

                    <ul>
                        <li>📌 <strong>Menú lateral</strong> para acceder a todas las secciones</li>
                        <li>📊 <strong>Dashboard</strong> con estadísticas y resumen del sistema</li>
                        <li>🔔 <strong>Notificaciones</strong> con eventos importantes</li>
                        <li>📜 <strong>Historial de eventos</strong> para trazabilidad completa</li>
                        <li>⚙️ <strong>Configuración</strong> según tu rol (solo superadmin)</li>
                    </ul>
                </div>
            </div>

            {{-- MEJORES PRÁCTICAS --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-star"></i>
                        Mejores prácticas
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li>✅ <strong>Responde rápido:</strong> reduce el tiempo entre comentarios del usuario</li>
                        <li>✅ <strong>Sé claro:</strong> comunica decisiones de forma comprensible</li>
                        <li>✅ <strong>Documenta:</strong> deja un rastro de tu trabajo para auditoría</li>
                        <li>✅ <strong>Revisa el contexto:</strong> lee el historial completo antes de responder</li>
                        <li>✅ <strong>Escala si es necesario:</strong> pide ayuda a colegas o superadmin</li>
                        <li>✅ <strong>Cierra correctamente:</strong> confirma con el usuario antes de cerrar</li>
                    </ul>
                </div>
            </div>

            {{-- CTA --}}
            <div class="callout callout-info">
                <h5>
                    <i class="fas fa-life-ring"></i>
                    ¿Necesitas más ayuda?
                </h5>
                <p>
                    Usa el menú de ayuda para consultar guías específicas sobre
                    tickets, usuarios, notificaciones, eventos o preguntas frecuentes.
                </p>
            </div>

        </div>
    </section>
</div>
@endsection
