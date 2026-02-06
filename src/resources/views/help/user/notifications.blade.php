@extends('layouts.user')

@section('title', 'Ayuda · Notificaciones')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Guía Completa de Notificaciones</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a>
                </li>
                <li class="breadcrumb-item active">Notificaciones</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- QUÉ SON LAS NOTIFICACIONES --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bell mr-2"></i>
                ¿Qué Son las Notificaciones?
            </h3>
        </div>
        <div class="card-body">
            <p>
                Las notificaciones son avisos automáticos que el sistema te envía 
                para informarte sobre cambios importantes en tus tickets.
            </p>

            <p class="mt-3">
                En lugar de tener que revisar manualmente cada ticket todos los días, 
                el sistema te avisa cuando sucede algo relevante. De esta forma, 
                siempre estarás informado sin tener que estar constantemente pendiente del sistema.
            </p>

            <p class="mt-3">
                <strong>En resumen:</strong> Las notificaciones te permiten trabajar 
                tranquilamente sabiendo que recibirás un aviso cuando sea necesario que actúes.
            </p>
        </div>
    </div>

    {{-- TIPOS DE NOTIFICACIONES - EXPANDIDO --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list mr-2"></i>
                Tipos Completos de Notificaciones (Explicadas en Detalle)
            </h3>
        </div>
        <div class="card-body">
            <p>
                Hay varios tipos de notificaciones que recibirás. Aquí se explica cada una:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-plus-circle text-success"></i> <strong>Ticket Creado</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Justo después de que creas un nuevo ticket.<br>
                        <strong>Por qué:</strong> Para confirmar que el sistema ha registrado tu solicitud.<br>
                        <strong>Qué contiene:</strong> Número de ticket, título y fecha de creación.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-user-check text-info"></i> <strong>Ticket Asignado</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Cuando un administrador se responsabiliza de tu ticket.<br>
                        <strong>Por qué:</strong> Para que sepas quién está trabajando en tu solicitud.<br>
                        <strong>Qué contiene:</strong> Nombre del administrador asignado.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-cog text-primary"></i> <strong>Cambio de Estado</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Cada vez que el estado del ticket cambia.<br>
                        <strong>Por qué:</strong> Para que sigas el progreso de tu solicitud.<br>
                        <strong>Qué contiene:</strong> El estado anterior y el nuevo estado.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-pause-circle text-warning"></i> <strong>Información Solicitada</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Cuando un administrador necesita más detalles tuyos.<br>
                        <strong>Por qué:</strong> Para que no pierdas la información importante que piden.<br>
                        <strong>Qué contiene:</strong> Un resumen de qué información se necesita.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-comments text-secondary"></i> <strong>Nuevo Comentario</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Cada vez que un administrador responde en tu ticket.<br>
                        <strong>Por qué:</strong> Para que no pierdas ninguna respuesta importante.<br>
                        <strong>Qué contiene:</strong> Un resumen del comentario o el comentario completo.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-check-circle text-success"></i> <strong>Ticket Resuelto</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Cuando el administrador marca tu ticket como resuelto.<br>
                        <strong>Por qué:</strong> Para que verifiques que la solución es satisfactoria.<br>
                        <strong>Qué contiene:</strong> Resumen de la solución implementada.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-lock text-danger"></i> <strong>Ticket Cerrado</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Cuando se cierra finalmente el ticket.<br>
                        <strong>Por qué:</strong> Para tu registro y confirmación de finalización.<br>
                        <strong>Qué contiene:</strong> Información de cierre y fecha.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-unlock text-info"></i> <strong>Ticket Reabierto</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Cuándo:</strong> Si reabriste un ticket porque la solución no fue adecuada.<br>
                        <strong>Por qué:</strong> Para confirmar que tu solicitud será reinvestigada.<br>
                        <strong>Qué contiene:</strong> Razón de la reapertura.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- DÓNDE VER LAS NOTIFICACIONES --}}
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-location-arrow mr-2"></i>
                Dónde y Cómo Ver tus Notificaciones
            </h3>
        </div>
        <div class="card-body">
            <p>
                Hay varios lugares donde puedes acceder a tus notificaciones:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-bell"></i> <strong>Centro de Notificaciones</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        <strong>Ubicación:</strong> Menú lateral → "Notificaciones"
                    </p>
                    <p class="text-muted text-sm mb-2">
                        <strong>Qué verás:</strong> Lista completa de todas tus notificaciones.
                    </p>
                    <p class="text-muted text-sm">
                        <strong>Funciones:</strong>
                    </p>
                    <ul style="font-size: 0.85em;">
                        <li>Ver todas las notificaciones</li>
                        <li>Marcar como leídas</li>
                        <li>Filtrar por tipo</li>
                        <li>Acceder al ticket directamente</li>
                    </ul>

                    <h6 class="mt-3"><i class="fas fa-bell-slash"></i> <strong>Icono de Campana</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        <strong>Ubicación:</strong> Esquina superior derecha (barra de navegación)
                    </p>
                    <p class="text-muted text-sm mb-2">
                        <strong>Qué verás:</strong> Un contador con notificaciones no leídas.
                    </p>
                    <p class="text-muted text-sm">
                        <strong>Función:</strong> Acceso rápido a tus notificaciones sin abrir la página completa.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-envelope"></i> <strong>Correo Electrónico</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        <strong>Funciona así:</strong> Algunas notificaciones importantes se envían también por correo.
                    </p>
                    <p class="text-muted text-sm mb-2">
                        <strong>Cuáles:</strong> Notificaciones críticas (ticket asignado, información solicitada, etc.)
                    </p>
                    <p class="text-muted text-sm">
                        <strong>Ventaja:</strong> Recibes el aviso incluso si no estás en la plataforma.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-desktop"></i> <strong>Dashboard</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        <strong>Ubicación:</strong> Página principal después de iniciar sesión
                    </p>
                    <p class="text-muted text-sm">
                        <strong>Qué verás:</strong> Un widget con notificaciones recientes.
                    </p>
                </div>
            </div>

            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Consejo:</strong> Revisa el Centro de Notificaciones regularmente 
                para no perderte ningún aviso importante sobre tus tickets.
            </div>
        </div>
    </div>

    {{-- GESTIÓN DE NOTIFICACIONES --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-sliders-h mr-2"></i>
                Gestión y Control de Notificaciones
            </h3>
        </div>
        <div class="card-body">
            <p>
                Tienes opciones para controlar cómo y cuándo recibes notificaciones:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><strong>Marcar como Leída</strong></h6>
                    <p class="text-muted text-sm">
                        Una vez que lees una notificación, puedes marcarla como "leída" 
                        para saber que ya la has visto. Las notificaciones leídas se mostrarán 
                        de forma diferente (menos prominentes).
                    </p>

                    <h6 class="mt-3"><strong>Marcar como No Leída</strong></h6>
                    <p class="text-muted text-sm">
                        Si necesitas recordar una notificación, puedes marcarla como "no leída" 
                        nuevamente para que destaque en tu lista.
                    </p>

                    <h6 class="mt-3"><strong>Eliminar Notificaciones</strong></h6>
                    <p class="text-muted text-sm">
                        Puedes eliminar notificaciones antiguas que ya no necesites. 
                        Esto no afecta al ticket, solo limpia tu bandeja.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><strong>Filtrar por Tipo</strong></h6>
                    <p class="text-muted text-sm">
                        En el Centro de Notificaciones, puedes filtrar para ver solo 
                        ciertos tipos (cambios de estado, comentarios, etc.)
                    </p>

                    <h6 class="mt-3"><strong>Buscar Notificaciones</strong></h6>
                    <p class="text-muted text-sm">
                        Puedes buscar notificaciones por palabras clave para encontrar 
                        información específica que necesites.
                    </p>

                    <h6 class="mt-3"><strong>Preferencias (Próximamente)</strong></h6>
                    <p class="text-muted text-sm">
                        En futuras versiones, podrás personalizar qué tipo de notificaciones 
                        deseas recibir y por qué canales.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- IMPORTANCIA Y RECOMENDACIONES --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-info-circle mr-2"></i>
                ¿Por Qué Son Importantes las Notificaciones?
            </h3>
        </div>
        <div class="card-body">
            <p>
                Las notificaciones son cruciales para el funcionamiento efectivo del sistema:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-check text-success"></i> <strong>Beneficios para Ti:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>No tendrás que estar revisando manualmente</li>
                        <li>Recibirás avisos inmediatos de cambios</li>
                        <li>Podrás responder rápidamente</li>
                        <li>Evitarás perder información importante</li>
                        <li>Tendrás control total de tus solicitudes</li>
                        <li>Sabrás exactamente cuándo actuar</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-check text-success"></i> <strong>Impacto en la Resolución:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Respuestas más rápidas al equipo</li>
                        <li>Menos esperas innecesarias</li>
                        <li>Tickets resueltos más rápidamente</li>
                        <li>Mejor comunicación en general</li>
                        <li>Menos malentendidos</li>
                        <li>Mayor satisfacción general</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- MEJORES PRÁCTICAS --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-star mr-2"></i>
                Mejores Prácticas con Notificaciones
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-check"></i> <strong>SÍ Deberías:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Revisar notificaciones regularmente</li>
                        <li>Leer completamente cada notificación</li>
                        <li>Responder rápidamente si se requiere</li>
                        <li>Seguir los enlaces al ticket</li>
                        <li>Mantener tu correo actualizado</li>
                        <li>Marcar como leídas las notificaciones vistas</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-times"></i> <strong>NO Deberías:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Ignorar notificaciones durante días</li>
                        <li>Borrar notificaciones sin leerlas</li>
                        <li>Confiar solo en notificaciones por email</li>
                        <li>Asumir que entendiste sin leer</li>
                        <li>Esperar a que se repita si no viste</li>
                        <li>Cambiar tu correo sin actualizar el sistema</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- QUÉ HACER CUANDO RECIBES UNA NOTIFICACIÓN --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-question-circle mr-2"></i>
                Guía: Qué Hacer Cuando Recibes una Notificación
            </h3>
        </div>
        <div class="card-body">
            <p>
                Aquí te mostramos qué deberías hacer cuando recibes cada tipo de notificación:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><strong>Notificación de "Información Solicitada"</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Lee completamente la notificación</li>
                        <li>Accede al ticket directamente</li>
                        <li>Lee el comentario del administrador</li>
                        <li>Reúne la información solicitada</li>
                        <li>Responde en el apartado de comentarios</li>
                        <li>Marca la notificación como leída</li>
                    </ol>

                    <h6 class="mt-3"><strong>Notificación de "Cambio de Estado"</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Lee la notificación</li>
                        <li>Abre el ticket</li>
                        <li>Verifica el nuevo estado</li>
                        <li>Lee los comentarios asociados</li>
                        <li>Responde si es necesario</li>
                        <li>Marca como leída</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <h6><strong>Notificación de "Nuevo Comentario"</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Lee la notificación</li>
                        <li>Accede al ticket</li>
                        <li>Lee el comentario completo</li>
                        <li>Entiende lo que se comunica</li>
                        <li>Responde si es necesario</li>
                        <li>Marca como leída</li>
                    </ol>

                    <h6 class="mt-3"><strong>Notificación de "Ticket Resuelto"</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Lee la notificación</li>
                        <li>Abre el ticket</li>
                        <li>Verifica que la solución funciona</li>
                        <li>Si funciona, confirma en comentario</li>
                        <li>Si NO funciona, reabre el ticket</li>
                        <li>Marca como leída</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- PROBLEMAS COMUNES --}}
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Problemas Comunes y Soluciones
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><strong>❌ "No recibo notificaciones por correo"</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Comprueba:</strong> Que el correo esté actualizado en tu perfil, 
                        que no esté en carpeta de spam, que no hayas desactivado notificaciones.
                    </p>

                    <h6 class="mt-3"><strong>❌ "Olvidé una notificación"</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Solución:</strong> Revisa el Centro de Notificaciones, 
                        abre el ticket mencionado y lee el último comentario.
                    </p>

                    <h6 class="mt-3"><strong>❌ "Recibo demasiadas notificaciones"</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Consejo:</strong> Esto es normal si tienes muchos tickets activos. 
                        Marca como leídas las que no requieren acción.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><strong>❌ "Una notificación no tiene sentido"</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Qué hacer:</strong> Abre el ticket completo para entender el contexto. 
                        Si aún no entiendes, pregunta en un comentario.
                    </p>

                    <h6 class="mt-3"><strong>❌ "Cambié mi correo y no recibo notificaciones"</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Solución:</strong> Actualiza tu correo en tu perfil 
                        en la plataforma para recibir notificaciones nuevamente.
                    </p>

                    <h6 class="mt-3"><strong>❌ "No veo el Centro de Notificaciones"</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Solución:</strong> Haz clic en el icono de campana (🔔) 
                        en la esquina superior derecha de la página.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- RESUMEN FINAL --}}
    <div class="card card-outline card-light">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-summary"></i>
                Resumen Rápido
            </h3>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Las notificaciones te avisan</strong> de cambios en tus tickets automáticamente</li>
                <li><strong>Las recibes</strong> en la plataforma y por correo (según configuración)</li>
                <li><strong>Tipos principales:</strong> Cambios de estado, comentarios nuevos, información solicitada</li>
                <li><strong>Dónde verlas:</strong> Centro de Notificaciones, icono de campana, o email</li>
                <li><strong>Qué hacer:</strong> Leerlas, responder si es necesario, marcar como leídas</li>
                <li><strong>Beneficio:</strong> Resuelve tus problemas 3-5 veces más rápido</li>
            </ul>
        </div>
    </div>

    {{-- CONSEJO FINAL --}}
    <div class="alert alert-success mt-4">
        <i class="fas fa-check-circle mr-2"></i>
        <strong>Consejo de Oro:</strong> Revisa tus notificaciones al menos una vez al día. 
        Responde rápidamente a las solicitudes de información. 
        Esto acelera dramáticamente la resolución de tus problemas.
    </div>

</div>
@endsection
