@extends('layouts.user')

@section('title', 'Ayuda · Gestión de Tickets')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Gestión de Tickets</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">Tickets</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- Introducción a Tickets --}}
    <div class="callout callout-info mb-4">
        <h5><i class="fas fa-info-circle"></i> ¿Qué es un Ticket?</h5>
        <p>
            Un "Ticket" es el registro digital de tu solicitud, incidencia o pregunta. Es como un expediente que contiene toda la información del problema, la conversación con el técnico y el estado actual de la resolución.
        </p>
    </div>

    {{-- 1. CREAR TICKET --}}
    <div class="card card-primary card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">1. ¿Cómo crear un nuevo Ticket?</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <p>Sigue estos pasos para reportar una incidencia:</p>
            
            <div class="row">
                <div class="col-md-6">
                    <ol>
                        <li class="mb-2">
                            <strong>Ir a la sección Tickets:</strong> En el menú lateral izquierdo, haz clic en <span class="badge badge-secondary">Tickets</span>.
                        </li>
                        <li class="mb-2">
                            <strong>Botón Crear:</strong> Haz clic en el botón <span class="badge badge-success"><i class="fas fa-plus"></i> Crear Nuevo Ticket</span> situado en la parte superior derecha de la tabla.
                        </li>
                        <li class="mb-2">
                            <strong>Completar el Formulario:</strong>
                            <ul>
                                <li class="mb-1"><strong>Título:</strong> Escribe un resumen breve y claro del problema (ej. "Error al imprimir factura"). Evita títulos genéricos como "Ayuda" o "Problema".</li>
                                <li class="mb-1"><strong>Descripción:</strong> Explica detalladamente qué sucede. Incluye mensajes de error si los hay, o pasos para reproducir el fallo. Cuanta más información des, más rápido podremos ayudarte.</li>
                                <li class="mb-1"><strong>Prioridad:</strong> Selecciona qué tan urgente es (Baja, Media, Alta). <i>Úsalo con responsabilidad</i>; marcar todo como "Alta" puede retrasar la gestión.</li>
                                <li class="mb-1"><strong>Tipo:</strong> Elige la categoría que mejor se ajuste (ej. Incidencia Técnica, Consulta, etc.).</li>
                            </ul>
                        </li>
                        <li class="mb-2">
                            <strong>Enviar:</strong> Haz clic en el botón <strong>Guardar</strong>. El sistema te redirigirá a la lista de tickets y verás un mensaje de confirmación.
                        </li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <div class="text-center border bg-light p-4 h-100 d-flex flex-column justify-content-center">
                        <i class="fas fa-edit fa-3x text-muted mb-3"></i>
                        <p class="text-muted small font-italic">[ Captura de pantalla sugerida: Formulario de creación de ticket completo ]</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. LISTADO Y BUSQUEDA --}}
    <div class="card card-info card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">2. Ver y Buscar mis Tickets</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <p>En la pantalla principal de "Tickets" verás un listado de todos tus tickets creados, ordenados del más reciente al más antiguo.</p>
            
            <div class="row">
                <div class="col-12 mb-3">
                     <div class="text-center border bg-light p-3">
                        <p class="text-muted small font-italic mb-0">[ Captura de pantalla sugerida: Tabla de listado de tickets ]</p>
                    </div>
                </div>
            </div>

            <h5>La Tabla de Tickets</h5>
            <p>Cada fila representa un ticket e incluye columnas clave:</p>
            <ul>
                <li><strong>ID:</strong> Número único de identificación del ticket (útil para referencias).</li>
                <li><strong>Título:</strong> El asunto del ticket.</li>
                <li><strong>Estado:</strong> Estado actual del proceso (ver sección Estados).</li>
                <li><strong>Prioridad y Tipo:</strong> Clasificación del ticket.</li>
                <li><strong>Acciones:</strong> Botones para interactuar con el ticket.</li>
            </ul>

            <h5 class="mt-4">Buscador</h5>
            <p>
                Si tienes muchos tickets, usa la barra de búsqueda en la parte superior de la lista. 
                Escribe una palabra clave del título (ej. "impresora") y presiona "Enter" o el botón de buscar. 
                Esto filtrará la lista para mostrar solo las coincidencias.
            </p>
        </div>
    </div>

    {{-- 3. ESTADOS DEL TICKET --}}
    <div class="card card-warning card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">3. Ciclo de Vida y Estados del Ticket</h3>
                        <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <p>Un ticket pasa por varios estados desde que nace hasta que se cierra. Entenderlos es vital para saber qué se espera de ti:</p>
            
            <div class="timeline">
                <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-primary">Abierto / Pendiente</span></h3>
                        <div class="timeline-body">
                            El ticket ha sido creado y enviado al sistema correctamente. Los administradores pueden verlo, pero aún no han comenzado a trabajar en él o están en proceso de triage y asignación.
                        </div>
                    </div>
                </div>
                
                <div>
                    <i class="fas fa-tools bg-yellow"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-warning">En Progreso / Asignado</span> (Implícito)</h3>
                        <div class="timeline-body">
                            Un administrador ha sido asignado a tu caso y está trabajando en él. Es probable que recibas comentarios solicitando más información. Revisa tus notificaciones.
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-check bg-green"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-success">Resuelto</span></h3>
                        <div class="timeline-body">
                            El administrador indica que ha solucionado el problema.
                            <br>
                            <strong>¡TU TURNO!</strong> En este punto, se requiere tu confirmación.
                            <ul>
                                <li>Si funciona: Debes usar la opción <strong>"Validar"</strong> para cerrar el ticket.</li>
                                <li>Si NO funciona: Debes comentar indicando que el fallo persiste, para que el administrador siga trabajando.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div>
                    <i class="fas fa-lock bg-secondary"></i>
                    <div class="timeline-item">
                        <h3 class="timeline-header"><span class="badge badge-secondary">Cerrado</span></h3>
                        <div class="timeline-body">
                            El proceso ha finalizado. El ticket queda guardado en tu historial como referencia, pero ya no admite más cambios, comentarios ni ediciones.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. INTERACTUAR --}}
    <div class="card card-success card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">4. Interactuar (Ver, Comentar, Validar)</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <p>Al hacer clic en el botón <i class="fas fa-eye"></i> <strong>Ver</strong> de un ticket, entras en la vista de detalle.</p>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="text-center border bg-light p-3 mb-3">
                        <p class="text-muted small font-italic mb-0">[ Captura de pantalla sugerida: Vista detalle con chat ]</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-comments text-primary"></i> Sección de Comentarios</h6>
                    <p>
                        Aquí es donde ocurre la conversación.
                    </p>
                    <ul>
                        <li>Escribe tu mensaje en la caja de texto inferior y pulsa "Enviar Comentario".</li>
                        <li>Tus comentarios aparecen alineados a la derecha (normalmente), y los del administrador a la izquierda.</li>
                        <li><strong>Nota:</strong> Puedes editar (<i class="fas fa-pencil-alt"></i>) o borrar (<i class="fas fa-trash"></i>) TUS propios comentarios.</li>
                    </ul>

                    <h6 class="mt-4"><i class="fas fa-check-circle text-success"></i> Validar Solución</h6>
                    <p>
                        Cuando un administrador marca el ticket como resuelto, o te pide confirmación, verás un botón o formulario para cambiar el estado o validar.
                        Si estás satisfecho con la respuesta, es fundamental que valides el ticket para cerrarlo oficialmente.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- 5. EDICIÓN Y BORRADO --}}
    <div class="card card-danger card-outline collapsed-card">
        <div class="card-header">
            <h3 class="card-title">5. Editar y Eliminar Tickets</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <h5>Editar Ticket <i class="fas fa-pen"></i></h5>
            <p>
                ¿Olvidaste un detalle importante en la descripción? Puedes editar el título, descripción o prioridad de tu ticket.
            </p>
            <ul>
                <li>Usa el botón Editar (<i class="fas fa-edit"></i>) en la lista de tickets.</li>
                <li>Modifica los campos necesarios y guarda.</li>
                <li><em>Nota: Esto modifica los datos básicos del ticket. Para añadir nueva información, suele ser mejor usar los comentarios.</em></li>
            </ul>

            <h5 class="mt-4">Eliminar Ticket <i class="fas fa-trash"></i></h5>
            <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle"></i> <strong>Atención:</strong> La eliminación es irreversible.
            </div>
            <p>
                Puedes eliminar un ticket si lo creaste por error y aún no tiene actividad relevante.
                <ul>
                    <li>Haz clic en el icono de papelera <i class="fas fa-trash"></i> en el listado.</li>
                    <li>Deberás confirmar la acción en la ventana emergente.</li>
                    <li>Si el ticket ya tiene conversaciones importantes, el sistema o la política de uso te recomienda no borrarlo para mantener el histórico.</li>
                </ul>
            </p>
        </div>
    </div>

</div>
@endsection
