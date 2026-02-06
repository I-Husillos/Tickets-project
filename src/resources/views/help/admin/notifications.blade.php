@extends('layouts.admin')

@section('title', 'Ayuda · Notificaciones')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>
                <i class="fas fa-bell"></i>
                Guía Completa de Notificaciones para Administradores
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

        {{-- QUÉ SON EXPANDIDO --}}
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h4>
                    <i class="fas fa-info-circle"></i>
                    ¿Qué son las Notificaciones para Administradores?
                </h4>
                <p class="mt-3">
                    Las notificaciones son avisos automáticos que el sistema genera 
                    para informarte sobre eventos importantes que requieren atención 
                    o seguimiento por tu parte.
                </p>
                <p class="mt-3">
                    Como administrador, debes estar al tanto de eventos críticos en tickets asignados a ti 
                    o en el sistema en general. Las notificaciones evitan que tengas que estar 
                    constantemente revisando manualmente, permitiéndote trabajar de forma más eficiente.
                </p>
                <p class="mt-3">
                    <strong>En resumen:</strong> Las notificaciones te permiten reaccionar 
                    rápidamente a cambios importantes sin estar pendiente todo el tiempo.
                </p>
            </div>
        </div>

        {{-- TIPOS DE EVENTOS --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bolt"></i>
                    Tipos Completos de Eventos que Generan Notificaciones
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Estos son todos los eventos que generan notificaciones para administradores:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><i class="fas fa-ticket-alt text-info"></i> <strong>Ticket Asignado a Ti</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Cuando alguien (tú o un superadmin) te asigna un ticket.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Por qué:</strong> Para que sepas que tienes un nuevo ticket que gestionar.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Abre el ticket, revisa la descripción y comienza a trabajar.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-comment-dots text-success"></i> <strong>Nuevo Comentario del Usuario</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Cada vez que un usuario responde en un ticket tuyo.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Por qué:</strong> Para que no pierdas respuestas importantes de usuarios.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Lee el comentario y responde si es necesario.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-exchange-alt text-warning"></i> <strong>Cambio de Estado en Tu Ticket</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Si alguien más cambia el estado de un ticket tuyo.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Por qué:</strong> Para mantenerte sincronizado con cambios que no hiciste tú.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Abre el ticket y revisa qué cambió y por qué.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-user-plus text-primary"></i> <strong>Usuario Agregado Como Comentarista</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Si se agrega un usuario específico mencionándote en un comentario.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Por qué:</strong> Para notificaciones específicas a ciertos administradores.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Revisa el comentario relevante inmediatamente.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-check-circle text-success"></i> <strong>Ticket Resuelto/Cerrado</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Cuando un ticket que gestionabas es resuelto o cerrado.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Por qué:</strong> Para que sepas que uno de tus tickets se ha completado.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Verifica que esté correctamente cerrado. Si no, reabre.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-exclamation-triangle text-danger"></i> <strong>Ticket Reabierto</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuándo:</strong> Si un usuario reabre un ticket que habías cerrado.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Por qué:</strong> Porque la solución no fue satisfactoria.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Acción:</strong> Reinvestiga el problema con nueva información.
                        </p>
                    </div>
                </div>

                <div class="alert alert-warning mt-3">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <strong>Importante para superadmins:</strong> También recibirás notificaciones 
                    sobre cambios globales del sistema (nuevos administradores, tipos modificados, etc.)
                </div>
            </div>
        </div>

        {{-- CANALES DE NOTIFICACIÓN --}}
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-envelope"></i>
                    Canales de Notificación
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Las notificaciones se pueden recibir a través de varios canales:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><i class="fas fa-bell"></i> <strong>Centro de Notificaciones (En Plataforma)</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Acceso:</strong> Haz clic en el icono de campana en la barra superior.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Qué verás:</strong> Lista completa de todas tus notificaciones sin leer.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Ventaja:</strong> Acceso inmediato sin abandonar la plataforma.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-list"></i> <strong>Página de Notificaciones</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Acceso:</strong> Menú lateral → "Notificaciones"
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Qué verás:</strong> Vista completa con filtros, búsqueda y gestión avanzada.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Ventaja:</strong> Control total sobre tus notificaciones.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-envelope"></i> <strong>Correo Electrónico</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Funciona así:</strong> Notificaciones críticas se envían por email también.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Cuáles eventos:</strong> Ticket asignado, usuario responde, reapertura.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Ventaja:</strong> Recibe avisos incluso fuera de la plataforma.
                        </p>

                        <h6 class="mt-3"><i class="fas fa-dashboard"></i> <strong>Dashboard</strong></h6>
                        <p class="text-muted text-sm mb-2">
                            <strong>Ubicación:</strong> Widget en la página principal del admin.
                        </p>
                        <p class="text-muted text-sm mb-2">
                            <strong>Qué muestra:</strong> Resumen rápido de notificaciones recientes.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Ventaja:</strong> Visibilidad inmediata al iniciar sesión.
                        </p>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Nota técnica:</strong> El envío de correos se realiza mediante colas asincrónicas 
                    para no afectar al rendimiento de la plataforma. Esto significa que algunos emails 
                    podrían tener un pequeño retraso (máximo unos minutos).
                </div>
            </div>
        </div>

        {{-- GESTIÓN DE NOTIFICACIONES --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-sliders-h"></i>
                    Gestión y Control de Notificaciones
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Tienes varias opciones para controlar y gestionar tus notificaciones:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Marcar como Leída</strong></h6>
                        <p class="text-muted text-sm">
                            Una vez que lees una notificación, puedes marcarla como "leída" 
                            para saber que ya la procesaste. Las notificaciones leídas aparecen de forma diferente.
                        </p>

                        <h6 class="mt-3"><strong>Marcar como No Leída</strong></h6>
                        <p class="text-muted text-sm">
                            Si necesitas recordar una notificación, marca como "no leída" nuevamente 
                            para que destaque en tu lista.
                        </p>

                        <h6 class="mt-3"><strong>Marcar Todas como Leídas</strong></h6>
                        <p class="text-muted text-sm">
                            Existe un botón para marcar todas las notificaciones como leídas de una vez. 
                            Útil cuando tienes muchas acumuladas.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Filtrar por Tipo</strong></h6>
                        <p class="text-muted text-sm">
                            En la página de notificaciones puedes filtrar para ver solo 
                            ciertos tipos (tickets asignados, comentarios, cambios, etc.)
                        </p>

                        <h6 class="mt-3"><strong>Buscar Notificaciones</strong></h6>
                        <p class="text-muted text-sm">
                            Usa la barra de búsqueda para encontrar notificaciones específicas 
                            por palabras clave.
                        </p>

                        <h6 class="mt-3"><strong>Acceder al Ticket Directamente</strong></h6>
                        <p class="text-muted text-sm">
                            Cada notificación tiene un enlace directo al ticket mencionado. 
                            Haz clic para abrirlo inmediatamente.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- FLUJO DE TRABAJO CON NOTIFICACIONES --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-diagram-project"></i>
                    Flujo de Trabajo Recomendado con Notificaciones
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Aquí está el flujo recomendado para manejo eficiente de notificaciones:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Cada Vez que Recibes una Notificación:</strong></h6>
                        <ol style="font-size: 0.9em;">
                            <li>
                                <strong>Recibe el aviso:</strong> En plataforma y/o email
                            </li>
                            <li>
                                <strong>Lee la notificación:</strong> Comprende qué evento ocurrió
                            </li>
                            <li>
                                <strong>Abre el ticket:</strong> Haz clic en el enlace
                            </li>
                            <li>
                                <strong>Revisa el contexto:</strong> Lee comentarios, estado actual, etc.
                            </li>
                            <li>
                                <strong>Actúa:</strong> Responde, actualiza estado, etc.
                            </li>
                            <li>
                                <strong>Marca como leída:</strong> Para saber que la procesaste
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Rutina Diaria:</strong></h6>
                        <ol style="font-size: 0.9em;">
                            <li>
                                <strong>Mañana:</strong> Abre plataforma, revisa notificaciones
                            </li>
                            <li>
                                <strong>Procesa urgentes:</strong> Tickets críticos primero
                            </li>
                            <li>
                                <strong>Durante el día:</strong> Responde notificaciones según llegan
                            </li>
                            <li>
                                <strong>Mantén orden:</strong> Marca como leídas las procesadas
                            </li>
                            <li>
                                <strong>Antes de terminar:</strong> Revisa notificaciones pendientes
                            </li>
                            <li>
                                <strong>Fin de día:</strong> Documenta en tickets lo que quedó pendiente
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Tiempos de respuesta:</strong> Intenta responder notificaciones 
                    dentro de 24 horas para mantener la efectividad del sistema.
                </div>
            </div>
        </div>

        {{-- IMPORTANCIA PARA USUARIOS --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-heart"></i>
                    Por Qué es Crítico Responder Notificaciones Rápido
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Tu respuesta rápida a las notificaciones impacta directamente en:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><i class="fas fa-check text-success"></i> <strong>Experiencia del Usuario:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>Sentido de progreso en su solicitud</li>
                            <li>Confianza en el sistema</li>
                            <li>Satisfacción con el servicio</li>
                            <li>Disposición a usar el sistema nuevamente</li>
                            <li>Testimonios positivos</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-chart-line text-primary"></i> <strong>Eficiencia Operacional:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>Resolución más rápida de tickets</li>
                            <li>Menos idas y venidas</li>
                            <li>Mejor carga de trabajo</li>
                            <li>Documentación más completa</li>
                            <li>Menos tickets pendientes</li>
                        </ul>
                    </div>
                </div>

                <p class="mt-3">
                    <strong>Regla de Oro:</strong> Un ticket que recibe una respuesta en 24 horas 
                    se resuelve 5 veces más rápido que uno que espera 3 días.
                </p>
            </div>
        </div>

        {{-- MEJORES PRÁCTICAS --}}
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-star"></i>
                    Mejores Prácticas y Estándares
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-check"></i> <strong>SÍ Deberías:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>Revisar notificaciones diariamente</li>
                            <li>Responder en máximo 24 horas</li>
                            <li>Marcar como leídas tras procesarlas</li>
                            <li>Usar filtros para priorizar</li>
                            <li>Acceder al ticket desde la notificación</li>
                            <li>Mantener tu email actualizado</li>
                            <li>Comunicar retrasos si es necesario</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-times"></i> <strong>NO Deberías:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>Ignorar notificaciones durante días</li>
                            <li>Borrar sin revisar</li>
                            <li>Asumir que entendiste sin leer</li>
                            <li>Dejar notificaciones sin procesar</li>
                            <li>Cambiar email sin actualizar sistema</li>
                            <li>Confiar solo en email (pueden ir a spam)</li>
                            <li>Responder sin leer contexto completo</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- PROBLEMAS COMUNES --}}
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Problemas Comunes y Soluciones
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>❌ "Recibo demasiadas notificaciones"</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Es normal si tienes muchos tickets activos. 
                            Usa filtros, marca como leídas las procesadas, y organízate por prioridad.
                        </p>

                        <h6 class="mt-3"><strong>❌ "No recibo notificaciones por email"</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Comprueba:</strong> Que tu email esté correcto en el perfil, 
                            que no estén en spam, que no hayas desactivado notificaciones.
                        </p>

                        <h6 class="mt-3"><strong>❌ "Perdí una notificación importante"</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Ve al Centro de Notificaciones y busca el ticket. 
                            Los eventos quedan registrados aunque borres la notificación.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>❌ "Las notificaciones tienen retraso"</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Normal:</strong> El envío de email puede tener 1-5 minutos de retraso. 
                            Las del sistema son instantáneas.
                        </p>

                        <h6 class="mt-3"><strong>❌ "Mi notificación no tiene contexto"</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Haz clic en el enlace para abrir el ticket y leer el contexto completo.
                        </p>

                        <h6 class="mt-3"><strong>❌ "Notificación sobre un ticket cerrado"</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Análisis:</strong> Probablemente sea un usuario que reabrió el ticket. 
                            Abrelo y revisa qué cambió.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- RESUMEN --}}
        <div class="card card-outline card-light">
            <div class="card-body">
                <h5>
                    <i class="fas fa-summary"></i>
                    Resumen Ejecutivo
                </h5>
                <ul>
                    <li><strong>Las notificaciones te alertan</strong> sobre eventos importantes automáticamente</li>
                    <li><strong>Las recibes en:</strong> Plataforma, email, y dashboard</li>
                    <li><strong>Tipos principales:</strong> Ticket asignado, comentario nuevo, cambio de estado</li>
                    <li><strong>Tu responsabilidad:</strong> Procesarlas en máximo 24 horas</li>
                    <li><strong>Impacto:</strong> Tu rapidez afecta satisfacción y velocidad de resolución</li>
                    <li><strong>Regla clave:</strong> Respuesta en 24h = 5x más rápido de resolver</li>
                </ul>
            </div>
        </div>

        {{-- AVISO FINAL --}}
        <div class="alert alert-danger mt-4">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <strong>Crítico:</strong> Ignorar notificaciones durante días provoca retrasos en la resolución 
            de incidencias, afecta la experiencia del usuario, y puede resultar en escaladas. 
            Revisa notificaciones diariamente y responde en máximo 24 horas.
        </div>

    </div>
@endsection
