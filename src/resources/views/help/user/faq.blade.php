@extends('layouts.user')

@section('title', 'Ayuda · Preguntas frecuentes')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Preguntas frecuentes</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a>
                </li>
                <li class="breadcrumb-item active">FAQ</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="accordion" id="faqAccordion">

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faq1">
                        ¿Cuántos tickets puedo crear?
                    </button>
                </h2>
            </div>
            <div id="faq1" class="collapse show" data-parent="#faqAccordion">
                <div class="card-body">
                    Puedes crear tantos tickets como necesites. Sin embargo, revisa primero si existe uno similar para evitar duplicados. Usa un único ticket para cada incidencia independiente.
                </div>
            </div>
        </div>

        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq2">
                        ¿Puedo cerrar un ticket?
                    </button>
                </h2>
            </div>
            <div id="faq2" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    No. Los tickets son cerrados exclusivamente por el administrador cuando la incidencia está completamente resuelta. Tú puedes indicar que tu problema está solucionado mediante un comentario.
                </div>
            </div>
        </div>

        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq3">
                        ¿Cuánto tiempo tardan en responder?
                    </button>
                </h2>
            </div>
            <div id="faq3" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Los tiempos de respuesta dependen de:
                    <ul>
                        <li>La prioridad del ticket</li>
                        <li>La carga actual del equipo</li>
                        <li>La complejidad de la incidencia</li>
                    </ul>
                    Recibirás notificaciones con cada actualización, así que no necesitas revisar constantemente.
                </div>
            </div>
        </div>

        <div class="card card-outline card-success">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq4">
                        ¿Qué hago si no veo mi ticket?
                    </button>
                </h2>
            </div>
            <div id="faq4" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Si acabas de crear un ticket, refresca la página (F5). Si aún no aparece:
                    <ul>
                        <li>Verifica que estés logueado con la cuenta correcta</li>
                        <li>Comprueba los filtros activos en la lista</li>
                        <li>Contacta al administrador si persiste el problema</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card card-outline card-warning">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq5">
                        ¿Cómo edito un ticket ya creado?
                    </button>
                </h2>
            </div>
            <div id="faq5" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Puedes editar la descripción inicial mientras el ticket esté abierto. Para añadir información, usa los comentarios. Esto es preferible porque mantiene un registro de todas las actualizaciones.
                </div>
            </div>
        </div>

        <div class="card card-outline card-danger">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq6">
                        ¿Qué pasa si respondo un ticket cerrado?
                    </button>
                </h2>
            </div>
            <div id="faq6" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Los tickets cerrados no aceptan nuevos comentarios. Si tienes una cuestión relacionada, abre un nuevo ticket haciendo referencia al anterior (por ejemplo: "Seguimiento del ticket #123").
                </div>
            </div>
        </div>

        <div class="card card-outline card-light">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq7">
                        ¿Quién puede ver mis tickets?
                    </button>
                </h2>
            </div>
            <div id="faq7" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Solo tú y los administradores autorizados pueden ver tus tickets. Los datos son confidenciales y está protegido por el sistema de autenticación.
                </div>
            </div>
        </div>

        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq8">
                        ¿Puedo imprimir o descargar un ticket?
                    </button>
                </h2>
            </div>
            <div id="faq8" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Puedes capturar la pantalla o imprimir la página directamente desde tu navegador (Ctrl+P o Cmd+P). En futuras versiones se añadirá la opción de descargar en PDF.
                </div>
            </div>
        </div>

        <div class="card card-outline card-info">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq9">
                        ¿Cómo cambio mi prioridad una vez creado?
                    </button>
                </h2>
            </div>
            <div id="faq9" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Si necesitas cambiar la prioridad después de crear el ticket, contacta con el administrador a través de un comentario. Eles evaluarán si la nueva prioridad es apropiada.
                </div>
            </div>
        </div>

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#faq10">
                        ¿Existe una API o integración?
                    </button>
                </h2>
            </div>
            <div id="faq10" class="collapse" data-parent="#faqAccordion">
                <div class="card-body">
                    Actualmente, la plataforma está diseñada para uso manual a través de la interfaz web. Consulta con el administrador si necesitas integraciones especiales con otros sistemas.
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
