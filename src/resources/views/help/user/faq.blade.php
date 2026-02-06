@extends('layouts.user')

@section('title', 'Ayuda · Preguntas Frecuentes')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Preguntas Frecuentes (FAQ)</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">FAQ</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12" id="accordion">

            {{-- PREGUNTA 1 --}}
            <div class="card card-primary card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            1. ¿Por qué no puedo eliminar un ticket?
                        </h4>
                    </div>
                </a>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        El sistema solo permite eliminar tickets bajo ciertas condiciones (generalmente si acaban de crearse y no tienen respuestas). 
                        Si el ticket ya ha sido atendido por un administrador, se bloquea el borrado para mantener el historial de la incidencia.
                        Si cometiste un error, te recomendamos añadir un comentario indicando el fallo o pedir al administrador que lo cierre.
                    </div>
                </div>
            </div>

            {{-- PREGUNTA 2 --}}
            <div class="card card-primary card-outline">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            2. ¿Qué significa el estado "Resuelto"?
                        </h4>
                    </div>
                </a>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Significa que el administrador ha aplicado una solución y cree que el problema ha terminado.
                        Sin embargo, el ticket <strong>NO se cierra automáticamente</strong>. El sistema espera a que tú confirmes ("Valides") que realmente funciona.
                        Si no haces nada, el ticket quedará "Resuelto" pero no "Cerrado".
                    </div>
                </div>
            </div>

            {{-- PREGUNTA 3 --}}
            <div class="card card-primary card-outline">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            3. ¿Cómo adjunto una imagen o archivo?
                        </h4>
                    </div>
                </a>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Actualmente, el sistema de comentarios es principalmente de texto. 
                        Si necesitas enviar una captura de pantalla, te recomendamos subirla a un servicio externo seguro (si la política de la empresa lo permite) y pegar el enlace, 
                        o contactar con el soporte indicando que tienes archivos para enviar por correo.
                    </div>
                </div>
            </div>
            
            {{-- PREGUNTA 4 --}}
             <div class="card card-primary card-outline">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseFour">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                           4. ¿Cuánto tiempo tardan en responder?
                        </h4>
                    </div>
                </a>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Esto depende de la carga de trabajo y de la prioridad que hayas asignado (si es correcta). 
                        Generalmente, recibirás una primera respuesta o cambio de estado en las próximas 24-48 horas laborables.
                    </div>
                </div>
            </div>


        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12 text-center">
            <p class="text-muted">¿No encuentras tu duda?</p>
            <a href="{{ route('user.tickets.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success">
                <i class="fas fa-plus mr-2"></i> Crear un Ticket de Consulta
            </a>
        </div>
    </div>

</div>
@endsection
