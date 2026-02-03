@extends('layouts.admin')

@section('title', 'Ayuda · Gestión de Tickets')

@section('admincontent')
<div class="content-wrapper">

    {{-- HEADER --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-ticket-alt"></i>
                        Gestión de Tickets
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                                Ayuda
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Tickets</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTENIDO --}}
    <section class="content">
        <div class="container-fluid">

            {{-- QUÉ ES UN TICKET --}}
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <h4>
                        <i class="fas fa-info-circle"></i>
                        ¿Qué es un ticket?
                    </h4>
                    <p class="mt-2">
                        Un ticket representa una incidencia, solicitud o problema
                        creado por un usuario. Es la unidad principal de trabajo
                        dentro del sistema.
                    </p>
                    <p>
                        Cada ticket contiene información sobre su autor, estado,
                        prioridad, tipo y el administrador asignado.
                    </p>
                </div>
            </div>

            {{-- ESTADOS --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-sync-alt"></i>
                        Estados del ticket
                    </h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Nuevo</strong>: ticket recién creado.</li>
                        <li><strong>En progreso</strong>: un administrador lo está gestionando.</li>
                        <li><strong>Pendiente</strong>: se requiere información adicional.</li>
                        <li><strong>Resuelto</strong>: la incidencia ha sido solucionada.</li>
                        <li><strong>Cerrado</strong>: el ticket ha finalizado definitivamente.</li>
                    </ul>
                    <p class="text-muted">
                        Los cambios de estado generan notificaciones automáticas.
                    </p>
                </div>
            </div>

            {{-- ASIGNACIÓN --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-check"></i>
                        Asignación de tickets
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        Un ticket puede asignarse a un administrador para
                        responsabilizarse de su resolución.
                    </p>

                    <ul>
                        <li>👤 Administrador normal: solo ve tickets asignados.</li>
                        <li>👑 Superadministrador: puede ver y asignar cualquier ticket.</li>
                    </ul>

                    <p class="text-muted">
                        La asignación queda registrada en el historial de eventos.
                    </p>
                </div>
            </div>

            {{-- COMUNICACIÓN --}}
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-comments"></i>
                        Comunicación con el usuario
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        Los administradores pueden comunicarse con los usuarios
                        mediante comentarios dentro del ticket.
                    </p>
                    <ul>
                        <li>💬 Solicitar información adicional</li>
                        <li>📎 Aclarar el estado del ticket</li>
                        <li>✅ Confirmar la resolución</li>
                    </ul>
                    <p class="text-muted mt-2">
                        Cada comentario genera una notificación al usuario afectado.
                    </p>
                </div>
            </div>

            {{-- PRIORIDADES --}}
            <div class="card card-outline card-danger">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-exclamation-circle"></i>
                        Prioridades y tiempos de respuesta
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Prioridad</th>
                                <th>Descripción</th>
                                <th>Tiempo recomendado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="badge badge-danger">Alta</span></td>
                                <td>Incidencias críticas que afectan operaciones</td>
                                <td>Dentro de 24h</td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-warning">Media</span></td>
                                <td>Problemas importantes pero no urgentes</td>
                                <td>Dentro de 72h</td>
                            </tr>
                            <tr>
                                <td><span class="badge badge-info">Baja</span></td>
                                <td>Consultas, mejoras, solicitudes informativas</td>
                                <td>Dentro de 1 semana</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- WORKFLOW DETALLADO --}}
            <div class="card card-outline card-light">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cube"></i>
                        Workflow completo de un ticket
                    </h3>
                </div>
                <div class="card-body">
                    <ol>
                        <li>
                            <strong>Revisión:</strong> el ticket se crea en estado "Nuevo"
                        </li>
                        <li>
                            <strong>Asignación:</strong> asígnate el ticket para indicar que lo gestionarás
                            <ul class="text-muted">
                                <li>Sistema: <code>Asignar a mí</code> o <code>Reasignar</code></li>
                            </ul>
                        </li>
                        <li>
                            <strong>Cambio a "En proceso":</strong> cuando comiences a trabajar
                        </li>
                        <li>
                            <strong>Solicitud de información:</strong> si necesitas más detalles
                            <ul class="text-muted">
                                <li>Acción: cambiar a "Pendiente información"</li>
                                <li>Añadir un comentario explicativo</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Resolución:</strong> cuando hayas solucionado el problema
                            <ul class="text-muted">
                                <li>Cambiar a "Resuelto"</li>
                                <li>Explicar brevemente la solución</li>
                                <li>Solicitar confirmación del usuario</li>
                            </ul>
                        </li>
                        <li>
                            <strong>Confirmación:</strong> esperar el "OK" del usuario
                        </li>
                        <li>
                            <strong>Cierre:</strong> cambiar a "Cerrado" cuando esté confirmado
                        </li>
                    </ol>
                </div>
            </div>

            {{-- TIPOS DE TICKETS --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tags"></i>
                        Tipos de tickets
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        Los tipos ayudan a categorizar y enrutar correctamente los tickets.
                        Los superadministradores pueden crear nuevos tipos según sea necesario.
                    </p>
                    <p class="text-muted">
                        Usa el tipo correcto para facilitar la búsqueda y seguimiento futuro.
                    </p>
                </div>
            </div>

            {{-- FILTROS Y BÚSQUEDA --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-search"></i>
                        Filtros y búsqueda
                    </h3>
                </div>
                <div class="card-body">
                    <p>Encuentra tickets rápidamente usando:</p>
                    <ul>
                        <li><strong>Buscador:</strong> busca por título o ID del ticket</li>
                        <li><strong>Filtros por estado:</strong> nuevo, en proceso, pendiente, resuelto, cerrado</li>
                        <li><strong>Filtros por prioridad:</strong> alta, media, baja</li>
                        <li><strong>Filtros por tipo:</strong> filtra por categoría</li>
                        <li><strong>Mis asignados:</strong> solo tus tickets asignados</li>
                        <li><strong>Rango de fechas:</strong> filtra por fecha de creación o modificación</li>
                    </ul>
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
                        <li>✔️ <strong>Asignarse el ticket:</strong> antes de cualquier acción importante</li>
                        <li>✔️ <strong>Cambiar estado regularmente:</strong> mantén a los usuarios informados</li>
                        <li>✔️ <strong>Documentar en comentarios:</strong> explica qué hiciste y por qué</li>
                        <li>✔️ <strong>Ser profesional:</strong> tono claro, respetuoso y constructivo</li>
                        <li>✔️ <strong>Responder rápidamente:</strong> dentro de los tiempos recomendados</li>
                        <li>✔️ <strong>Confirmar con el usuario:</strong> antes de cerrar un ticket</li>
                        <li>✔️ <strong>Revisar el contexto:</strong> lee todos los comentarios previos</li>
                        <li>✔️ <strong>Escalar si es necesario:</strong> pide ayuda para problemas complejos</li>
                    </ul>
                </div>
            </div>

            {{-- ADVERTENCIA --}}
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <strong>Importante:</strong> Las acciones sobre los tickets quedan registradas en el historial de eventos.
                Evita cerrar tickets sin una resolución confirmada. Si cometes un error, contacta al superadministrador.
            </div>

</div>
</section>
</div>
@endsection
