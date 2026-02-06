@extends('layouts.admin')

@section('title', 'Ayuda · Historial de Eventos')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-history"></i>
                    Guía Completa del Historial de Eventos
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                            Ayuda
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Historial de Eventos</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('admincontent')
    <div class="container-fluid">

        {{-- QUÉ ES - EXPANDIDO --}}
        <div class="card card-outline card-primary">
            <div class="card-body">
                <h4>
                    <i class="fas fa-info-circle"></i>
                    ¿Qué es el Historial de Eventos?
                </h4>
                <p class="mt-3">
                    El historial de eventos es un registro automático e inmutable 
                    de todas las acciones relevantes realizadas dentro del sistema.
                </p>
                <p class="mt-3">
                    Es como una "caja negra" que captura cada acción importante 
                    que ocurre: quién la hizo, cuándo la hizo, qué cambió y por qué. 
                    Ninguna acción importante ocurre sin quedar registrada.
                </p>
                <p class="mt-3">
                    <strong>Propósito principal:</strong> Proporcionar trazabilidad completa, 
                    control, auditoría y cumplimiento normativo del sistema.
                </p>
                <p class="mt-3">
                    <strong>En resumen:</strong> Si algo sucedió en el sistema, 
                    lo encontrarás en el historial de eventos.
                </p>
            </div>
        </div>

        {{-- QUÉ SE REGISTRA - EXPANDIDO --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list"></i>
                    Tipos Completos de Acciones Registradas
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Estos son todos los tipos de eventos que se registran:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><i class="fas fa-ticket-alt text-info"></i> <strong>Eventos de Tickets</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>✔️ Creación de un nuevo ticket</li>
                            <li>✔️ Edición de título o descripción</li>
                            <li>✔️ Cambio de prioridad</li>
                            <li>✔️ Cambio de tipo</li>
                            <li>✔️ Cambio de estado</li>
                            <li>✔️ Asignación a un administrador</li>
                            <li>✔️ Eliminación de ticket</li>
                            <li>✔️ Reapertura de ticket cerrado</li>
                        </ul>

                        <h6 class="mt-3"><i class="fas fa-comments text-success"></i> <strong>Eventos de Comentarios</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>✔️ Adición de nuevo comentario</li>
                            <li>✔️ Edición de comentario</li>
                            <li>✔️ Eliminación de comentario</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-users text-warning"></i> <strong>Eventos de Usuarios</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>✔️ Creación de nueva cuenta de usuario</li>
                            <li>✔️ Cambio de datos personales</li>
                            <li>✔️ Cambio de contraseña</li>
                            <li>✔️ Eliminación de usuario</li>
                            <li>✔️ Cambio de permisos</li>
                        </ul>

                        <h6 class="mt-3"><i class="fas fa-user-shield text-danger"></i> <strong>Eventos Administrativos</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>✔️ Creación/edición de administrador</li>
                            <li>✔️ Cambio de roles (admin/superadmin)</li>
                            <li>✔️ Eliminación de administrador</li>
                            <li>✔️ Acciones de configuración global</li>
                            <li>✔️ Cambios en tipos de ticket</li>
                        </ul>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Completitud:</strong> Cada evento incluye fecha exacta, hora, usuario responsable, 
                    datos anteriores y datos nuevos (cuando aplica).
                </div>
            </div>
        </div>

        {{-- INFORMACIÓN CAPTURADA --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-database"></i>
                    ¿Qué Información se Captura en Cada Evento?
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Cada evento registrado contiene información muy detallada:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Información Temporal:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li><strong>Fecha:</strong> Día exacto del evento</li>
                            <li><strong>Hora:</strong> Hora, minuto y segundo</li>
                            <li><strong>Zona horaria:</strong> Para contexto internacional</li>
                        </ul>

                        <h6 class="mt-3"><strong>Información del Actor:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li><strong>Quién:</strong> Nombre del usuario/administrador</li>
                            <li><strong>Email:</strong> Correo del responsable</li>
                            <li><strong>ID:</strong> Identificador único en sistema</li>
                            <li><strong>Rol:</strong> Administrator o Superadministrador</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Información de la Acción:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li><strong>Tipo:</strong> Qué tipo de acción fue</li>
                            <li><strong>Descripción:</strong> Resumen legible de la acción</li>
                            <li><strong>Datos afectados:</strong> Qué entidades se modificaron</li>
                        </ul>

                        <h6 class="mt-3"><strong>Información de Cambios:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li><strong>Valor anterior:</strong> Qué había antes</li>
                            <li><strong>Valor nuevo:</strong> Qué hay ahora</li>
                            <li><strong>Diferencias:</strong> Cambios específicos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- ACCESO Y PERMISOS --}}
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-shield"></i>
                    Acceso y Permisos al Historial
                </h3>
            </div>
            <div class="card-body">
                <p>
                    No todos pueden ver el historial de eventos. Los permisos varían según tu rol:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><i class="fas fa-times text-danger"></i> <strong>Usuario Regular</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Acceso:</strong> NINGUNO<br>
                            <strong>Razón:</strong> Datos sensibles que no deben exponer
                        </p>

                        <h6 class="mt-3"><i class="fas fa-check text-warning"></i> <strong>Administrador Normal</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Acceso:</strong> Ver solo eventos relacionados con tickets que gestiona<br>
                            <strong>Limitaciones:</strong> No ver eventos de otros administradores, creaciones de usuarios, cambios globales
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-check text-success"></i> <strong>Superadministrador</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Acceso:</strong> COMPLETO - Ver todos los eventos del sistema<br>
                            <strong>Responsabilidad:</strong> Con gran poder vienen grandes responsabilidades
                        </p>

                        <h6 class="mt-3"><i class="fas fa-lock text-danger"></i> <strong>Protección</strong></h6>
                        <p class="text-muted text-sm">
                            El acceso está protegido por:
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>Middleware de autenticación</li>
                            <li>Políticas de autorización</li>
                            <li>Registros de acceso</li>
                            <li>Auditoría del acceso a auditoría</li>
                        </ul>
                    </div>
                </div>

                <div class="alert alert-danger mt-3">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <strong>Importante:</strong> El acceso al historial está auditorizado. 
                    Si accedes al historial, eso también queda registrado.
                </div>
            </div>
        </div>

        {{-- CÓMO ACCEDER --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-location-arrow"></i>
                    Cómo Acceder al Historial de Eventos
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Acceder al historial es simple:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Paso 1: Navega al Historial</strong></h6>
                        <p class="text-muted text-sm">
                            En el menú lateral, selecciona "Historial de Eventos"
                        </p>

                        <h6 class="mt-3"><strong>Paso 2: Verás la Tabla Completa</strong></h6>
                        <p class="text-muted text-sm">
                            Una tabla con todos los eventos (que tengas permiso de ver)
                        </p>

                        <h6 class="mt-3"><strong>Paso 3: Usa Filtros</strong></h6>
                        <p class="text-muted text-sm">
                            Aplica filtros para encontrar eventos específicos rápidamente
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Opciones de Visualización:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>📅 Filtrar por fecha</li>
                            <li>👤 Filtrar por usuario</li>
                            <li>🔍 Filtrar por tipo de evento</li>
                            <li>🎟️ Filtrar por ID de ticket</li>
                            <li>📊 Ver detalles completos</li>
                            <li>🔄 Ordenar por cualquier columna</li>
                            <li>📄 Exportar resultados (si disponible)</li>
                        </ul>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Consejo:</strong> Los filtros son tu mejor amigo. 
                    Con millones de eventos, filtrar es la forma más rápida de encontrar lo que buscas.
                </div>
            </div>
        </div>

        {{-- CASOS DE USO --}}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-lightbulb"></i>
                    Casos de Uso Comunes del Historial
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Aquí hay usos prácticos del historial de eventos:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>1. Investigar un Problema</strong></h6>
                        <p class="text-muted text-sm">
                            Usuario reporta que algo cambió sin que él lo hiciera.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Busca su ID en el historial. 
                            Verás exactamente qué cambió, cuándo y quién lo hizo.
                        </p>

                        <h6 class="mt-3"><strong>2. Auditoría de Acceso</strong></h6>
                        <p class="text-muted text-sm">
                            Supervisar si un administrador hizo algo fuera de lugar.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Filtra por nombre del administrador 
                            y verás cada acción que realizó.
                        </p>

                        <h6 class="mt-3"><strong>3. Verificar Cambios</strong></h6>
                        <p class="text-muted text-sm">
                            Usuario dice que sus datos se perdieron.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Busca el evento de eliminación y recupera 
                            los datos anteriores del registro.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>4. Cumplimiento Normativo</strong></h6>
                        <p class="text-muted text-sm">
                            Auditor externo pide demostración de cumplimiento.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Exporta eventos del período solicitado 
                            mostrando todas las acciones registradas.
                        </p>

                        <h6 class="mt-3"><strong>5. Investigar Errores</strong></h6>
                        <p class="text-muted text-sm">
                            Un ticket muestra un estado imposible o inconsistente.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Filtra por ID de ticket para ver 
                            la secuencia exacta de cambios.
                        </p>

                        <h6 class="mt-3"><strong>6. Formación y Supervisión</strong></h6>
                        <p class="text-muted text-sm">
                            Entrenar a un nuevo administrador o revisar su trabajo.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Solución:</strong> Revisa su historial de acciones 
                            para ver cómo trabaja.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- BÚSQUEDA EFECTIVA --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-search"></i>
                    Cómo Buscar Efectivamente en el Historial
                </h3>
            </div>
            <div class="card-body">
                <p>
                    Con millones de eventos, la búsqueda efectiva es crucial:
                </p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6><strong>Estrategia 1: Por Fecha</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Cuándo usarlo:</strong> Sabes aproximadamente cuándo ocurrió
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Cómo:</strong> Filtra por rango de fechas específico
                        </p>

                        <h6 class="mt-3"><strong>Estrategia 2: Por Usuario</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Cuándo usarlo:</strong> Sabes quién hizo algo o quién fue afectado
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Cómo:</strong> Filtra por email/nombre del usuario
                        </p>

                        <h6 class="mt-3"><strong>Estrategia 3: Por Tipo de Evento</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Cuándo usarlo:</strong> Solo te interesan ciertos tipos
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Cómo:</strong> Selecciona el tipo (creación, edición, etc.)
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Estrategia 4: Por ID de Ticket</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Cuándo usarlo:</strong> Quieres ver toda la historia de un ticket
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Cómo:</strong> Busca el ID del ticket específico
                        </p>

                        <h6 class="mt-3"><strong>Estrategia 5: Por Descripción</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Cuándo usarlo:</strong> Buscas eventos con cierto contenido
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Cómo:</strong> Usa la búsqueda de texto en el campo descripción
                        </p>

                        <h6 class="mt-3"><strong>Estrategia 6: Combinada</strong></h6>
                        <p class="text-muted text-sm">
                            <strong>Cuándo usarlo:</strong> Necesitas máxima precisión
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Cómo:</strong> Combina varios filtros simultáneamente
                        </p>
                    </div>
                </div>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Consejo Pro:</strong> Filtra por fecha primero para reducir el volumen, 
                    luego añade más filtros para precisión.
                </div>
            </div>
        </div>

        {{-- UTILIDAD Y BENEFICIOS --}}
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-check-circle"></i>
                    ¿Para Qué Sirve el Historial?
                </h3>
            </div>
            <div class="card-body">
                <p>
                    El historial de eventos es crítico para varios propósitos:
                </p>

                <div class="row mt-3">
                    <div class="col-md-4">
                        <h6><i class="fas fa-shield-alt text-danger"></i> <strong>Seguridad</strong></h6>
                        <ul style="font-size: 0.85em;">
                            <li>Detectar acceso no autorizado</li>
                            <li>Identificar cambios sospechosos</li>
                            <li>Prevenir fraudes</li>
                            <li>Monitorear actividad anómala</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6><i class="fas fa-gavel text-info"></i> <strong>Cumplimiento</strong></h6>
                        <ul style="font-size: 0.85em;">
                            <li>Auditoría legal requerida</li>
                            <li>Demostrar acciones</li>
                            <li>Certificación ISO</li>
                            <li>Reportes para auditor</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6><i class="fas fa-bug text-warning"></i> <strong>Investigación</strong></h6>
                        <ul style="font-size: 0.85em;">
                            <li>Encontrar origen de problema</li>
                            <li>Recuperar datos perdidos</li>
                            <li>Entender qué pasó</li>
                            <li>Prevenir repetición</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- MEJORES PRÁCTICAS --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-star"></i>
                    Mejores Prácticas
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><i class="fas fa-check"></i> <strong>SÍ Deberías:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>Revisar eventos ante incidencias</li>
                            <li>Usar filtros para localizar acciones rápidamente</li>
                            <li>Mantener registro de auditorías importantes</li>
                            <li>Exportar eventos para cumplimiento</li>
                            <li>Documentar investigaciones</li>
                            <li>Revisar eventos de administradores (si superadmin)</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6><i class="fas fa-times"></i> <strong>NO Deberías:</strong></h6>
                        <ul style="font-size: 0.9em;">
                            <li>Intentar eliminar eventos (no es posible)</li>
                            <li>Acceder sin justificación</li>
                            <li>Compartir eventos sensibles</li>
                            <li>Confiar solo en memoria sin verificar</li>
                            <li>Ignorar eventos sospechosos</li>
                            <li>Modificar registros manualmente</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- INFORMACIÓN TÉCNICA --}}
        <div class="card card-outline card-light">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-cogs"></i>
                    Información Técnica
                </h3>
            </div>
            <div class="card-body">
                <p>
                    <strong>Características técnicas del historial:</strong>
                </p>
                <ul>
                    <li><strong>Inmutable:</strong> Los eventos no pueden eliminarse una vez creados</li>
                    <li><strong>Trazable:</strong> Cada evento tiene identificadores únicos</li>
                    <li><strong>Completo:</strong> Nada importante se pierde</li>
                    <li><strong>Eficiente:</strong> Indexado para búsquedas rápidas</li>
                    <li><strong>Protegido:</strong> Acceso controlado por políticas</li>
                    <li><strong>Auditable:</strong> El acceso al historial también se registra</li>
                </ul>

                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Capacidad:</strong> El sistema puede almacenar millones de eventos 
                    y recuperarlos en milisegundos gracias a indexación avanzada.
                </div>
            </div>
        </div>

        {{-- ADVERTENCIA FINAL --}}
        <div class="alert alert-danger mt-4">
            <i class="fas fa-lock mr-2"></i>
            <strong>Crítico:</strong> El historial de eventos es un componente crítico del sistema 
            y debe usarse con máxima responsabilidad. Tu acceso al historial se registra. 
            Abusos pueden resultar en pérdida de privilegios administrativos.
        </div>

    </div>
@endsection
