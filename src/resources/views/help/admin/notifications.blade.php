@extends('layouts.admin')

@section('title', 'Ayuda Admin · Notificaciones')

@section('admincontent')
<div class="container-fluid">
    <div class="row">
        {{-- COLUMNA PRINCIPAL DE CONTENIDO (MANUAL) --}}
        <div class="col-lg-9">
            
            {{-- HEADER DEL CAPÍTULO --}}
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                <div>
                    <h1 class="text-dark">4. Gestión de Alertas y Avisos</h1>
                    <p class="lead text-muted">Manténgase informado en tiempo real sobre la actividad crítica del Helpdesk.</p>
                </div>
                <div>
                    <span class="badge badge-warning p-2" style="font-size: 1rem;"><i class="fas fa-bell mr-1"></i> Módulo de Notificaciones</span>
                </div>
            </div>

            {{-- SECCIÓN 4.1: VISIÓN GENERAL --}}
            <div class="card card-outline card-navy mb-5" id="section-4-1">
                <div class="card-header">
                    <h3 class="card-title text-navy font-weight-bold">4.1. Filosofía "Just-in-Time"</h3>
                </div>
                <div class="card-body">
                    <p>
                        En un entorno de soporte técnico, la velocidad de reacción es clave para mantener los SLAs bajo control.
                        El sistema de notificaciones de Termosalud está diseñado para ser <strong>asertivo pero no intrusivo</strong>.
                    </p>
                    <div class="alert alert-light border-left-warning shadow-sm">
                        <h5 class="text-warning"><i class="fas fa-lightbulb"></i> Objetivo: Inbox Zero</h5>
                        <p class="mb-0">
                            El sistema le alerta solo cuando se requiere su acción inmediata (ej. un cliente responde, o se le asigna un ticket).
                            Esto permite a los administradores trabajar proactivamente en lugar de reactivamente.
                        </p>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 4.2: LA CAMPANA DE NOTIFICACIONES --}}
            <div class="card card-outline card-primary mb-5" id="section-4-2">
                <div class="card-header">
                    <h3 class="card-title text-primary font-weight-bold">4.2. El Centro de Control (Campana)</h3>
                </div>
                <div class="card-body">
                    <p>Situada en la barra de navegación superior derecha, la campana es el punto focal de actividad.</p>
                    
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fas fa-circle text-danger mr-2"></i> <strong>El Globo Rojo (Badge):</strong>
                                    Indica numéricamente cuántos eventos nuevos han ocurrido desde su última revisión.
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-mouse-pointer text-primary mr-2"></i> <strong>Acción Inteligente:</strong>
                                    Al hacer clic en una notificación específica, el sistema marca esa notificación como leída y lo redirige automáticamente al ticket afectado.
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-list-ul text-secondary mr-2"></i> <strong>Ver todas:</strong>
                                    Permite acceder al historial completo de notificaciones, útil para auditar lo sucedido durante el fin de semana o vacaciones.
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 text-center p-3">
                             <img src="/img/image%20copy%2010.png" class="img-fluid border shadow rounded" alt="Menú Notificaciones desplegado">
                             <p class="text-muted small mt-2"><em>Fig 4.2. Menú desplegable de alertas recientes</em></p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 4.3: TIPOLOGÍA y CÓDIGOS VISUALES --}}
            <div class="card card-outline card-info mb-5" id="section-4-3">
                <div class="card-header">
                    <h3 class="card-title text-info font-weight-bold">4.3. Código Visual y Tipos</h3>
                </div>
                <div class="card-body">
                    <p>Para procesar la información rápidamente, cada evento tiene un icono y color distintivo:</p>
                    
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center" style="width: 80px;">Icono</th>
                                    <th>Evento Trigger</th>
                                    <th>Acción Sugerida</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center bg-white"><i class="fas fa-ticket-alt text-success fa-2x"></i></td>
                                    <td><strong>Nuevo Ticket Creado</strong><br><small class="text-muted">Un usuario ha registrado una incidencia.</small></td>
                                    <td>Evaluar prioridad y asignar técnico inmediatamente.</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-white"><i class="fas fa-comment text-primary fa-2x"></i></td>
                                    <td><strong>Nueva Respuesta</strong><br><small class="text-muted">El usuario ha contestado a su pregunta.</small></td>
                                    <td>Revisar la información aportada y continuar el diagnóstico.</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-white"><i class="fas fa-user-tag text-warning fa-2x"></i></td>
                                    <td><strong>Asignación Manual</strong><br><small class="text-muted">Otro admin le ha transferido un ticket.</small></td>
                                    <td>Hacerse cargo del ticket ("Patata caliente").</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-white"><i class="fas fa-door-open text-danger fa-2x"></i></td>
                                    <td><strong>Reapertura de Caso</strong><br><small class="text-muted">Un ticket cerrado ha vuelto a activarse.</small></td>
                                    <td>Contactar al usuario para entender por qué la solución falló.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 4.4: EMAIL --}}
            <div class="card card-outline card-secondary mb-5" id="section-4-4">
                <div class="card-header">
                    <h3 class="card-title text-secondary font-weight-bold">4.4. Canales Externos (Email)</h3>
                </div>
                <div class="card-body">
                    <p>
                        Además del panel web, el sistema envía copias espejo a su buzón de correo electrónico corporativo: 
                        <code>{{ Auth::guard('admin')->user()->email }}</code>.
                    </p>
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info-circle"></i> Recomendación de Productividad</h5>
                        <p>
                            Se recomienda configurar una regla en su cliente de correo (Outlook/Gmail) para mover estos correos a una carpeta dedicada (ej. "Tickets Termosalud").
                            Esto evita que las notificaciones técnicas saturen su bandeja de entrada personal, permitiéndole revisarlas por lotes.
                        </p>
                    </div>
                </div>
            </div>
            
        </div>

        {{-- SIDEBAR: NAVEGACIÓN RÁPIDA (STICKY) --}}
        <div class="col-lg-3">
            <div class="list-group sticky-top shadow-sm" style="top: 20px; z-index: 100;">
                <div class="list-group-item bg-navy text-white">
                    <h5 class="mb-0"><i class="fas fa-book mr-2"></i>Manual Operativo</h5>
                </div>
                <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-home mr-2 text-muted"></i> 1. Introducción
                </a>
                <a href="{{ route('admin.help.tickets', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-ticket-alt mr-2 text-muted"></i> 2. Gestión de Tickets
                </a>
                <a href="{{ route('admin.help.users', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                   <i class="fas fa-users-cog mr-2 text-muted"></i> 3. Usuarios y Permisos
                </a>
                <a href="#section-4-1" class="list-group-item list-group-item-action active font-weight-bold pl-4">
                    <i class="fas fa-bell mr-2"></i> 4. Notificaciones
                </a>
                <div class="bg-light p-2 border-left border-right border-bottom">
                    <nav class="nav nav-pills flex-column small">
                        <a class="nav-link my-0 py-1 text-muted" href="#section-4-2">4.2. La Campana Central</a>
                        <a class="nav-link my-0 py-1 text-muted" href="#section-4-3">4.3. Códigos Visuales</a>
                        <a class="nav-link my-0 py-1 text-muted" href="#section-4-4">4.4. Email</a>
                    </nav>
                </div>
                <a href="{{ route('admin.help.events', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                   <i class="fas fa-history mr-2 text-muted"></i> 5. Auditoría
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
