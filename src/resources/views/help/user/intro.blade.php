@extends('layouts.user')

@section('title', 'Ayuda · Introducción')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Introducción</h1>
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
                Bienvenido al sistema de gestión de tickets
            </h3>
        </div>
        <div class="card-body">
            <p>
                Esta aplicación ha sido diseñada para facilitar la comunicación
                entre los usuarios y el equipo administrador mediante un sistema
                de tickets claro, estructurado y fácil de usar.
            </p>
            <p>
                A través de este sistema podrás registrar incidencias,
                realizar solicitudes y hacer seguimiento de su estado sin
                necesidad de usar correos electrónicos u otros canales externos.
            </p>
        </div>
    </div>

    {{-- Qué es un ticket --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-info-circle mr-2"></i>
                ¿Qué es un ticket?
            </h3>
        </div>
        <div class="card-body">
            <p>
                Un <strong>ticket</strong> es una solicitud registrada en el sistema
                que representa una incidencia, problema o petición concreta.
            </p>
            <p>
                Cada ticket queda almacenado con su información, estado,
                prioridad y un historial de acciones, permitiendo un seguimiento
                transparente y ordenado.
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
                        Crear tickets
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        Podrás crear nuevos tickets indicando un título claro,
                        una descripción detallada, el tipo de incidencia y su prioridad.
                    </p>
                    <p class="text-muted mb-0">
                        Cuanta más información aportes, más rápida será la respuesta.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-outline card-info h-100">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-search mr-2"></i>
                        Consultar estado
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        En cualquier momento podrás consultar el estado de tus tickets:
                        pendiente, en proceso, resuelto o cerrado.
                    </p>
                    <p class="text-muted mb-0">
                        El estado refleja el progreso de tu solicitud.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-outline card-warning h-100">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bell mr-2"></i>
                        Recibir notificaciones
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        El sistema te notificará automáticamente cuando un administrador
                        responda o cuando el estado del ticket cambie.
                    </p>
                    <p class="text-muted mb-0">
                        Así no tendrás que revisar manualmente cada solicitud.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Flujo básico --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-route mr-2"></i>
                Flujo básico de funcionamiento
            </h3>
        </div>
        <div class="card-body">
            <ol>
                <li>Creas un ticket desde el menú <strong>Tickets</strong>.</li>
                <li>El ticket queda registrado en el sistema.</li>
                <li>Un administrador revisa y gestiona la solicitud.</li>
                <li>Puedes añadir comentarios si se requiere más información.</li>
                <li>Recibes notificaciones con cada cambio relevante.</li>
            </ol>
        </div>
    </div>

    {{-- Casos de uso comunes --}}
    <div class="card card-outline card-warning">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-lightbulb mr-2"></i>
                Casos de uso comunes
            </h3>
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Reportar un error:</strong> Si encuentras un fallo en la aplicación</li>
                <li><strong>Solicitar una funcionalidad:</strong> Propuestas de mejora o nuevas características</li>
                <li><strong>Consultarsobre un proceso:</strong> Dudas sobre cómo usar la plataforma</li>
                <li><strong>Problemas de acceso:</strong> Si no puedes acceder a tu cuenta o datos</li>
                <li><strong>Actualizaciones de datos:</strong> Cambios en tu información personal o preferencias</li>
            </ul>
        </div>
    </div>

    {{-- Requisitos de un buen ticket --}}
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-check-double mr-2"></i>
                Requisitos para un buen ticket
            </h3>
        </div>
        <div class="card-body">
            <p>Para que tu ticket sea resuelto más rápidamente, incluye:</p>
            <ul>
                <li>✅ <strong>Título claro:</strong> resume el problema en pocas palabras</li>
                <li>✅ <strong>Descripción detallada:</strong> explica qué ocurre y en qué contexto</li>
                <li>✅ <strong>Pasos para reproducir:</strong> si es un error, indica cómo se genera</li>
                <li>✅ <strong>Tipo correcto:</strong> selecciona la categoría adecuada</li>
                <li>✅ <strong>Prioridad realista:</strong> sé honesto sobre la urgencia</li>
            </ul>
        </div>
    </div>

    {{-- Ciclo de vida --}}
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-sync-alt mr-2"></i>
                Ciclo de vida de un ticket
            </h3>
        </div>
        <div class="card-body">
            <p>Tus tickets pueden cambiar de estado varias veces:</p>
            <ol>
                <li><strong>Nuevo:</strong> Acabas de crearlo</li>
                <li><strong>Asignado:</strong> Un administrador se responsabiliza</li>
                <li><strong>En proceso:</strong> Están trabajando en tu solicitud</li>
                <li><strong>Pendiente información:</strong> Se requieren datos adicionales de ti</li>
                <li><strong>Resuelto:</strong> Tu incidencia ha sido solucionada</li>
                <li><strong>Cerrado:</strong> El ticket está finalizado definitivamente</li>
            </ol>
        </div>
    </div>

    {{-- Comunicación y comentarios --}}
    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-comments mr-2"></i>
                Comunicación con el equipo
            </h3>
        </div>
        <div class="card-body">
            <p>Dentro de cada ticket puedes:</p>
            <ul>
                <li>📝 <strong>Añadir comentarios:</strong> proporciona más información cuando se solicite</li>
                <li>🔔 <strong>Recibir respuestas:</strong> el equipo responderá dentro del ticket</li>
                <li>📎 <strong>Adjuntar archivos:</strong> si es necesario enviar documentos o capturas</li>
                <li>🔄 <strong>Comunicación bidireccional:</strong> mantén un diálogo fluido</li>
            </ul>
        </div>
    </div>

    {{-- Nota técnica suave --}}
    <div class="card card-outline card-light">
        <div class="card-body">
            <p class="mb-0">
                <i class="fas fa-cogs mr-2"></i>
                Este sistema ha sido desarrollado con <strong>Laravel</strong> y utiliza
                una arquitectura moderna basada en contenedores Docker, garantizando
                estabilidad, seguridad y buen rendimiento.
            </p>
        </div>
    </div>

    {{-- Aviso importante --}}
    <div class="alert alert-info mt-3">
        <i class="fas fa-info-circle mr-2"></i>
        <strong>Consejo:</strong> Describe correctamente tu incidencia al crear un ticket.
        Cuanta más información aportes, más rápida y efectiva será la resolución.
    </div>

</div>
@endsection
