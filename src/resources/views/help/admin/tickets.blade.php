@extends('layouts.admin')

@section('title', 'Manual Operativo · Gestión Avanzada de Tickets')

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">Gestión Avanzada de Incidencias</h1>
            <p class="text-muted">Protocolos de atención, resolución y cierre de tickets.</p>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">Tickets</li>
            </ol>
        </div>
    </div>

    {{-- INTRODUCCIÓN AL FLUJO --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-project-diagram mr-2"></i> Ciclo de Vida del Ticket (SLA)</h3>
        </div>
        <div class="card-body">
            <p class="text-justify">
                Un ticket es una entidad viva que pasa por diferentes estados desde que nace hasta que muere. 
                Entender este flujo es vital para evitar tickets "estancados" que frustran a los usuarios.
            </p>
            
            <div class="row mt-4 mb-5">
                <div class="col-12">
                     <div class="timeline">
                        <!-- PENDIENTE -->
                        <div>
                            <i class="fas fa-envelope bg-blue box-shadow"></i>
                            <div class="timeline-item shadow-sm">
                                <span class="time"><i class="fas fa-clock"></i> T = 0</span>
                                <h3 class="timeline-header bg-light border-bottom">1. Estado: <strong class="text-primary">PENDIENTE</strong></h3>
                                <div class="timeline-body">
                                    El usuario ha reportado un problema. El ticket está visible para todos los administradores en la lista general.
                                    <br><strong>Nadie está trabajando en él todavía.</strong>
                                    <hr>
                                    <i class="fas fa-exclamation-triangle text-warning"></i> <em>El reloj del SLA está corriendo. Se requiere una reacción rápida.</em>
                                </div>
                            </div>
                        </div>
                        <!-- EN PROGRESO -->
                        <div>
                            <i class="fas fa-tools bg-yellow box-shadow"></i>
                            <div class="timeline-item shadow-sm">
                                <span class="time"><i class="fas fa-clock"></i> T + 10min</span>
                                <h3 class="timeline-header bg-light border-bottom">2. Estado: <strong class="text-warning">EN PROGRESO</strong></h3>
                                <div class="timeline-body">
                                    Un administrador (Tú) ha pulsado <strong>"Asignarme"</strong> o ha sido asignado por un supervisor.
                                    <br>Ahora eres el dueño del problema. El usuario ve que alguien está "manos a la obra".
                                    <br>En esta fase ocurre la investigación y el intercambio de mensajes.
                                </div>
                            </div>
                        </div>
                        <!-- RESUELTO -->
                        <div>
                            <i class="fas fa-check bg-success box-shadow"></i>
                            <div class="timeline-item shadow-sm">
                                <span class="time"><i class="fas fa-clock"></i> T + 2h</span>
                                <h3 class="timeline-header bg-light border-bottom">3. Estado: <strong class="text-success">RESUELTO / POR VALIDAR</strong></h3>
                                <div class="timeline-body">
                                    El técnico ha aplicado una solución y la ha comunicado.
                                    <br>El sistema espera que el usuario confirme si funciona o no.
                                </div>
                            </div>
                        </div>
                        <!-- CERRADO -->
                         <div>
                            <i class="fas fa-lock bg-secondary box-shadow"></i>
                            <div class="timeline-item shadow-sm">
                                <span class="time"><i class="fas fa-clock"></i> T + 24h</span>
                                <h3 class="timeline-header bg-light border-bottom">4. Estado: <strong class="text-secondary">CERRADO</strong></h3>
                                <div class="timeline-body">
                                    El ciclo ha terminado. El ticket se archiva y pasa al historial.
                                    <br>Solo puede reactivarse mediante una "Reapertura" manual si el problema persiste.
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECCIÓN DETALLADA: LA VISTA DE GESTIÓN --}}
    <div class="card card-outline card-info mt-4">
        <div class="card-header">
            <h3 class="card-title text-bold">Guía Paso a Paso: Trabajando un Ticket</h3>
        </div>
        <div class="card-body">
            
            {{-- PASO 1 --}}
            <h4 class="text-info mt-3">Paso 1: Localización y Filtrado</h4>
            <p>
                Ante cientos de tickets, el orden es poder. Utilice las herramientas de búsqueda en <code>Gestionar Tickets > Todos los Tickets</code>.
            </p>
            {{-- ESPACIO PARA CAPTURA: BARRA DE BÚSQUEDA Y FILTROS --}}
            <div class="row justify-content-center my-3">
                <div class="col-md-10 border border-info rounded p-3 bg-light text-center">
                    <i class="fas fa-search fa-2x text-info mb-2"></i>
                    <h6 class="font-weight-bold mb-0">[Captura: Barra de Búsqueda y Filtros de la Tabla]</h6>
                    <small class="text-muted">Muestre cómo buscar por "Email de usuario" o filtrar por estado "Pendiente".</small>
                </div>
            </div>
            <ul>
                <li><strong>Buscar por ID:</strong> Si un usuario le dice "tengo problema con el ticket #45", escriba `45` en el buscador.</li>
                <li><strong>Estados:</strong> Filtre por "Pendiente" para ver qué trabajo nuevo hay.</li>
            </ul>

            <hr class="my-4">

            {{-- PASO 2 --}}
            <h4 class="text-info">Paso 2: La Pantalla de Detalle ("La Mesa de Operaciones")</h4>
            <p>
                Al hacer clic en <span class="badge badge-primary"><i class="fas fa-eye"></i> Ver</span>, entras en la sala de operaciones del ticket.
                Aquí es donde sucede la magia.
            </p>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="text-dark font-weight-bold">A. Panel Izquierdo (Comunicación)</h5>
                            <p>Aquí se muestra el historial cronológico de la conversación.</p>
                            <ul>
                                <li>Los mensajes del usuario aparecen a la izquierda.</li>
                                <li>Sus respuestas a la derecha (o diferenciadas por color).</li>
                                <li><strong>Formulario de Respuesta:</strong> Donde redacta su solución.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 bg-light">
                        <div class="card-body">
                            <h5 class="text-dark font-weight-bold">B. Panel Derecho (Control)</h5>
                            <p>Controles administrativos críticos:</p>
                            <ul>
                                <li><strong>Cambiar Estado:</strong> Dropdown para mover el ticket de fase manualmente.</li>
                                <li><strong>Reasignar:</strong> Si el problema es de Redes y usted es de Hardware, páseselo a otro compañero aquí.</li>
                                <li><strong>Datos del Solicitante:</strong> Email y nombre para contacto directo.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ESPACIO PARA CAPTURA: VISTA DETALLE --}}
            <div class="row justify-content-center my-3">
                <div class="col-md-12 border p-4 bg-white text-center shadow-sm">
                    <i class="fas fa-desktop fa-3x text-secondary mb-3"></i>
                    <h6 class="font-weight-bold text-uppercase">[Captura Panorámica: Vista Detalle del Ticket]</h6>
                    <p class="text-muted small mb-0">Esta es la imagen más importante. Debe mostrar claramente las dos columnas (Chat y Acciones).</p>
                </div>
                <div class="col-12 text-center">
                   <small class="text-muted">Fig 2.1 - Interfaz de resolución.</small>
                </div>
            </div>

            <hr class="my-4">

            {{-- PASO 3 --}}
            <h4 class="text-info">Paso 3: Redactando una Respuesta Profesional</h4>
            <div class="alert alert-secondary">
                <i class="fas fa-pen-fancy mr-2"></i> <strong>Etiqueta Profesional:</strong>
                Recuerde que el cliente leerá esto. Sea empático pero conciso.
            </div>
            <p>
                Use el editor de texto para:
            </p>
            <ol>
                <li>Saludar al usuario por su nombre.</li>
                <li>Confirmar que ha entendido el problema ("Entiendo que su impresora no conecta...").</li>
                <li>Proponer pasos claros (usando listas numeradas).</li>
                <li>Adjuntar manuales o capturas si es necesario.</li>
            </ol>
            <p>
                Al pulsar <strong>"Enviar Comentario"</strong>, el sistema:
                1. Guarda el mensaje.
                2. Envía un email al usuario avisándole.
                3. (Opcional) Cambia el estado automáticamente si así está configurado.
            </p>

        </div>
    </div>

    {{-- SECCIÓN: SOLUCIÓN DE PROBLEMAS --}}
    <div class="card card-warning collapsed-card">
        <div class="card-header">
            <h3 class="card-title">Casos Especiales y Solución de Problemas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <dl>
                <dt class="text-warning">El usuario no responde hace días.</dt>
                <dd>
                    Si un ticket está en "En Progreso" o "Resuelto" y el usuario no confirma:
                    1. Envíe un último mensaje de aviso ("Cerraremos este ticket por inactividad en 24h").
                    2. Pasado el tiempo, use el botón <strong>"Forzar Cierre"</strong>.
                </dd>

                <dt class="text-warning">Me he asignado un ticket por error.</dt>
                <dd>
                    Simplemente use el selector de "Asignado a" en el panel derecho y seleccione "Sin asignar" o el nombre de otro compañero.
                </dd>

                <dt class="text-warning">El usuario reabrió un ticket que estaba cerrado.</dt>
                <dd>
                    Esto puede pasar si el problema volvió. El ticket volverá a estado "En Progreso" y aparecerá en su bandeja de entrada. Revise el historial para ver qué falló.
                </dd>
            </dl>
        </div>
    </div>

</div>
@endsection
