@extends('layouts.user')

@section('title', 'Ayuda · Notificaciones')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Sistema de Notificaciones</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">Notificaciones</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- EXPLICACIÓN GENERAL --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bell mr-2"></i> ¿Cómo funcionan?</h3>
                </div>
                <div class="card-body">
                    <p>
                        El sistema de notificaciones está diseñado para mantenerte informado en tiempo real sobre la actividad de tus tickets, sin que tengas que entrar a revisarlos uno por uno constantemente.
                    </p>
                    <p>
                        Esta funcionalidad te permite desenfocarte de la aplicación y volver a ella solo cuando realmente hay novedades que requieren tu atención.
                    </p>
                    <p>
                        <strong>Recibirás una notificación automática cuando:</strong>
                    </p>
                    <ul>
                        <li>Un administrador <strong>responda</strong> a uno de tus tickets (Nuevo comentario).</li>
                        <li>El <strong>estado</strong> de tu ticket cambie (ej. pasa de "Pendiente" a "Resuelto").</li>
                        <li>Se te asigne una acción específica o se requiera tu validación.</li>
                        <li>Se cree un evento importante relacionado con tu cuenta.</li>
                    </ul>
                </div>
            </div>

            {{-- GESTIÓN DE NOTIFICACIONES --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-envelope-open-text mr-2"></i> Gestionar mis avisos</h3>
                </div>
                <div class="card-body">
                    <h5>1. El Icono de La Campana</h5>
                    <p>
                        En la barra superior de la aplicación (arriba a la derecha), verás un icono de campana <i class="far fa-bell"></i>.
                    </p>
                     <div class="row align-items-center mb-3">
                        <div class="col-md-4 text-center">
                            <span class="fa-stack fa-2x">
                              <i class="fas fa-circle fa-stack-2x text-light"></i>
                              <i class="far fa-bell fa-stack-1x"></i>
                              <span class="badge badge-warning" style="position:absolute; top:0; right:0;">3</span>
                            </span>
                            <p class="small text-muted">Ejemplo de icono con alertas</p>
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li>Si tiene un número rojo <span class="badge badge-warning">3</span>, indica cuántas notificaciones <strong>no leídas</strong> tienes.</li>
                                <li>Al hacer clic en él, se despliega una vista rápida de las últimas alertas con un resumen breve.</li>
                                <li>Desde ese desplegable puedes ir a "Ver todas las notificaciones".</li>
                            </ul>
                        </div>
                    </div>

                    <hr>
                    <h5>2. La Pantalla de "Mis Notificaciones"</h5>
                    <p>
                        Accediendo desde el menú lateral o desde "Ver todas" en la campana, llegarás a la lista completa.
                    </p>
                    <div class="text-center my-4 border bg-light p-3">
                        <img src="/img/user-notifications-table.png" class="img-fluid border shadow-sm" alt="Lista de Notificaciones">
                        <p class="small text-muted">Ejemplo de pantalla de "Mis Notificaciones"</p>
                    </div>
                    <p>
                        Aquí puedes realizar las siguientes acciones para organizar tu bandeja de entrada:
                    </p>
                    <dl class="row">
                        <dt class="col-sm-3"><i class="fas fa-check text-green"></i> Marcar como Leída</dt>
                        <dd class="col-sm-9">
                            Si ya has visto el aviso, puedes marcarlo como leído. Esto hará que el contador rojo disminuya y la notificación se muestre visualmente como "ya vista" (generalmente con fondo blanco en lugar de gris/azul).
                            <br>Busca el botón <i class="fas fa-check"></i> junto a la notificación.
                        </dd>

                        <dt class="col-sm-3"><i class="fas fa-times text-yellow"></i> Marcar como No Leída</dt>
                        <dd class="col-sm-9">
                            Si leíste una notificación por error pero quieres dejarla pendiente para revisarla luego con calma, puedes volver a marcarla como "No leída".
                        </dd>

                        <dt class="col-sm-3"><i class="fas fa-ticket-alt text-blue"></i> Ir al Ticket</dt>
                        <dd class="col-sm-9">
                            Esta es la acción más común. Al hacer clic en el texto o enlace de la notificación (ej. "Nuevo comentario en el ticket #123"), el sistema mostrará un modal, el cual mostrará la información de la notificación en detalle
                            junto con una opción <strong>"Ver Ticket"</strong>, que te llevará directamente a la pantalla del ticket correspondiente para que veas la novedad y respondas.
                        </dd>
                        <div class="col-12 text-center my-4">
                            <div class="d-inline-block border bg-light p-3">
                                <img src="/img/user-modal-notifications.png" class="img-fluid border shadow-sm my-3" alt="Modal de Notificación">
                                <p class="small text-muted mb-0">Ejemplo de modal al hacer clic en una notificación</p>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            {{-- CONSEJOS --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-lightbulb mr-2"></i> Consejos de Uso</h3>
                </div>
                <div class="card-body">
                    <div class="callout callout-success">
                        <h5>¡Mantén tu bandeja limpia!</h5>
                        <p>Intenta marcar como leídas las notificaciones que ya has atendido. Esto te ayudará a identificar rápidamente cuando llegue algo realmente nuevo y urgente, evitando que se pierda entre avisos viejos.</p>
                    </div>
                    <div class="callout callout-info">
                        <h5>No las ignores</h5>
                        <p>Si recibes una notificación de "Ticket Resuelto", es muy importante que entres a validar la solución. Si ignoras estas notificaciones, tus tickets podrían quedarse "en el limbo" sin cerrarse oficialmente.</p>
                    </div>
                </div>
            </div>
            
            {{-- FAQ RÁPIDO --}}
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3 class="card-title">Preguntas Frecuentes</h3>
                </div>
                <div class="card-body">
                    <strong>¿Recibo correos electrónicos?</strong>
                    <p class="text-muted text-sm">Sí, dependiendo de la configuración global del sistema, normalmente recibirás una copia de estas alertas en tu email registrado para que te enteres incluso si no estás logueado en la web.</p>
                    <hr>
                    <strong>¿Puedo borrar notificaciones permanentemente?</strong>
                    <p class="text-muted text-sm">El sistema generalmente guarda el historial de notificaciones para que puedas consultarlo en el futuro como referencia de actividad. Céntrate en usar el estado "Leído" para organizarte.</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
