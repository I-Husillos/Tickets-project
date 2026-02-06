@extends('layouts.admin')

@section('title', 'Ayuda · Introducción')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-info-circle"></i>
                    Introducción Completa al Panel de Administración
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
@endsection

@section('admincontent')
<div class="container-fluid">

    {{-- BIENVENIDA EXPANDIDA --}}
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h4>
                <i class="fas fa-user-shield"></i>
                Bienvenido al Panel de Administración
            </h4>

            <p class="mt-3">
                Este panel ha sido diseñado específicamente para que los administradores 
                puedan gestionar eficientemente todas las operaciones del sistema:
            </p>
            <ul>
                <li><strong>Gestión de tickets:</strong> Recibir, asignar, actualizar y resolver incidencias de usuarios</li>
                <li><strong>Comunicación directa:</strong> Responder a usuarios mediante un sistema de comentarios integrado</li>
                <li><strong>Supervisión del sistema:</strong> Monitorear la actividad, ver estadísticas y auditoría completa</li>
                <li><strong>Gestión de usuarios:</strong> Crear, editar, eliminar cuentas (según permisos)</li>
                <li><strong>Gestión administrativa:</strong> Administrar otros administradores y su acceso (solo superadmin)</li>
                <li><strong>Control de categorías:</strong> Personalizar los tipos de ticket disponibles (solo superadmin)</li>
            </ul>

            <p class="mt-3">
                Tu rol dentro del sistema determina exactamente qué puedes y no puedes hacer. 
                Lee la sección de permisos para entender todas tus capacidades.
            </p>
        </div>
    </div>

    {{-- ROLES Y PERMISOS - EXPANDIDO --}}
    <div class="row">

        {{-- ADMIN NORMAL --}}
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-cog"></i>
                        Administrador (Rol Normal)
                    </h3>
                </div>
                <div class="card-body">
                    <p><strong>Descripción:</strong> Un administrador regular puede gestionar tickets asignados a él.</p>

                    <p class="mt-3"><strong>Lo que SÍ Puedes Hacer:</strong></p>
                    <ul class="small">
                        <li><i class="fas fa-check text-success"></i> Ver los tickets asignados a ti</li>
                        <li><i class="fas fa-check text-success"></i> Responder a usuarios mediante comentarios</li>
                        <li><i class="fas fa-check text-success"></i> Cambiar el estado de tus tickets (nuevo, en proceso, resuelto, cerrado)</li>
                        <li><i class="fas fa-check text-success"></i> Asignarte nuevos tickets del sistema</li>
                        <li><i class="fas fa-check text-success"></i> Consultar el historial de eventos del sistema</li>
                        <li><i class="fas fa-check text-success"></i> Ver tus notificaciones y marcarlas como leídas</li>
                        <li><i class="fas fa-check text-success"></i> Acceder a tu perfil y cambiar contraseña</li>
                    </ul>

                    <p class="text-muted mt-3 mb-0">
                        <strong>Restricciones:</strong> No tiene acceso a la gestión de usuarios, 
                        administradores, tipos de ticket ni estadísticas globales.
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
                    <p><strong>Descripción:</strong> Un superadministrador tiene acceso completo a todas las funciones.</p>

                    <p class="mt-3"><strong>Acceso Completo a:</strong></p>
                    <ul class="small">
                        <li><i class="fas fa-check text-success"></i> Todas las funciones del administrador regular</li>
                        <li><i class="fas fa-check text-success"></i> Ver y gestionar TODOS los tickets del sistema</li>
                        <li><i class="fas fa-check text-success"></i> Gestionar usuarios (crear, editar, eliminar cuentas)</li>
                        <li><i class="fas fa-check text-success"></i> Gestionar otros administradores (crear, modificar permisos)</li>
                        <li><i class="fas fa-check text-success"></i> Crear y editar tipos de tickets</li>
                        <li><i class="fas fa-check text-success"></i> Ver estadísticas avanzadas del sistema</li>
                        <li><i class="fas fa-check text-success"></i> Auditoría completa del historial de eventos</li>
                        <li><i class="fas fa-check text-success"></i> Configuración global del sistema</li>
                    </ul>

                    <p class="text-muted mt-3 mb-0">
                        <strong>Responsabilidad:</strong> Con grandes poderes vienen grandes responsabilidades. 
                        Todas tus acciones quedan registradas.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- RESPONSABILIDADES PRINCIPALES - EXPANDIDO --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tasks"></i>
                Responsabilidades Principales del Administrador
            </h3>
        </div>
        <div class="card-body">
            <p>
                Como administrador, serás responsable de mantener el sistema funcionando 
                de forma eficiente y mantener a los usuarios satisfechos. Tus tareas diarias incluyen:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-check-circle text-primary"></i> <strong>Gestión de Tickets</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Revisar nuevos tickets entrantes</li>
                        <li>Asignarte los que vayas a gestionar</li>
                        <li>Actualizar el estado según el progreso</li>
                        <li>Resolver incidencias en el plazo acordado</li>
                        <li>Cerrar tickets confirmados con usuarios</li>
                    </ul>

                    <h6 class="mt-3"><i class="fas fa-comments text-success"></i> <strong>Comunicación</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Responder a usuarios con profesionalidad</li>
                        <li>Solicitar información adicional si es necesario</li>
                        <li>Explicar decisiones de forma clara</li>
                        <li>Mantener un tono respetuoso y empático</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-file-alt text-warning"></i> <strong>Documentación</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Registrar el trabajo realizado en comentarios</li>
                        <li>Dejar rastro para auditoría</li>
                        <li>Documentar decisiones y razones</li>
                        <li>Anotar pasos seguidos en la resolución</li>
                    </ul>

                    <h6 class="mt-3"><i class="fas fa-chart-line text-info"></i> <strong>Monitoreo</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Revisar notificaciones regularmente</li>
                        <li>Mantener tickets actualizados</li>
                        <li>Evitar que tickets se queden atascados</li>
                        <li>Cumplir con SLAs establecidos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- WORKFLOW RECOMENDADO --}}
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-diagram-project"></i>
                Flujo de Trabajo Recomendado
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><strong>Inicio del Día:</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Abre el Dashboard para ver estadísticas generales</li>
                        <li>Revisa tus notificaciones pendientes</li>
                        <li>Consulta los tickets nuevos en el sistema</li>
                        <li>Asígnate los que vas a trabajar hoy</li>
                    </ol>

                    <h6 class="mt-3"><strong>Durante el Día:</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Trabaja en los tickets asignados</li>
                        <li>Comunícate con usuarios mediante comentarios</li>
                        <li>Actualiza el estado según el progreso</li>
                        <li>Revisa nuevas notificaciones periódicamente</li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <h6><strong>Para cada Ticket:</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Lee completamente el ticket y su historial</li>
                        <li>Entiende qué necesita exactamente el usuario</li>
                        <li>Solicita información si algo no está claro</li>
                        <li>Trabaja en la solución</li>
                        <li>Comunica el resultado</li>
                        <li>Cierra cuando esté confirmado</li>
                    </ol>

                    <h6 class="mt-3"><strong>Fin del Día:</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Revisa si hay tickets pendientes importantes</li>
                        <li>Documenta lo que quedó en progreso</li>
                        <li>Deja notas para otros administradores si es necesario</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- SECCIONES DEL PANEL - DETALLADO --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-map"></i>
                Secciones Principales del Panel
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h6><i class="fas fa-tachometer-alt"></i> <strong>Dashboard</strong></h6>
                    <p class="text-muted text-sm">
                        Vista general del sistema con estadísticas, 
                        tickets recientes y actividad general. Perfecto para tener 
                        una visión rápida del estado del sistema.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6><i class="fas fa-ticket-alt"></i> <strong>Gestión de Tickets</strong></h6>
                    <p class="text-muted text-sm">
                        Área principal donde verás todos los tickets, 
                        filtrarás por estado/prioridad, asignarás tickets 
                        y gestionarás su ciclo de vida.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6><i class="fas fa-bell"></i> <strong>Notificaciones</strong></h6>
                    <p class="text-muted text-sm">
                        Centro de notificaciones donde verás eventos importantes 
                        del sistema, cambios en tickets y acciones que requieren tu atención.
                    </p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <h6><i class="fas fa-users"></i> <strong>Gestión de Usuarios</strong></h6>
                    <p class="text-muted text-sm">
                        (Solo visible para Superadmin) Aquí gestionas las cuentas de usuarios: 
                        crear, editar, eliminar, ver detalles de registro.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6><i class="fas fa-shield-alt"></i> <strong>Gestión de Admins</strong></h6>
                    <p class="text-muted text-sm">
                        (Solo visible para Superadmin) Controlar otros administradores, 
                        sus permisos y roles dentro del sistema.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6><i class="fas fa-list"></i> <strong>Tipos de Ticket</strong></h6>
                    <p class="text-muted text-sm">
                        (Solo visible para Superadmin) Personalizar las categorías 
                        disponibles para clasificar tickets.
                    </p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-history"></i> <strong>Historial de Eventos</strong></h6>
                    <p class="text-muted text-sm">
                        Auditoría completa de todas las acciones en el sistema. 
                        Puedes filtrar por usuario, tipo de evento, fecha, etc. 
                        Crucial para seguridad y cumplimiento normativo.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-user-circle"></i> <strong>Mi Perfil</strong></h6>
                    <p class="text-muted text-sm">
                        Gestionar tu cuenta administrativa: cambiar contraseña, 
                        ver información de acceso, notificaciones personales, etc.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ESTADOS DE TICKET PARA ADMIN --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-sync-alt"></i>
                Estados de Ticket y Cómo Gestionarlos
            </h3>
        </div>
        <div class="card-body">
            <p>
                Como administrador, tendrás control total sobre los estados de los tickets. 
                Aquí se explica cada estado y cuándo deberías usarlo:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><i class="fas fa-star text-warning"></i> <strong>Nuevo</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            El ticket acaba de ser creado por el usuario. 
                            Está esperando revisión y asignación inicial.
                        </p>
                        <small class="text-info"><strong>Acción:</strong> Asígnate el ticket y cambia a "En proceso" o "Pendiente información"</small>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-cog text-primary"></i> <strong>En Proceso</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            Estás trabajando activamente en resolver el ticket.
                        </p>
                        <small class="text-info"><strong>Acción:</strong> Cuando resuelves, comunica la solución y cambia a "Resuelto"</small>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-pause-circle text-warning"></i> <strong>Pendiente Información</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            Necesitas que el usuario proporcione detalles adicionales.
                        </p>
                        <small class="text-info"><strong>Acción:</strong> Añade un comentario explicando qué información necesitas</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><i class="fas fa-check-circle text-success"></i> <strong>Resuelto</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            Consideras que el ticket ha sido completamente resuelto.
                        </p>
                        <small class="text-info"><strong>Acción:</strong> Comunica la solución al usuario y marca como "Resuelto"</small>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-lock text-danger"></i> <strong>Cerrado</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            El ticket está completamente finalizado. No se pueden añadir más comentarios.
                        </p>
                        <small class="text-info"><strong>Acción:</strong> Solo cierra cuando el usuario ha confirmado la solución</small>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-unlock text-info"></i> <strong>Reabierto</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            Un usuario ha reabierto un ticket cerrado porque la solución no fue satisfactoria.
                        </p>
                        <small class="text-info"><strong>Acción:</strong> Reinvestiga y resuelve nuevamente</small>
                    </div>
                </div>
            </div>

            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Consejo:</strong> El flujo típico es: Nuevo → En Proceso → Resuelto → Cerrado. 
                Usa "Pendiente Información" si necesitas datos del usuario.
            </div>
        </div>
    </div>

    {{-- PRIORIDADES --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-fire"></i>
                Niveles de Prioridad y Cómo Tratarlos
            </h3>
        </div>
        <div class="card-body">
            <p>
                Cada ticket tiene un nivel de prioridad que indica qué tan rápido debe resolverse. 
                Como administrador, debes respetar y gestionar estas prioridades:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><i class="fas fa-arrow-down text-success"></i> <strong>Baja</strong></h6>
                        <p class="text-muted text-sm">
                            El usuario puede esperar 2 o más semanas por una respuesta. 
                            Útil para solicitudes no urgentes, sugerencias o mejoras.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-arrow-right text-info"></i> <strong>Normal</strong></h6>
                        <p class="text-muted text-sm">
                            Se espera una atención dentro de 1-2 semanas. 
                            La mayoría de tickets funcionarán con esta prioridad.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><i class="fas fa-arrow-up text-warning"></i> <strong>Alta</strong></h6>
                        <p class="text-muted text-sm">
                            Requiere atención dentro de 3-5 días. 
                            El usuario reporta un problema que le impide trabajar normalmente.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-exclamation-triangle text-danger"></i> <strong>Urgente</strong></h6>
                        <p class="text-muted text-sm">
                            Requiere atención inmediata. El usuario reporta un problema crítico 
                            que le impide completamente su trabajo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="alert alert-warning mt-3">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <strong>Importante:</strong> Respeta las prioridades. Si muchos tickets son marcados 
                como urgentes, el sistema perderá credibilidad. Los usuarios deben ser honestos, 
                y tú debes responder según la prioridad real.
            </div>
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
                    <h6><i class="fas fa-clock"></i> <strong>Tiempos de Respuesta</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Urgente: Dentro de 24 horas</li>
                        <li>Alta: Dentro de 2-3 días</li>
                        <li>Normal: Dentro de una semana</li>
                        <li>Baja: Dentro de dos semanas</li>
                    </ul>

                    <h6 class="mt-3"><i class="fas fa-pencil-alt"></i> <strong>En Comentarios</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Sé profesional y respetuoso</li>
                        <li>Sé específico y detallado</li>
                        <li>Proporciona pasos claros si hay acciones a seguir</li>
                        <li>Ofrece alternativas cuando sea posible</li>
                        <li>Explica tu razonamiento</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-eye"></i> <strong>En Auditoría</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Documenta todas las decisiones</li>
                        <li>Deja rastro de tu trabajo</li>
                        <li>Sé consistente en tus procesos</li>
                        <li>No hagas cambios sin documentar</li>
                        <li>Consulta el historial antes de actuar</li>
                    </ul>

                    <h6 class="mt-3"><i class="fas fa-users"></i> <strong>En Equipo</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Comunica con otros administradores</li>
                        <li>Pide ayuda cuando sea necesario</li>
                        <li>Comparte conocimiento</li>
                        <li>Reporta problemas recurrentes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- CASOS COMUNES --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-question-circle"></i>
                Situaciones Comunes y Cómo Manejarlas
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><strong>¿Usuario no responde a mis preguntas?</strong></h6>
                    <p class="text-muted text-sm">
                        Envía un recordatorio después de 3-5 días. 
                        Si continúa sin responder durante dos semanas, cierra el ticket con una nota.
                    </p>

                    <h6 class="mt-3"><strong>¿El problema no tiene solución clara?</strong></h6>
                    <p class="text-muted text-sm">
                        Asigna a otro administrador si lo necesitas. 
                        Documenta qué has intentado. Pide ayuda a un superadmin.
                    </p>

                    <h6 class="mt-3"><strong>¿Usuario solicita algo fuera de alcance?</strong></h6>
                    <p class="text-muted text-sm">
                        Explica claramente por qué no puede hacerse. 
                        Proporciona alternativas si existen. Escala a superadmin si es necesario.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><strong>¿Usuario insiste en algo ya rechazado?</strong></h6>
                    <p class="text-muted text-sm">
                        Mantén tu posición amablemente. 
                        Refiere a la decisión anterior documentada. 
                        No cedas a presión.
                    </p>

                    <h6 class="mt-3"><strong>¿Ticket muy complejo?</strong></h6>
                    <p class="text-muted text-sm">
                        Divide en sub-tareas si es posible. 
                        Comunica al usuario que estás investigando. 
                        Actualiza regularmente con el progreso.
                    </p>

                    <h6 class="mt-3"><strong>¿Usuario descontento con la solución?</strong></h6>
                    <p class="text-muted text-sm">
                        Escucha su feedback. 
                        Ofrece alternativas. 
                        Si reabre el ticket, reinvestiga con mente abierta.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- RESTRICCIONES Y LÍMITES --}}
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-ban"></i>
                Lo que NO Debes Hacer como Administrador
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-times text-danger"></i> <strong>Prohibido:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Compartir información de otros usuarios</li>
                        <li>Cambiar contraseñas de usuarios sin autorización</li>
                        <li>Acceder a datos fuera de tus responsabilidades</li>
                        <li>Eliminar registros de forma caprichosa</li>
                        <li>Ser grosero o desresppetuoso con usuarios</li>
                        <li>Cerrar tickets sin confirmar con usuarios</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-eye-slash text-warning"></i> <strong>Evitar:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Dejar tickets sin actualizar durante semanas</li>
                        <li>Hacer promesas que no puedas cumplir</li>
                        <li>Marcar como cerrado sin confirmar</li>
                        <li>Ignorar notificaciones o mensajes urgentes</li>
                        <li>Tomar decisiones sin documentar</li>
                        <li>Trabajar sin comunicación clara con el usuario</li>
                    </ul>
                </div>
            </div>

            <div class="alert alert-danger mt-3">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <strong>Recuerda:</strong> Todas tus acciones están registradas en el historial de eventos. 
                El incumplimiento de políticas de seguridad o malos comportamientos pueden resultar 
                en la pérdida de permisos administrativos.
            </div>
        </div>
    </div>

    {{-- AYUDA ADICIONAL --}}
    <div class="callout callout-info">
        <h5>
            <i class="fas fa-life-ring mr-2"></i>
            ¿Necesitas Más Detalles?
        </h5>
        <p>
            Usa el menú de ayuda para consultar guías específicas y detalladas sobre:
        </p>
        <ul>
            <li><strong>Gestión de Tickets:</strong> Cómo crear, actualizar, asignar y resolver</li>
            <li><strong>Gestión de Usuarios:</strong> Crear cuentas, editar permisos (solo superadmin)</li>
            <li><strong>Notificaciones:</strong> Cómo funcionan y cómo mantenerte informado</li>
            <li><strong>Historial de Eventos:</strong> Cómo usar la auditoría del sistema</li>
        </ul>
    </div>

</div>
@endsection
