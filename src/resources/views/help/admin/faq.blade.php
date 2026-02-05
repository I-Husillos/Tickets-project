@extends('layouts.admin')

@section('title', 'Ayuda · Preguntas Frecuentes')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <i class="fas fa-question-circle"></i>
                    Preguntas Frecuentes (FAQ)
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">
                            Ayuda
                        </a>
                    </li>
                    <li class="breadcrumb-item active">FAQ</li>
                </ol>
            </div>
        </div>
    </div>
@endsection


@section('admincontent')
    {{-- CONTENIDO --}}
    <div class="container-fluid">

        {{-- FAQ --}}
        <div class="card card-outline card-primary">
            <div class="card-body">

                <div class="accordion" id="faqAdmin">

                    {{-- FAQ 1 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button"
                                        data-toggle="collapse" data-target="#faq1">
                                    ❓ ¿Por qué no puedo ver todos los tickets?
                                </button>
                            </h2>
                        </div>
                        <div id="faq1" class="collapse show" data-parent="#faqAdmin">
                            <div class="card-body">
                                Solo los <strong>superadministradores</strong> tienen acceso a todos los tickets
                                del sistema. Los administradores normales solo ven los tickets asignados
                                para garantizar una correcta separación de responsabilidades.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq2">
                                    ❓ ¿Por qué se registran todas las acciones?
                                </button>
                            </h2>
                        </div>
                        <div id="faq2" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                El sistema registra las acciones para garantizar
                                <strong>trazabilidad, auditoría y seguridad</strong>.
                                Esto permite analizar incidencias, errores o usos indebidos.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq3">
                                    ❓ ¿Qué ocurre al cerrar un ticket?
                                </button>
                            </h2>
                        </div>
                        <div id="faq3" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Al cerrar un ticket:
                                <ul>
                                    <li>✔️ Se marca como finalizado</li>
                                    <li>✔️ Se notifica al usuario</li>
                                    <li>✔️ Se registra el evento</li>
                                </ul>
                                Un ticket cerrado no debería reabrirse salvo casos excepcionales.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 4 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq4">
                                    ❓ ¿Quién recibe las notificaciones?
                                </button>
                            </h2>
                        </div>
                        <div id="faq4" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Las notificaciones se envían a:
                                <ul>
                                    <li>👤 El administrador asignado</li>
                                    <li>👥 El usuario creador del ticket</li>
                                </ul>
                                Dependiendo del evento y la configuración del sistema.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 5 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq5">
                                    ❓ ¿Puedo eliminar usuarios o tickets?
                                </button>
                            </h2>
                        </div>
                        <div id="faq5" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                La eliminación de usuarios o tickets está restringida
                                a <strong>superadministradores</strong> y solo debe realizarse
                                cuando sea estrictamente necesario.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 6 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq6">
                                    ❓ ¿Cómo reasigno un ticket a otro administrador?
                                </button>
                            </h2>
                        </div>
                        <div id="faq6" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Desde la vista del ticket, usa el botón <strong>"Reasignar"</strong> 
                                para transferirlo a otro administrador. 
                                <ul>
                                    <li>Se registra la acción en el historial</li>
                                    <li>El nuevo administrador recibe una notificación</li>
                                    <li>Se mantiene el contexto de todos los comentarios</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 7 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq7">
                                    ❓ ¿Puedo cambiar la prioridad de un ticket?
                                </button>
                            </h2>
                        </div>
                        <div id="faq7" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Sí. Como administrador, puedes cambiar la prioridad si 
                                consideras que es necesario basándote en nuevos datos. 
                                <strong>Documenta el cambio en un comentario</strong>
                                explicando el motivo.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 8 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq8">
                                    ❓ ¿Cómo reabre un ticket que esté cerrado?
                                </button>
                            </h2>
                        </div>
                        <div id="faq8" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Los tickets cerrados pueden reabrirse en casos excepcionales.
                                <ul>
                                    <li>Contacta con el <strong>superadministrador</strong></li>
                                    <li>Explica claramente por qué necesita reabrirse</li>
                                    <li>Se registrará el evento para auditoría</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 9 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq9">
                                    ❓ ¿Qué debo hacer si cometo un error?
                                </button>
                            </h2>
                        </div>
                        <div id="faq9" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Si cometes un error (ej: asignar a la persona equivocada):
                                <ul>
                                    <li>Corrígelo inmediatamente</li>
                                    <li>Documenta qué pasó en un comentario</li>
                                    <li>Si es grave, notifica al superadministrador</li>
                                </ul>
                                Todo queda registrado, así que la transparencia es importante.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 10 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq10">
                                    ❓ ¿Cómo creo un nuevo tipo de ticket?
                                </button>
                            </h2>
                        </div>
                        <div id="faq10" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Solo los <strong>superadministradores</strong> pueden crear nuevos tipos. 
                                Si necesitas un nuevo tipo:
                                <ul>
                                    <li>Contacta con el superadministrador</li>
                                    <li>Explica para qué serviría</li>
                                    <li>Proporciona ejemplos de tickets que lo usarían</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 11 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq11">
                                    ❓ ¿Cómo reporte o escalo un problema?
                                </button>
                            </h2>
                        </div>
                        <div id="faq11" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                Para problemas que excedan tu alcance:
                                <ul>
                                    <li>🔔 Contacta al <strong>superadministrador</strong> directamente</li>
                                    <li>📋 Proporciona todos los detalles relevantes</li>
                                    <li>🔗 Incluye enlaces o referencias a los tickets</li>
                                    <li>⏱️ Indica la urgencia del problema</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 12 --}}
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#faq12">
                                    ❓ ¿Cómo veo el historial de un ticket?
                                </button>
                            </h2>
                        </div>
                        <div id="faq12" class="collapse" data-parent="#faqAdmin">
                            <div class="card-body">
                                En la vista del ticket, puedes ver:
                                <ul>
                                    <li>📝 Todos los comentarios en orden cronológico</li>
                                    <li>⏰ Fechas y responsables de cada cambio</li>
                                    <li>🔄 Cambios de estado y asignaciones</li>
                                    <li>📊 Información completa del historial de eventos</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- CIERRE --}}
        <div class="callout callout-info">
            <h5>
                <i class="fas fa-life-ring"></i>
                ¿No encuentras tu respuesta?
            </h5>
            <p>
                Consulta el resto de secciones de ayuda (Tickets, Usuarios, Notificaciones, Eventos)
                o revisa el historial de eventos para obtener más información.
            </p>
        </div>

    </div>
@endsection
