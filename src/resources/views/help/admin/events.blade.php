@extends('layouts.admin')

@section('title', 'Ayuda Admin · Auditoría y logs')

@section('admincontent')
<div class="container-fluid">
    <div class="row">
        {{-- COLUMNA PRINCIPAL DE CONTENIDO (MANUAL) --}}
        <div class="col-lg-9">
            
            {{-- HEADER DEL CAPÍTULO --}}
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                <div>
                    <h1 class="text-dark">5. Auditoría y Trazabilidad</h1>
                    <p class="lead text-muted">La "Caja Negra" del sistema: investigue qué pasó, quién lo hizo y cuándo.</p>
                </div>
                <div>
                    <span class="badge badge-dark p-2" style="font-size: 1rem;"><i class="fas fa-history mr-1"></i> Logs de Sistema</span>
                </div>
            </div>

            {{-- SECCIÓN 5.1: CONCEPTO --}}
            <div class="card card-outline card-secondary mb-5" id="section-5-1">
                <div class="card-header">
                    <h3 class="card-title text-secondary font-weight-bold">5.1. Responsabilidad y Seguridad</h3>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <p>
                                En un entorno corporativo, la trazabilidad es fundamental. A veces, un ticket cambia de estado inesperadamente, o un usuario reclama una falta de atención.
                                El módulo de <strong>Historial de Eventos</strong> actúa como un registro notarial inmutable de todas las acciones críticas.
                            </p>
                            <div class="callout callout-info">
                                <h5><i class="fas fa-shield-alt"></i> Seguridad</h5>
                                <p>
                                    Este registro permite detectar acciones no autorizadas, errores humanos o confirmar el cumplimiento de procedimientos.
                                    <strong>Los eventos no se pueden borrar ni modificar</strong>.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fas fa-fingerprint fa-6x text-black-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 5.2: CASOS DE USO FORENSE --}}
            <div class="card card-outline card-danger mb-5" id="section-5-2">
                <div class="card-header">
                    <h3 class="card-title text-danger font-weight-bold">5.2. Casos Prácticos de Investigación (Forense)</h3>
                </div>
                <div class="card-body">
                    <p>Ejemplos reales de cómo un Administrador utiliza esta herramienta:</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-light border-danger h-100">
                                <div class="card-body">
                                    <h5 class="text-danger"><i class="fas fa-search-minus mr-2"></i> Caso: "El Ticket Fantasma"</h5>
                                    <p class="small text-muted mb-2">Un usuario dice que su ticket ha desaparecido.</p>
                                    <ul class="list-unstyled small">
                                        <li class="mb-2"><strong>1. Acción:</strong> Filtrar historial por ID del ticket.</li>
                                        <li class="mb-2"><strong>2. Hallazgo:</strong> Registro <code>DELETED</code> asociado al usuario "AdminJuan".</li>
                                        <li><strong>3. Conclusión:</strong> El ticket fue borrado manualmente. Se puede preguntar a Juan el motivo.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light border-warning h-100">
                                <div class="card-body">
                                    <h5 class="text-warning"><i class="fas fa-stopwatch mr-2"></i> Caso: "Nadie me atende"</h5>
                                    <p class="small text-muted mb-2">Queja formal sobre lentitud en la respuesta.</p>
                                    <ul class="list-unstyled small">
                                        <li class="mb-2"><strong>1. Acción:</strong> Ver cronología del ticket.</li>
                                        <li class="mb-2"><strong>2. Hallazgo:</strong> Ticket creado el día 1, primera respuesta (<code>COMMENT_ADDED</code>) el día 8.</li>
                                        <li><strong>3. Conclusión:</strong> La queja es fundada (7 días de retraso).</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 5.3: LEYENDO LA TABLA --}}
            <div class="card card-outline card-dark mb-5" id="section-5-3">
                <div class="card-header">
                    <h3 class="card-title text-dark font-weight-bold">5.3. Estructura de Datos</h3>
                </div>
                <div class="card-body">
                    <p>La tabla de eventos presenta 4 columnas clave que narran la historia:</p>
                    
                    <div class="text-center mb-4 p-2 bg-light border rounded">
                        <img src="/img/image%20copy%209.png" class="img-fluid shadow-sm" alt="Captura de Tabla de Eventos">
                        <p class="text-muted small mt-2"><em>Fig 5.3. Interfaz del Historial de Eventos</em></p>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 20%">Actor <br><small>(¿Quién?)</small></th>
                                <th style="width: 20%">Evento <br><small>(¿Qué hizo?)</small></th>
                                <th style="width: 40%">Detalle <br><small>(Contexto)</small></th>
                                <th style="width: 20%">Timestamp <br><small>(¿Cuándo?)</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-user-tie text-muted mr-1"></i> Juan Admin</td>
                                <td><span class="badge badge-success">CREATED</span></td>
                                <td>Creó el ticket #50 manualmente</td>
                                <td class="text-monospace small">06 Oct, 10:30 AM</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-robot text-muted mr-1"></i> Sistema</td>
                                <td><span class="badge badge-info">ASSIGNED</span></td>
                                <td>Ticket #50 asignado a Maria Tech</td>
                                <td class="text-monospace small">06 Oct, 10:31 AM</td>
                            </tr>
                             <tr>
                                <td><i class="fas fa-user text-muted mr-1"></i> Cliente</td>
                                <td><span class="badge badge-primary">COMMENT</span></td>
                                <td>Respondió: "Gracias, funciona."</td>
                                <td class="text-monospace small">06 Oct, 11:45 AM</td>
                            </tr>
                        </tbody>
                    </table>
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
                <a href="{{ route('admin.help.notifications', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-bell mr-2 text-muted"></i> 4. Notificaciones
                </a>
                <a href="#section-5-1" class="list-group-item list-group-item-action active font-weight-bold pl-4">
                   <i class="fas fa-history mr-2"></i> 5. Auditoría
                </a>
                <div class="bg-light p-2 border-left border-right border-bottom">
                    <nav class="nav nav-pills flex-column small">
                        <a class="nav-link my-0 py-1 text-muted" href="#section-5-1">5.1. Concepto</a>
                        <a class="nav-link my-0 py-1 text-muted" href="#section-5-2">5.2. Casos Forenses</a>
                        <a class="nav-link my-0 py-1 text-muted" href="#section-5-3">5.3. Tabla de Datos</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
