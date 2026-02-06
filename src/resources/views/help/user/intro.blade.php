@extends('layouts.user')

@section('title', 'Ayuda · Introducción')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Introducción y Guía Completa</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a>
                </li>
                <li class="breadcrumb-item active">Introducción</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- Bienvenida --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-ticket-alt mr-2"></i>
                Bienvenido al Sistema de Gestión de Tickets
            </h3>
        </div>
        <div class="card-body">
            <p>
                Esta aplicación ha sido cuidadosamente diseñada para facilitar la comunicación
                fluida y organizada entre los usuarios como tú y el equipo administrador. 
                A través de un sistema de tickets estructurado, podrás:
            </p>
            <ul>
                <li><strong>Registrar incidencias</strong> de forma clara y detallada</li>
                <li><strong>Hacer seguimiento</strong> del estado de tus solicitudes en tiempo real</li>
                <li><strong>Comunicarte directamente</strong> con los administradores mediante comentarios</li>
                <li><strong>Recibir notificaciones</strong> automáticas de cada cambio importante</li>
                <li><strong>Mantener un historial completo</strong> de todas tus solicitudes</li>
            </ul>
            <p class="mt-3">
                No necesitarás usar correos electrónicos u otros canales externos.
                Todo ocurre en un único lugar, centralizado y fácil de usar.
            </p>
        </div>
    </div>

    {{-- Qué es un ticket - Detallado --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-info-circle mr-2"></i>
                ¿Qué es un Ticket? (Definición Completa)
            </h3>
        </div>
        <div class="card-body">
            <p>
                Un <strong>ticket</strong> es una solicitud formal registrada en el sistema
                que representa una incidencia, problema, pregunta o petición concreta que necesitas
                que el equipo de administradores atienda.
            </p>
            
            <p class="mt-3">Cada ticket incluye:</p>
            <ul>
                <li><strong>Título:</strong> un resumen breve de tu solicitud</li>
                <li><strong>Descripción:</strong> detalles completos de lo que necesitas</li>
                <li><strong>Tipo:</strong> categoría que clasifica tu solicitud (error, consulta, solicitud, etc.)</li>
                <li><strong>Prioridad:</strong> nivel de urgencia (baja, normal, alta, urgente)</li>
                <li><strong>Estado:</strong> situación actual del ticket (nuevo, en proceso, resuelto, cerrado)</li>
                <li><strong>Fecha de creación:</strong> cuándo registraste la solicitud</li>
                <li><strong>Comentarios:</strong> comunicación continua con el equipo administrador</li>
                <li><strong>Asignación:</strong> qué administrador está responsable de tu ticket</li>
            </ul>

            <p class="mt-3">
                Cada ticket queda almacenado permanentemente en el sistema con su información completa,
                estado, prioridad y un historial de todas las acciones realizadas. Esto permite un 
                seguimiento transparente, ordenado y auditable de tu solicitud desde el inicio hasta la resolución.
            </p>
        </div>
    </div>

    {{-- Qué puedes hacer --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-success h-100">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Crear Nuevos Tickets
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        Podrás crear nuevos tickets en cualquier momento. Solo necesitas proporcionar:
                    </p>
                    <ul style="font-size: 0.95em;">
                        <li>Un título descriptivo</li>
                        <li>Una descripción detallada</li>
                        <li>El tipo de incidencia</li>
                        <li>El nivel de prioridad</li>
                    </ul>
                    <p class="text-muted mb-0">
                        <strong>Consejo:</strong> Cuanta más información aportes al crear el ticket, 
                        más rápida será la respuesta del equipo administrador.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-outline card-info h-100">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list mr-2"></i>
                        Gestionar y Consultar
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        En cualquier momento podrás:
                    </p>
                    <ul style="font-size: 0.95em;">
                        <li>Ver todos tus tickets</li>
                        <li>Buscar tickets específicos</li>
                        <li>Filtrar por estado o tipo</li>
                        <li>Consultar detalles completos</li>
                    </ul>
                    <p class="text-muted mb-0">
                        El sistema mantiene un historial completo de todas tus solicitudes.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-outline card-warning h-100">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bell mr-2"></i>
                        Recibir Notificaciones
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        El sistema te notificará automáticamente cuando:
                    </p>
                    <ul style="font-size: 0.95em;">
                        <li>Un administrador responda</li>
                        <li>Cambie el estado del ticket</li>
                        <li>Se asigne a un administrador</li>
                        <li>Se requiera más información</li>
                    </ul>
                    <p class="text-muted mb-0">
                        No tendrás que revisar manualmente el sistema.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Flujo básico - Más detallado --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-route mr-2"></i>
                Flujo Completo de Funcionamiento
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5>Proceso paso a paso:</h5>
                    <ol>
                        <li>
                            <strong>Creas un ticket:</strong> Accedes a "Mis Tickets" y seleccionas 
                            "Crear nuevo ticket". Completas todos los campos requeridos.
                        </li>
                        <li>
                            <strong>Confirmación:</strong> El sistema te confirma que el ticket ha sido 
                            registrado y te asigna un número único de identificación.
                        </li>
                        <li>
                            <strong>Revisión administrador:</strong> Un administrador revisa tu solicitud 
                            y la asigna para gestión.
                        </li>
                        <li>
                            <strong>Comunicación:</strong> Si se necesitan aclaraciones, el administrador 
                            te escribirá un comentario solicitando más información.
                        </li>
                        <li>
                            <strong>Respuesta y acción:</strong> El equipo trabaja en tu solicitud y 
                            actualiza el estado del ticket.
                        </li>
                        <li>
                            <strong>Resolución:</strong> Cuando se haya completado, el ticket se marca 
                            como "Resuelto" o "Cerrado".
                        </li>
                    </ol>
                </div>
                <div class="col-md-6">
                    <h5>Notificaciones en cada etapa:</h5>
                    <ul>
                        <li>
                            <strong>Al crear:</strong> Confirmación de que el ticket se ha registrado
                        </li>
                        <li>
                            <strong>Al asignar:</strong> Notificación de que un administrador se responsabiliza
                        </li>
                        <li>
                            <strong>Cambios de estado:</strong> Avisos cuando el estado se actualiza
                        </li>
                        <li>
                            <strong>Nuevos comentarios:</strong> Alertas cuando se añade una respuesta
                        </li>
                        <li>
                            <strong>Información solicitada:</strong> Avisos cuando se requieren datos adicionales
                        </li>
                        <li>
                            <strong>Resolución:</strong> Confirmación final cuando todo esté completo
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Estados detallados --}}
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-sync-alt mr-2"></i>
                Estados de un Ticket (Explicación Detallada)
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Un ticket puede estar en estos estados:</strong></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><i class="fas fa-star text-warning"></i> <strong>Nuevo</strong></h6>
                        <p class="text-muted mb-1">
                            Acabas de crear el ticket. Aún no ha sido revisado por ningún administrador. 
                            El sistema lo tiene registrado y está en la cola de atención.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-user-check text-info"></i> <strong>Asignado</strong></h6>
                        <p class="text-muted mb-1">
                            Un administrador específico se ha responsabilizado de tu ticket. 
                            Ya está bajo su supervisión directa.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-cog text-primary"></i> <strong>En Proceso</strong></h6>
                        <p class="text-muted mb-1">
                            El administrador está trabajando activamente en tu solicitud. 
                            Está investigando, resolviendo o buscando la solución.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h6><i class="fas fa-pause-circle text-warning"></i> <strong>Pendiente de Información</strong></h6>
                        <p class="text-muted mb-1">
                            El equipo necesita que tú proporciones más detalles o información 
                            adicional para poder continuar. Te habrán escrito un comentario explicando qué necesitan.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-check-circle text-success"></i> <strong>Resuelto</strong></h6>
                        <p class="text-muted mb-1">
                            Tu incidencia ha sido completamente solucionada. 
                            El administrador considera que tu solicitud está atendida satisfactoriamente.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6><i class="fas fa-lock text-danger"></i> <strong>Cerrado</strong></h6>
                        <p class="text-muted mb-1">
                            El ticket está finalizado de forma definitiva. No se pueden añadir nuevos comentarios 
                            pero sí puedes consultarlo en el historial.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Casos de uso comunes - Expandido --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-lightbulb mr-2"></i>
                Casos de Uso Comunes (Ejemplos Prácticos)
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-bug"></i> <strong>Reportar un Error o Fallo</strong></h6>
                    <p class="text-muted mb-3">
                        Si encuentras algo que no funciona correctamente en la aplicación o sistema. 
                        Describe exactamente qué hacías cuando ocurrió el problema.
                    </p>

                    <h6><i class="fas fa-lightbulb"></i> <strong>Solicitar una Funcionalidad</strong></h6>
                    <p class="text-muted mb-3">
                        Tienes una idea de mejora o una característica que crees que sería útil. 
                        El equipo evaluará tu propuesta.
                    </p>

                    <h6><i class="fas fa-question-circle"></i> <strong>Consultar sobre un Proceso</strong></h6>
                    <p class="text-muted mb-3">
                        Tienes dudas sobre cómo funciona algo o cómo usar una característica. 
                        Los administradores te orientarán.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-lock-open"></i> <strong>Problemas de Acceso</strong></h6>
                    <p class="text-muted mb-3">
                        No puedes acceder a tu cuenta, olvidaste la contraseña, 
                        o no ves datos que deberías poder ver.
                    </p>

                    <h6><i class="fas fa-user-edit"></i> <strong>Actualizaciones de Datos Personales</strong></h6>
                    <p class="text-muted mb-3">
                        Necesitas actualizar tu información de perfil, cambiar datos de contacto 
                        o realizar cambios administrativos.
                    </p>

                    <h6><i class="fas fa-exclamation-triangle"></i> <strong>Situaciones Críticas</strong></h6>
                    <p class="text-muted mb-3">
                        Marca como "Urgente" si se trata de algo que impide tu trabajo o causa daño.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Requisitos para un buen ticket --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-check-double mr-2"></i>
                Guía Completa: Cómo Crear un Ticket de Calidad
            </h3>
        </div>
        <div class="card-body">
            <p>
                Para que tu ticket sea resuelto más rápidamente y efectivamente, sigue estas recomendaciones:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-heading"></i> <strong>1. Título Claro y Conciso</strong></h6>
                    <p class="text-muted">
                        Resume el problema o solicitud en una sola frase corta (máximo 10 palabras).
                    </p>
                    <div class="bg-light p-2 rounded mb-3">
                        <small>
                            <strong>✓ Bien:</strong> "No puedo descargar reportes"<br>
                            <strong>✗ Mal:</strong> "Tengo un problema"
                        </small>
                    </div>

                    <h6><i class="fas fa-align-left"></i> <strong>2. Descripción Detallada</strong></h6>
                    <p class="text-muted">
                        Explica con todos los detalles qué ocurre, cuándo ocurre, y por qué es un problema.
                    </p>
                    <ul style="font-size: 0.9em;">
                        <li>¿Qué intentabas hacer?</li>
                        <li>¿Qué sucedió exactamente?</li>
                        <li>¿Cuándo ocurrió por primera vez?</li>
                        <li>¿Se repite siempre o es esporádico?</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-list"></i> <strong>3. Tipo Correcto</strong></h6>
                    <p class="text-muted">
                        Selecciona la categoría que mejor representa tu solicitud. 
                        El sistema usa tipos para organizar y dirigir tu ticket.
                    </p>

                    <h6><i class="fas fa-fire"></i> <strong>4. Prioridad Realista</strong></h6>
                    <p class="text-muted">
                        Sé honesto sobre la urgencia:
                    </p>
                    <ul style="font-size: 0.9em;">
                        <li><strong>Baja:</strong> Puede esperar 2+ semanas</li>
                        <li><strong>Normal:</strong> Requiere atención en 1-2 semanas</li>
                        <li><strong>Alta:</strong> Urgente pero no crítico (3-5 días)</li>
                        <li><strong>Urgente:</strong> Te impide trabajar (inmediato)</li>
                    </ul>
                </div>
            </div>

            <div class="mt-3 alert alert-info">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Recuerda:</strong> Evita los "No me funciona" sin más detalles. 
                Cuanto mejor sea tu descripción inicial, menos tendrá que preguntar el equipo 
                y más rápido se resolverá.
            </div>
        </div>
    </div>

    {{-- Comunicación y comentarios --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-comments mr-2"></i>
                Comunicación con el Equipo Administrador
            </h3>
        </div>
        <div class="card-body">
            <p>
                Los comentarios dentro de cada ticket son tu canal de comunicación directa 
                con el equipo administrador. A través de ellos podrás:
            </p>

            <div class="row mt-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-comment-dots"></i> <strong>Proporcionar Información Adicional</strong></h6>
                    <p class="text-muted">
                        Si el equipo te pide más detalles, adjuntos o aclaraciones, 
                        responde en el apartado de comentarios del ticket.
                    </p>

                    <h6><i class="fas fa-reply"></i> <strong>Responder a las Preguntas</strong></h6>
                    <p class="text-muted">
                        Cuando un administrador pregunte algo en un comentario, 
                        contesta lo antes posible para no retrasar la resolución.
                    </p>

                    <h6><i class="fas fa-file"></i> <strong>Adjuntar Archivos (Si es Necesario)</strong></h6>
                    <p class="text-muted">
                        Puedes compartir capturas de pantalla, archivos PDF, 
                        documentos o cualquier archivo que ayude a resolver la incidencia.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-exchange-alt"></i> <strong>Mantener un Diálogo Fluido</strong></h6>
                    <p class="text-muted">
                        La comunicación es bidireccional. No dudes en hacer preguntas 
                        si no entiendes algo de la respuesta.
                    </p>

                    <h6><i class="fas fa-clock"></i> <strong>Tiempos de Respuesta</strong></h6>
                    <p class="text-muted">
                        El equipo procura responder dentro de un plazo razonable, 
                        aunque el tiempo exacto dependerá de la complejidad y carga de trabajo.
                    </p>

                    <h6><i class="fas fa-trash"></i> <strong>Gestión de Comentarios</strong></h6>
                    <p class="text-muted">
                        Puedes ver todos tus comentarios en el ticket. 
                        Solo podrás eliminar tus propios comentarios, no los del equipo.
                    </p>
                </div>
            </div>

            <div class="mt-3 alert alert-warning">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <strong>Importante:</strong> Responde prontamente a los comentarios del equipo. 
                Si no respondes en un período prolongado, el ticket puede ser puesto en pausa 
                o cerrado automáticamente.
            </div>
        </div>
    </div>

    {{-- Permiso y restricciones --}}
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-ban mr-2"></i>
                Lo que Puedes y No Puedes Hacer
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-check text-success"></i> <strong>Lo que SÍ Puedes Hacer:</strong></h6>
                    <ul class="text-muted">
                        <li>Crear tickets nuevos en cualquier momento</li>
                        <li>Editar tus tickets mientras estén en estado "Nuevo"</li>
                        <li>Añadir comentarios mientras el ticket esté abierto</li>
                        <li>Marcar un ticket resuelto como cerrado (validación)</li>
                        <li>Reabrir un ticket si la solución no fue satisfactoria</li>
                        <li>Eliminar tus propios comentarios</li>
                        <li>Visualizar todo el historial de tu ticket</li>
                        <li>Buscar y filtrar tus tickets</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-times text-danger"></i> <strong>Lo que NO Puedes Hacer:</strong></h6>
                    <ul class="text-muted">
                        <li>Cambiar el estado de un ticket (solo el administrador)</li>
                        <li>Asignarte a ti mismo un ticket</li>
                        <li>Eliminar tickets completamente</li>
                        <li>Eliminar comentarios de administradores</li>
                        <li>Editar tickets después de que estén asignados</li>
                        <li>Ver tickets de otros usuarios</li>
                        <li>Cambiar la prioridad una vez creado</li>
                        <li>Crear categorías de tipos nuevas</li>
                    </ul>
                </div>
            </div>

            <div class="mt-3 alert alert-info">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>Nota:</strong> Todas las acciones realizadas en el sistema quedan registradas 
                y son auditables por los administradores. Esto garantiza transparencia y seguridad.
            </div>
        </div>
    </div>

    {{-- Buenas prácticas --}}
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-star mr-2"></i>
                Mejores Prácticas y Recomendaciones
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>1. Ser Específico y Preciso</h6>
                    <p class="text-muted text-sm">
                        No generalices. Proporciona números, fechas, nombres exactos.
                    </p>

                    <h6>2. Revisar antes de Enviar</h6>
                    <p class="text-muted text-sm">
                        Lee tu descripción antes de crear el ticket. 
                        Asegúrate de que sea clara y completa.
                    </p>

                    <h6>3. Una Solicitud por Ticket</h6>
                    <p class="text-muted text-sm">
                        Si tienes 3 problemas diferentes, crea 3 tickets diferentes. 
                        Facilita el seguimiento.
                    </p>

                    <h6>4. Usar el Tipo Correcto</h6>
                    <p class="text-muted text-sm">
                        Selecciona la categoría más apropiada para que llegue 
                        al equipo correcto.
                    </p>
                </div>
                <div class="col-md-6">
                    <h6>5. Respetar la Prioridad</h6>
                    <p class="text-muted text-sm">
                        Marca como urgente solo lo que realmente lo es. 
                        Abusa de esto y perderás credibilidad.
                    </p>

                    <h6>6. Responder Prontamente</h6>
                    <p class="text-muted text-sm">
                        Si el equipo pide información, responde rápidamente. 
                        Los retrasos alargan la resolución.
                    </p>

                    <h6>7. Mantener el Respeto</h6>
                    <p class="text-muted text-sm">
                        Sé cortés en los comentarios. El equipo está aquí para ayudarte, 
                        no para ser atacado.
                    </p>

                    <h6>8. Seguimiento Regular</h6>
                    <p class="text-muted text-sm">
                        Revisa tus tickets periódicamente. Usa las notificaciones 
                        para estar al tanto de cambios.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Resumen rápido --}}
    <div class="card card-outline card-light">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-cogs mr-2"></i>
                Información Técnica
            </h3>
        </div>
        <div class="card-body">
            <p>
                Este sistema ha sido desarrollado con <strong>Laravel</strong>, 
                un framework moderno y robusto de código abierto. La aplicación utiliza 
                una arquitectura basada en contenedores Docker para garantizar 
                estabilidad, escalabilidad y seguridad. Las notificaciones funcionan 
                mediante un sistema de colas, y todos los datos están protegidos 
                en una base de datos con controles de seguridad avanzados.
            </p>
            <p class="text-muted mb-0">
                Lo importante es que esto significa: rapidez, confiabilidad y seguridad en el manejo de tus solicitudes.
            </p>
        </div>
    </div>

    {{-- Consejo final --}}
    <div class="alert alert-success mt-4">
        <i class="fas fa-check-circle mr-2"></i>
        <strong>Resumen Final:</strong> Un buen ticket comienza con una descripción clara y detallada. 
        Invierte 5 minutos escribiendo correctamente tu solicitud inicial y ahórrate 
        días de idas y venidas solicitando aclaraciones. ¡El equipo te lo agradecerá!
    </div>

</div>
@endsection
