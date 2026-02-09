@extends('layouts.user')

@section('title', 'Ayuda · Introducción')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Introducción y Primeros Pasos</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Ayuda</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- 1. Bienvenida y Propósito --}}
    <div class="card card-outline card-primary mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-users mr-2"></i>
                Bienvenido al Portal de Usuarios
            </h3>
        </div>
        <div class="card-body">
            <p class="lead">
                Bienvenido a la plataforma de gestión de incidencias y soporte (Tickets). 
                Esta herramienta ha sido diseñada para centralizar, organizar y agilizar toda la comunicación entre tú y el equipo de soporte técnico/administración.
            </p>
            <p>
                A través de este portal, podrás reportar problemas, realizar solicitudes de servicio, consultar el estado de tus peticiones anteriores y mantener una comunicación directa y registrada con los responsables de resolver tus incidencias.
            </p>
            
            <h5 class="mt-4 text-primary"><i class="fas fa-check-circle mr-1"></i> Lo que PUEDES hacer:</h5>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-plus text-success mr-2"></i> <strong>Crear Tickets:</strong> Abrir nuevas solicitudes de soporte detallando tu problema o requerimiento.</li>
                        <li class="list-group-item"><i class="fas fa-search text-info mr-2"></i> <strong>Consultar Historial:</strong> Ver todos los tickets que has creado, filtrarlos y buscar por palabras clave.</li>
                        <li class="list-group-item"><i class="fas fa-comments text-primary mr-2"></i> <strong>Comentar:</strong> Dialogar con los agentes mediante un hilo de comentarios dentro de cada ticket.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-bell text-warning mr-2"></i> <strong>Recibir Notificaciones:</strong> Estar al tanto de actualizaciones, cambios de estado o respuestas en tus tickets.</li>
                        <li class="list-group-item"><i class="fas fa-check-double text-success mr-2"></i> <strong>Validar Soluciones:</strong> Confirmar si la solución propuesta por el agente ha resuelto tu problema.</li>
                        <li class="list-group-item"><i class="fas fa-edit text-secondary mr-2"></i> <strong>Editar/Eliminar:</strong> Modificar la información de tus tickets o eliminarlos (bajo ciertas condiciones).</li>
                    </ul>
                </div>
            </div>

            <h5 class="mt-4 text-danger"><i class="fas fa-times-circle mr-1"></i> Lo que NO puedes hacer:</h5>
            <ul>
                <li>Ver los tickets de otros usuarios (por privacidad y seguridad).</li>
                <li>Asignar tickets a administradores específicos (el sistema o los administradores se encargan de la asignación).</li>
                <li>Modificar un ticket una vez que ha sido cerrado (aunque podrás consultarlo).</li>
            </ul>
        </div>
    </div>

    {{-- 2. Interfaz Principal (Dashboard) --}}
    <div class="card card-outline card-info mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tachometer-alt mr-2"></i>
                Panel de Control del usuario (Dashboard)
            </h3>
        </div>
        <div class="card-body">
            <p>
                Al iniciar sesión, accederás inmediatamente a tu <strong>Panel de Control</strong>. Esta es tu "base de operaciones".
            </p>
            
            <div class="text-center my-4 border bg-light p-3">
                <img src="/img/user-control-panel.png" class="img-fluid border shadow-sm" alt="Captura del Dashboard">
                <p class="small text-muted">Ejemplo del Panel de Control del Usuario</p>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="info-box bg-light mb-3">
                        <span class="info-box-icon bg-success"><i class="fas fa-ticket-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tickets Abiertos</span>
                            <span class="progress-description text-muted small">
                                En color <strong>Verde</strong>. Tickets activos que están siendo atendidos.
                            </span>
                        </div>
                    </div>
                     <div class="info-box bg-light mb-3">
                        <span class="info-box-icon bg-primary"><i class="fas fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tickets Resueltos</span>
                            <span class="progress-description text-muted small">
                                En color <strong>Azul</strong>. Solucionados pero pendientes de que los valides.
                            </span>
                        </div>
                    </div>
                     <div class="info-box bg-light mb-3">
                        <span class="info-box-icon bg-warning"><i class="fas fa-clock"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tickets Pendientes</span>
                            <span class="progress-description text-muted small">
                                En color <strong>Amarillo</strong>. Tickets esperando acción.
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h4>Componentes del Panel:</h4>
                    <dl class="row">
                        <dt class="col-sm-4">Resumen de Estado</dt>
                        <dd class="col-sm-8">Tres tarjetas de colores (Verde, Azul, Amarillo) que te dan un vistazo rápido de cuántos tickets tienes en cada situación.</dd>

                        <dt class="col-sm-4">Últimos Tickets</dt>
                        <dd class="col-sm-8">Una lista en la parte inferior con los tickets que han tenido actividad reciente. Incluye botones rápidos para <span class="badge badge-primary"><i class="fas fa-eye"></i> Ver</span> y <span class="badge badge-warning"><i class="fas fa-edit"></i> Editar</span>.</dd>
                        
                        <dt class="col-sm-4">Crear Rápido</dt>
                        <dd class="col-sm-8">Un botón en la parte superior derecha de la tarjeta principal para abrir una nueva incidencia al instante.</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. Mi Perfil --}}
    <div class="card card-outline card-secondary mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-id-card mr-2"></i>
                Mi Perfil
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p>
                        Puedes acceder a tu perfil haciendo clic en tu nombre en la esquina superior derecha y seleccionando el icono <strong><i class="fas fa-user fa-2x mb-2"></i></strong> o bien haciendo click sobre <strong>tu nombre  en el menu lateral</strong>.
                    </p>
                    <p>
                        En esta sección podrás visualizar tus datos registrados en el sistema:
                    </p>
                    <ul>
                        <li>Nombre completo.</li>
                        <li>Correo electrónico asociado.</li>
                        <li>Fecha de registro.</li>
                    </ul>
                    <div class="alert alert-info">
                        <i class="icon fas fa-info"></i>
                        <strong>Nota Importante:</strong> Por razones de seguridad, la edición de datos sensibles (como el correo electrónico) está restringida. Si necesitas corregir un dato erróneo, por favor crea un ticket solicitándolo a un administrador.
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="/img/options-menu-bar.png" class="img-fluid border shadow-sm" alt="Captura del Perfil">
                    <p class="small text-muted">Ejemplo del menú de opciones</p>
                    <img src="/img/user-profile-side-menu-option.png" class="img-fluid border shadow-sm mt-3" alt="Captura del Perfil">
                    <p class="small text-muted">Ejemplo de acceso al perfil desde el menú lateral</p>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. Soporte y Ayuda --}}
    <div class="card card-outline card-success">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-life-ring mr-2"></i>
                ¿Necesitas más ayuda?
            </h3>
        </div>
        <div class="card-body">
            <p>
                Esta sección de ayuda se divide en tres partes fundamentales. Te recomendamos leerlas para dominar la herramienta:
            </p>
            <div class="row text-center">
                <div class="col-md-2 mb-3 offset-md-1">
                     <a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}" class="btn btn-app bg-primary disabled" style="width: 100%; height: auto; padding: 20px;">
                        <i class="fas fa-book fa-2x mb-2"></i><br> Introducción
                    </a>
                </div>
                <div class="col-md-2 mb-3">
                    <a href="{{ route('user.help.tickets', ['locale' => app()->getLocale()]) }}" class="btn btn-app bg-info" style="width: 100%; height: auto; padding: 20px;">
                        <i class="fas fa-ticket-alt fa-2x mb-2"></i><br> Tickets
                    </a>
                </div>
                <div class="col-md-2 mb-3">
                    <a href="{{ route('user.help.notifications', ['locale' => app()->getLocale()]) }}" class="btn btn-app bg-warning" style="width: 100%; height: auto; padding: 20px;">
                        <i class="fas fa-bell fa-2x mb-2"></i><br> Notificaciones
                    </a>
                </div>
                <div class="col-md-2 mb-3">
                    <a href="{{ route('user.help.profile', ['locale' => app()->getLocale()]) }}" class="btn btn-app bg-secondary" style="width: 100%; height: auto; padding: 20px;">
                        <i class="fas fa-user fa-2x mb-2"></i><br> Mi Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
