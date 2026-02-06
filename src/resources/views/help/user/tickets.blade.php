@extends('layouts.user')

@section('title', 'Ayuda · Tickets')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Guía Completa de Gestión de Tickets</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a>
                </li>
                <li class="breadcrumb-item active">Tickets</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- CREAR UN TICKET - EXPANDIDO --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-plus-circle mr-2"></i>
                Crear un Nuevo Ticket (Paso a Paso)
            </h3>
        </div>
        <div class="card-body">
            <p>
                Crear un ticket es sencillo pero requiere atención para proporcionar la información correcta. 
                Sigue estos pasos detalladamente:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><strong>Paso 1: Accede a Tickets</strong></h6>
                    <p class="text-muted">
                        En el menú lateral, selecciona "Mis Tickets" para acceder al área de gestión.
                    </p>

                    <h6 class="mt-3"><strong>Paso 2: Haz Clic en "Crear Nuevo Ticket"</strong></h6>
                    <p class="text-muted">
                        Busca el botón "Crear Nuevo Ticket" (generalmente en verde) y haz clic.
                    </p>

                    <h6 class="mt-3"><strong>Paso 3: Completa el Formulario</strong></h6>
                    <p class="text-muted">
                        Rellena todos los campos requeridos (marcados con asterisco *).
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><strong>Paso 4: Campos del Formulario</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li><strong>Título:</strong> Resumen breve del problema (máximo 100 caracteres)</li>
                        <li><strong>Descripción:</strong> Detalles completos, sin límite aparente</li>
                        <li><strong>Tipo:</strong> Categoría que mejor describe tu solicitud</li>
                        <li><strong>Prioridad:</strong> Nivel de urgencia (ver tabla de prioridades)</li>
                    </ul>

                    <h6 class="mt-3"><strong>Paso 5: Revisa antes de Enviar</strong></h6>
                    <p class="text-muted">
                        Lee tu descripción una vez más. ¿Es clara? ¿Podrá entenderla un extraño?
                    </p>

                    <h6 class="mt-3"><strong>Paso 6: Envía el Ticket</strong></h6>
                    <p class="text-muted">
                        Haz clic en "Crear Ticket". Recibirás una confirmación con el número de ticket.
                    </p>
                </div>
            </div>

            <div class="alert alert-info mt-3">
                <i class="fas fa-lightbulb mr-2"></i>
                <strong>Consejo importante:</strong> Invierte 5-10 minutos en escribir bien tu ticket inicial. 
                Un buen ticket se resuelve mucho más rápido que uno confuso o incompleto.
            </div>
        </div>
    </div>

    {{-- CAMPOS DEL FORMULARIO - DETALLADO --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-edit mr-2"></i>
                Explicación Detallada de Cada Campo del Formulario
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-heading"></i> <strong>TÍTULO del Ticket</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        El resumen de tu problema en una frase corta.
                    </p>
                    <div class="bg-light p-2 rounded mb-3">
                        <small>
                            <strong>✓ Ejemplos buenos:</strong><br>
                            • "No puedo descargar reportes en PDF"<br>
                            • "Error al cambiar contraseña"<br>
                            • "Consulta sobre permisos de acceso"<br><br>
                            <strong>✗ Ejemplos malos:</strong><br>
                            • "Tengo un problema"<br>
                            • "Algo no funciona"<br>
                            • "Ayuda urgente"
                        </small>
                    </div>

                    <h6 class="mt-3"><i class="fas fa-align-left"></i> <strong>DESCRIPCIÓN del Ticket</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        Aquí es donde das todos los detalles. Sé lo más exhaustivo posible.
                    </p>
                    <p class="text-muted text-sm">
                        Incluye:
                    </p>
                    <ul style="font-size: 0.85em;">
                        <li>Qué intentabas hacer exactamente</li>
                        <li>Qué sucedió y en qué momento</li>
                        <li>Cuándo ocurrió por primera vez</li>
                        <li>Si se repite siempre o es ocasional</li>
                        <li>Pasos para reproducir (si es un error)</li>
                        <li>Información del dispositivo/navegador (si es relevante)</li>
                        <li>Mensajes de error exactos (cópialo si es posible)</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-folder"></i> <strong>TIPO de Ticket</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        Selecciona la categoría más apropiada para tu solicitud.
                    </p>
                    <p class="text-muted text-sm">
                        Los tipos disponibles pueden incluir:
                    </p>
                    <ul style="font-size: 0.85em;">
                        <li><strong>Error/Bug:</strong> Algo funciona incorrectamente</li>
                        <li><strong>Consulta:</strong> Tienes una pregunta</li>
                        <li><strong>Solicitud:</strong> Pides algo específico</li>
                        <li><strong>Mejora:</strong> Sugerencia de optimización</li>
                        <li><strong>Otro:</strong> Cosas que no encajan en otras categorías</li>
                    </ul>
                    <p class="text-muted text-sm mt-2">
                        <strong>Importancia:</strong> Un tipo correcto ayuda a que tu ticket 
                        llegue al área adecuada más rápidamente.
                    </p>

                    <h6 class="mt-3"><i class="fas fa-fire"></i> <strong>PRIORIDAD del Ticket</strong></h6>
                    <p class="text-muted text-sm mb-2">
                        Indica qué tan urgente es tu solicitud. Sé honesto aquí.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLA DETALLADA DE PRIORIDADES --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-fire mr-2"></i>
                Niveles de Prioridad (Explicación Completa)
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><span class="badge badge-success">BAJA</span> <strong>Prioridad Baja</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>¿Cuándo usarla?</strong> Cuando tu incidencia puede esperar 2 o más semanas.
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Ejemplos:</strong>
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>Sugerencias de mejora</li>
                            <li>Consultas informativas</li>
                            <li>Solicitudes no urgentes</li>
                            <li>Preguntas sobre documentación</li>
                        </ul>
                        <p class="text-danger text-sm">
                            <strong>✗ NO uses:</strong> Si algo te impide trabajar hoy
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><span class="badge badge-info">NORMAL</span> <strong>Prioridad Normal</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>¿Cuándo usarla?</strong> Para la mayoría de problemas normales (1-2 semanas).
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Ejemplos:</strong>
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>Errores que afectan pero no bloquean</li>
                            <li>Acceso limitado a ciertos módulos</li>
                            <li>Solicitudes de cambios menores</li>
                            <li>Dudas sobre procesos</li>
                        </ul>
                        <p class="text-info text-sm">
                            <strong>✓ RECOMENDADO:</strong> Para el 80% de tickets
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><span class="badge badge-warning">ALTA</span> <strong>Prioridad Alta</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>¿Cuándo usarla?</strong> Cuando el problema afecta significativamente tu trabajo (3-5 días).
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Ejemplos:</strong>
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>No puedes acceder a una función necesaria</li>
                            <li>Errores recurrentes que ralentizan tu trabajo</li>
                            <li>Problemas de rendimiento graves</li>
                            <li>Datos inconsistentes que causen confusión</li>
                        </ul>
                        <p class="text-warning text-sm">
                            <strong>⚠️ CUIDADO:</strong> Abusa de esto y pierde valor
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><span class="badge badge-danger">URGENTE</span> <strong>Prioridad Urgente</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>¿Cuándo usarla?</strong> Solo cuando el problema te IMPIDE TRABAJAR completamente (inmediato).
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Ejemplos:</strong>
                        </p>
                        <ul style="font-size: 0.85em;">
                            <li>No puedes acceder a tu cuenta</li>
                            <li>Datos críticos desaparecidos</li>
                            <li>El sistema no responde</li>
                            <li>Pérdida de información importante</li>
                        </ul>
                        <p class="text-danger text-sm">
                            <strong>🚨 SOLO EN EMERGENCIAS:</strong> Tu trabajo se detiene
                        </p>
                    </div>
                </div>
            </div>

            <div class="alert alert-warning mt-3">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <strong>Norma de Oro:</strong> Sé honesto con las prioridades. Si marcas todo como urgente, 
                el equipo dejará de confiar y tardará más en resolver tus tickets reales urgentes.
            </div>
        </div>
    </div>

    {{-- TIPOS DE TICKET - DETALLADO --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tags mr-2"></i>
                Tipos de Ticket (Clasificación Correcta)
            </h3>
        </div>
        <div class="card-body">
            <p>
                El tipo ayuda a que tu ticket sea asignado al área correcta. 
                Elige el que mejor se ajuste a tu solicitud:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-bug"></i> <strong>Error / Bug</strong></h6>
                    <p class="text-muted text-sm">
                        Algo no funciona como debería. Un fallo en el sistema o aplicación.
                    </p>
                    <small>Incluye: pasos exactos para reproducir, navegador, sistema operativo</small>

                    <h6 class="mt-3"><i class="fas fa-question-circle"></i> <strong>Consulta / Pregunta</strong></h6>
                    <p class="text-muted text-sm">
                        Tienes una duda o necesitas aclaración sobre cómo algo funciona.
                    </p>
                    <small>Incluye: qué específicamente no entiendes, qué has intentado ya</small>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-hand-paper"></i> <strong>Solicitud</strong></h6>
                    <p class="text-muted text-sm">
                        Pides que se haga algo específico por ti o para tu cuenta.
                    </p>
                    <small>Incluye: qué necesitas exactamente, por qué lo necesitas, cuándo</small>

                    <h6 class="mt-3"><i class="fas fa-lightbulb"></i> <strong>Mejora / Sugerencia</strong></h6>
                    <p class="text-muted text-sm">
                        Propones una idea para mejorar la plataforma o un proceso.
                    </p>
                    <small>Incluye: qué cambiarías, por qué sería mejor, cuál es el beneficio</small>
                </div>
            </div>
        </div>
    </div>

    {{-- GESTIÓN DE TICKETS - EXPANDIDO --}}
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-list mr-2"></i>
                Gestionar mis Tickets (Vista Detallada)
            </h3>
        </div>
        <div class="card-body">
            <p>
                Una vez creados, tus tickets aparecen en "Mis Tickets". 
                Aquí es donde puedes monitorizarlos y comunicarte:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><strong>Acciones en la Lista:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li><strong>Ver todos:</strong> Visualiza el listado completo</li>
                        <li><strong>Buscar:</strong> Usa la barra de búsqueda por título</li>
                        <li><strong>Filtrar:</strong> Por estado, tipo o prioridad</li>
                        <li><strong>Ordenar:</strong> Por fecha, estado o prioridad</li>
                        <li><strong>Abrir detalles:</strong> Haz clic en un ticket para verlo completo</li>
                    </ul>

                    <h6 class="mt-3"><strong>Información en la Lista:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>ID: Número único del ticket</li>
                        <li>Título: Resumen del problema</li>
                        <li>Estado: Situación actual</li>
                        <li>Prioridad: Urgencia</li>
                        <li>Fecha: Cuándo fue creado</li>
                        <li>Último comentario: Cuándo se actualizó</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><strong>En la Vista Detallada del Ticket:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Ver información completa del ticket</li>
                        <li>Leer todos los comentarios (tuyos y del administrador)</li>
                        <li>Añadir nuevos comentarios</li>
                        <li>Ver quién está asignado</li>
                        <li>Ver el historial de cambios de estado</li>
                        <li>Descargar adjuntos (si los hay)</li>
                    </ul>

                    <h6 class="mt-3"><strong>Información de Asignación:</strong></h6>
                    <p class="text-muted text-sm">
                        En la vista detallada verás quién está responsabilizado de tu ticket. 
                        Este administrador será tu punto de contacto principal.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ESTADOS DEL TICKET - EXPANDIDO --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-shield-alt mr-2"></i>
                Estados del Ticket (Guía Completa)
            </h3>
        </div>
        <div class="card-body">
            <p>
                El estado de un ticket indica su situación actual en el proceso de resolución. 
                Comprender cada estado te ayudará a saber qué esperar:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><span class="badge badge-secondary">Nuevo</span> <strong>Estado: Nuevo</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>Significado:</strong> Acabas de crear el ticket. 
                            Está en la cola pero aún no ha sido revisado.
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Qué significa:</strong> El equipo ha visto que existe pero aún no lo está gestionando.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Próximo paso:</strong> Espera a que se asigne a un administrador.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><span class="badge badge-primary">En Proceso</span> <strong>Estado: En Proceso</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>Significado:</strong> Un administrador se responsabilizó 
                            y está trabajando activamente en tu solicitud.
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Qué significa:</strong> Tu problema tiene atención. 
                            Alguien está investigando o buscando la solución.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Próximo paso:</strong> Espera información o cambio de estado.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><span class="badge badge-warning">Pendiente Información</span> <strong>Estado: Pendiente Info</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>Significado:</strong> El equipo necesita que proporciones 
                            más detalles, datos o aclaraciones.
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Qué significa:</strong> No pueden continuar sin tu ayuda. 
                            Probablemente haya un comentario con las preguntas específicas.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Próximo paso:</strong> IMPORTANTE - Responde al comentario con la información solicitada.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><span class="badge badge-success">Resuelto</span> <strong>Estado: Resuelto</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>Significado:</strong> El equipo considera que tu incidencia 
                            ha sido completamente solucionada.
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Qué significa:</strong> Según el administrador, tu problema está resuelto. 
                            Ahora es tu turno de confirmar.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Próximo paso:</strong> Verifica que funcione. Si sí, confirma con un comentario. 
                            Si no, reabre el ticket.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><span class="badge badge-dark">Cerrado</span> <strong>Estado: Cerrado</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>Significado:</strong> El ticket está completamente finalizado. 
                            No se pueden añadir nuevos comentarios.
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Qué significa:</strong> El proceso ha concluido. 
                            Puedes consultarlo en el historial pero no modificarlo.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Próximo paso:</strong> Si el problema reaparece, abre un nuevo ticket referenciando este.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><span class="badge badge-info">Reabierto</span> <strong>Estado: Reabierto</strong></h6>
                        <p class="text-muted text-sm mb-1">
                            <strong>Significado:</strong> Un ticket cerrado ha sido reabierto porque 
                            la solución no fue satisfactoria.
                        </p>
                        <p class="text-muted text-sm mb-1">
                            <strong>Qué significa:</strong> El sistema reinicia el proceso. 
                            El equipo investigará de nuevo.
                        </p>
                        <p class="text-muted text-sm">
                            <strong>Próximo paso:</strong> Proporciona feedback sobre por qué no funcionó la solución anterior.
                        </p>
                    </div>
                </div>
            </div>

            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Flujo típico:</strong> Nuevo → En Proceso → Resuelto → Cerrado. 
                Si faltan datos, pasará por "Pendiente Información" antes de continuar.
            </div>
        </div>
    </div>

    {{-- COMUNICACIÓN EN TICKETS --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-comments mr-2"></i>
                Comunicación y Comentarios
            </h3>
        </div>
        <div class="card-body">
            <p>
                Los comentarios son tu canal de comunicación directa con el equipo administrador dentro del ticket.
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><strong>Cómo Comentar:</strong></h6>
                    <ol style="font-size: 0.9em;">
                        <li>Abre el ticket completo</li>
                        <li>Desplázate hasta el apartado de comentarios</li>
                        <li>Haz clic en "Añadir comentario"</li>
                        <li>Escribe tu mensaje</li>
                        <li>Haz clic en "Enviar comentario"</li>
                    </ol>

                    <h6 class="mt-3"><strong>Qué Comentar:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Respuestas a las preguntas del administrador</li>
                        <li>Información adicional que se te solicite</li>
                        <li>Confirmación de que se solucionó</li>
                        <li>Actualizaciones sobre el problema</li>
                        <li>Adjuntos (capturas, archivos, etc.)</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><strong>Buenas Prácticas en Comentarios:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li><strong>Sé claro:</strong> Usa lenguaje sencillo y directo</li>
                        <li><strong>Sé específico:</strong> Proporciona detalles concretos</li>
                        <li><strong>Responde rápido:</strong> No dejes pasar días sin responder</li>
                        <li><strong>Sé profesional:</strong> Mantén un tono respetuoso</li>
                        <li><strong>No repitas:</strong> Lee comentarios previos antes de escribir</li>
                        <li><strong>Incluye contexto:</strong> Si mencionas algo, da detalles</li>
                    </ul>

                    <h6 class="mt-3"><strong>Editar y Eliminar Comentarios:</strong></h6>
                    <p class="text-muted text-sm">
                        Puedes eliminar tus propios comentarios en la mayoría de casos. 
                        No puedes eliminar comentarios del administrador. Algunos sistemas permiten editar.
                    </p>
                </div>
            </div>

            <div class="alert alert-warning mt-3">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <strong>Importante:</strong> Si el administrador pide información adicional, 
                responde lo antes posible. Los retrasos significan que la resolución también se retrasa.
            </div>
        </div>
    </div>

    {{-- EDICIÓN DE TICKETS --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-pen-square mr-2"></i>
                Editar Tickets (Limitaciones)
            </h3>
        </div>
        <div class="card-body">
            <p>
                No todos los campos de un ticket pueden editarse en cualquier momento. 
                Aquí se explica qué sí y qué no puedes hacer:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-check text-success"></i> <strong>SÍ Puedes Editar:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>La descripción inicial (mientras esté en "Nuevo")</li>
                        <li>Los comentarios que tú escribiste</li>
                        <li>Adjuntos que hayas proporcionado</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-times text-danger"></i> <strong>NO Puedes Editar:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>El título (una vez creado)</li>
                        <li>El tipo de ticket</li>
                        <li>La prioridad inicial</li>
                        <li>El estado del ticket</li>
                        <li>La descripción (después de asignado)</li>
                    </ul>
                </div>
            </div>

            <div class="alert alert-info mt-3">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Nota:</strong> Por eso es importante tomarte tiempo escribiendo correctamente la descripción inicial.
            </div>
        </div>
    </div>

    {{-- MEJORES PRÁCTICAS --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-star mr-2"></i>
                Mejores Prácticas para Tickets Efectivos
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-lightbulb"></i> <strong>Antes de Crear:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Verifica que el problema no exista ya</li>
                        <li>Toma una captura de pantalla si es visual</li>
                        <li>Anota los pasos exactos para reproducir</li>
                        <li>Recuerda detalles sobre cuándo ocurrió</li>
                        <li>Ten clara la información técnica (navegador, etc.)</li>
                    </ul>

                    <h6 class="mt-3"><i class="fas fa-pencil-alt"></i> <strong>Al Crear:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Escribe un título específico</li>
                        <li>Proporciona contexto completo</li>
                        <li>Sé honesto con la prioridad</li>
                        <li>Revisa antes de enviar</li>
                        <li>Incluye toda información relevante</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-eye"></i> <strong>Durante el Seguimiento:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Responde rápidamente a las preguntas</li>
                        <li>Sé detallado en tus respuestas</li>
                        <li>Proporciona información solicitada prontamente</li>
                        <li>Mantén un tono profesional</li>
                        <li>Evita repetir información ya mencionada</li>
                    </ul>

                    <h6 class="mt-3"><i class="fas fa-check"></i> <strong>Al Cerrar:</strong></h6>
                    <ul style="font-size: 0.9em;">
                        <li>Verifica que la solución realmente funciona</li>
                        <li>Confirma en un comentario cuando esté resuelto</li>
                        <li>Si no funciona, reabre el ticket</li>
                        <li>Sé claro sobre qué solucionó el problema</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- PROBLEMAS COMUNES --}}
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-exclamation-circle mr-2"></i>
                Problemas Comunes y Cómo Evitarlos
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><strong>❌ Descripción muy vaga</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Problema:</strong> "No me funciona algo" - El equipo no sabe qué investigar<br>
                        <strong>Solución:</strong> Sé específico: "Al intentar descargar reportes en PDF, la página se queda cargando"
                    </p>

                    <h6 class="mt-3"><strong>❌ Múltiples problemas en uno</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Problema:</strong> Mezclas 5 problemas diferentes<br>
                        <strong>Solución:</strong> Crea un ticket por cada problema
                    </p>

                    <h6 class="mt-3"><strong>❌ Prioridad incorrecta</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Problema:</strong> Marcas todo como urgente<br>
                        <strong>Solución:</strong> Sé honesto sobre la verdadera urgencia
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><strong>❌ No responder a preguntas</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Problema:</strong> El equipo pregunta algo y tú no respondes<br>
                        <strong>Solución:</strong> Responde comentarios el mismo día que los leas
                    </p>

                    <h6 class="mt-3"><strong>❌ Crear duplicados</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Problema:</strong> Creas 3 tickets sobre el mismo tema<br>
                        <strong>Solución:</strong> Busca si existe algo similar antes de crear
                    </p>

                    <h6 class="mt-3"><strong>❌ Cerrar sin confirmar</strong></h6>
                    <p class="text-muted text-sm">
                        <strong>Problema:</strong> El equipo marca cerrado sin que tú confirmes<br>
                        <strong>Solución:</strong> Reabre si necesitas más ayuda
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- RESUMEN RÁPIDO --}}
    <div class="card card-outline card-light">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-lightbulb"></i>
                Resumen Rápido: Checklist para un Buen Ticket
            </h3>
        </div>
        <div class="card-body">
            <p><strong>Antes de crear, verifica que tu ticket incluya:</strong></p>
            <ul>
                <li><input type="checkbox" disabled> Un título claro y específico (máximo 100 caracteres)</li>
                <li><input type="checkbox" disabled> Descripción detallada con contexto completo</li>
                <li><input type="checkbox" disabled> Pasos exactos para reproducir (si es un error)</li>
                <li><input type="checkbox" disabled> Tipo correcto seleccionado</li>
                <li><input type="checkbox" disabled> Prioridad honesta y realista</li>
                <li><input type="checkbox" disabled> Información técnica relevante (navegador, SO, etc.)</li>
                <li><input type="checkbox" disabled> Capturas o archivos adjuntos si es necesario</li>
                <li><input type="checkbox" disabled> Revisión final de la descripción para claridad</li>
            </ul>

            <div class="alert alert-success mt-3">
                <i class="fas fa-check-circle mr-2"></i>
                <strong>Resultado:</strong> Un ticket bien elaborado se resuelve 3-5 veces más rápido 
                que uno confuso. ¡Invierte 10 minutos ahora, ahórrate días después!
            </div>
        </div>
    </div>

</div>
@endsection
