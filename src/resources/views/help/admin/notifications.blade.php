@extends('layouts.admin')

@section('title', 'Ayuda Admin · Notificaciones')

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">Centro de Notificaciones y Alertas</h1>
            <p class="text-muted">Manténgase informado en tiempo real sobre la actividad del Helpdesk.</p>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">Notificaciones</li>
            </ol>
        </div>
    </div>

    <div class="row">
        {{-- COLUMNA IZQUIERDA: FUNCIONAMIENTO --}}
        <div class="col-md-7">
            <div class="card card-warning card-outline h-100">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bell mr-2"></i> Flujo de Notificaciones</h3>
                </div>
                <div class="card-body">
                    <p class="lead">
                        En soporte técnico, la velocidad lo es todo. El sistema de notificaciones está diseñado para llamar su atención solo cuando es necesario.
                    </p>
                    
                    <h5 class="mt-4 text-warning">1. LA CAMPANA DE ALERTAS</h5>
                    <p>
                        Situada en la barra superior derecha, muestra un globo rojo ("badge") con el número de eventos no leídos.
                    </p>
                    
                    {{-- ESPACIO PARA CAPTURA: MENU NOTIFICACIONES --}}
                    <div class="text-center my-3 p-3 border bg-light rounded">
                        <img src="/img/image%20copy%2010.png" class="img-fluid border shadow-sm" alt="Menú Notificaciones">
                    </div>

                    <ul>
                        <li><strong>Clic en la Campana:</strong> Abre el resumen rápido (últimas 5).</li>
                        <li><strong>Clic en "Ver todas":</strong> Le lleva a la pantalla de gestión completa de avisos.</li>
                        <li><strong>Clic en una Notificación:</strong> Acción inteligente. Le marca como leída y <strong>le redirige automáticamente al ticket afectado</strong>.</li>
                    </ul>

                    <h5 class="mt-4 text-warning">2. GESTIÓN DE LA BANDEJA</h5>
                    <p>
                        Si acumula muchas notificaciones (ej. tras un fin de semana), usar la opción <strong>"Marcar todas como leídas"</strong> es una buena práctica para limpiar su tablero ("Inbox Zero") y empezar la semana fresco.
                    </p>
                </div>
            </div>
        </div>

        {{-- COLUMNA DERECHA: TIPOS Y EMAIL --}}
        <div class="col-md-5">
            {{-- CODIGO DE COLORES --}}
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Leyenda de Iconos/Colores</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <tr>
                            <td class="text-center"><i class="fas fa-ticket-alt text-success"></i></td>
                            <td><strong>Nuevo Ticket</strong><br><small>Alguien ha creado una incidencia nueva.</small></td>
                        </tr>
                        <tr>
                            <td class="text-center"><i class="fas fa-comment text-primary"></i></td>
                            <td><strong>Nuevo Comentario</strong><br><small>El usuario respondió a su pregunta.</small></td>
                        </tr>
                        <tr>
                            <td class="text-center"><i class="fas fa-user-tag text-warning"></i></td>
                            <td><strong>Asignación</strong><br><small>Le han pasado la "patata caliente" de un ticket.</small></td>
                        </tr>
                        <tr>
                            <td class="text-center"><i class="fas fa-door-open text-danger"></i></td>
                            <td><strong>Reapertura</strong><br><small>Un ticket cerrado ha vuelto a la vida.</small></td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- INTEGRACIÓN EMAIL --}}
            <div class="card card-outline card-navy mt-3">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-envelope mr-2"></i> Notificaciones por Email</h3>
                </div>
                <div class="card-body">
                    <p>
                        El sistema envía una copia de estas alertas a su correo corporativo: 
                        <code>{{ Auth::guard('admin')->user()->email }}</code>
                    </p>
                    <div class="alert alert-light border">
                        <h6><i class="fas fa-lightbulb text-warning"></i> Consejo Pro:</h6>
                        <p class="small mb-0">
                            Cree una regla/filtro en su Outlook o Gmail para mover estos correos a una carpeta "Tickets" y evitar saturar su bandeja de entrada principal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
