@extends('layouts.user')

@section('title', 'Ayuda · Tickets')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Gestión de tickets</h1>
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

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-plus-circle mr-2"></i>
                Crear un ticket
            </h3>
        </div>
        <div class="card-body">
            <ol>
                <li>Accede al apartado <strong>Tickets</strong>.</li>
                <li>Pulsa en <strong>Nuevo ticket</strong>.</li>
                <li>Completa el formulario con información clara y detallada.</li>
                <li>Envía el ticket para su revisión.</li>
            </ol>
        </div>
    </div>

    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tags mr-2"></i>
                Prioridades y estados
            </h3>
        </div>
        <div class="card-body">
            <p><strong>Prioridades:</strong></p>
            <ul>
                <li><span class="badge badge-danger">Alta</span> – Incidencias urgentes</li>
                <li><span class="badge badge-warning">Media</span> – Importantes</li>
                <li><span class="badge badge-success">Baja</span> – Informativas</li>
            </ul>

            <p class="mt-3"><strong>Estados del ticket:</strong></p>
            <ul>
                <li><span class="badge badge-secondary">Pendiente</span></li>
                <li><span class="badge badge-primary">En proceso</span></li>
                <li><span class="badge badge-success">Resuelto</span></li>
                <li><span class="badge badge-dark">Cerrado</span></li>
            </ul>
        </div>
    </div>

    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-lightbulb mr-2"></i>
                Información detallada de un ticket
            </h3>
        </div>
        <div class="card-body">
            <p>Cada ticket contiene los siguientes datos:</p>
            <ul>
                <li><strong>Identificador (ID):</strong> número único para referenciar el ticket</li>
                <li><strong>Título:</strong> asunto o resumen del problema</li>
                <li><strong>Descripción:</strong> detalles y contexto de la incidencia</li>
                <li><strong>Tipo:</strong> categoría del ticket (Técnico, Administrativo, etc.)</li>
                <li><strong>Prioridad:</strong> urgencia de la resolución</li>
                <li><strong>Estado:</strong> situación actual del ticket</li>
                <li><strong>Administrador asignado:</strong> responsable de gestionarlo</li>
                <li><strong>Fechas:</strong> creación, última actualización y resolución</li>
            </ul>
        </div>
    </div>

    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-eye mr-2"></i>
                Ver mis tickets
            </h3>
        </div>
        <div class="card-body">
            <p>En el apartado <strong>Mis tickets</strong> puedes:</p>
            <ul>
                <li>📋 Ver el listado de todos tus tickets</li>
                <li>🔍 Buscar tickets por título</li>
                <li>📊 Filtrar por estado o prioridad</li>
                <li>📖 Ver detalles completos de cada uno</li>
                <li>💬 Leer comentarios del administrador</li>
                <li>✏️ Añadir comentarios cuando sea necesario</li>
            </ul>
        </div>
    </div>

    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-pen-square mr-2"></i>
                Editar y comentar
            </h3>
        </div>
        <div class="card-body">
            <p>Una vez creado el ticket, puedes:</p>
            <ul>
                <li>✏️ <strong>Editar tu descripción inicial:</strong> si necesitas aclarar detalles</li>
                <li>💬 <strong>Agregar comentarios:</strong> responde a las preguntas del administrador</li>
                <li>📝 <strong>Proporcionar información adicional:</strong> cuando la soliciten</li>
                <li>⏱️ <strong>Consultar tiempos de respuesta:</strong> visualiza cuándo se actualizó</li>
            </ul>
            <p class="text-muted mt-2">
                Los cambios realizados quedan registrados en el historial del ticket.
            </p>
        </div>
    </div>

    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-shield-alt mr-2"></i>
                Estados del ticket (detallados)
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td><span class="badge badge-secondary">Pendiente</span></td>
                        <td>El ticket ha sido creado y está esperando ser asignado</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-primary">En proceso</span></td>
                        <td>Un administrador está trabajando en tu solicitud</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-warning">Esperando información</span></td>
                        <td>Se necesitan datos o aclaraciones por tu parte</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-success">Resuelto</span></td>
                        <td>Tu incidencia ha sido solucionada satisfactoriamente</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-dark">Cerrado</span></td>
                        <td>El ticket está finalizado y no aceptará nuevos comentarios</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Prioridades explicadas
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td><span class="badge badge-danger">Alta</span></td>
                        <td>Incidencias urgentes que afectan tu trabajo diario</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-warning">Media</span></td>
                        <td>Problemas importantes que pueden esperar algunos días</td>
                    </tr>
                    <tr>
                        <td><span class="badge badge-info">Baja</span></td>
                        <td>Mejoras, consultas o informaciones no urgentes</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-muted mt-2">
                Sé honesto con la prioridad. Marcar todo como urgente reduce la efectividad del sistema.
            </p>
        </div>
    </div>

    <div class="card card-outline card-light">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-lightbulb mr-2"></i>
                Consejos para mejores resultados
            </h3>
        </div>
        <div class="card-body">
            <ul>
                <li>📝 <strong>Sé específico:</strong> cuanta más información, mejor diagnóstico</li>
                <li>📸 <strong>Añade capturas:</strong> si es un error visual, muestra cómo se ve</li>
                <li>⏰ <strong>Incluye detalles técnicos:</strong> navegador, sistema operativo, etc.</li>
                <li>🔄 <strong>Responde rápido:</strong> si piden información, hazlo en el ticket</li>
                <li>🚫 <strong>Evita duplicados:</strong> no crees varios tickets por el mismo problema</li>
                <li>✅ <strong>Confirma la resolución:</strong> avisa cuando tu problema esté solucionado</li>
            </ul>
        </div>
    </div>

    <div class="alert alert-warning">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        Evita crear tickets duplicados y revisa tus tickets activos antes de enviar uno nuevo.
    </div>

</div>
@endsection
