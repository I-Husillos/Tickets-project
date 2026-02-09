@extends('layouts.admin')

@section('title', 'Manual Operativo · Introducción y Dashboard')

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">Manual del Administrador: Introducción y Entorno</h1>
            <p class="text-muted">Guía completa de familiarización con la interfaz de gestión IT.</p>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Ayuda</a></li>
                <li class="breadcrumb-item active">Introducción</li>
            </ol>
        </div>
    </div>

    {{-- BLOQUE 1: BIENVENIDA Y FILOSOFÍA --}}
    <div class="card card-primary card-outline shadow-sm">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-home mr-2"></i> Bienvenida al Centro de Comando</h3>
        </div>
        <div class="card-body text-justify">
            <p class="lead">
                Bienvenido al Panel de Administración del Sistema de Tickets. Esta herramienta ha sido diseñada no solo como un repositorio de problemas, sino como un <strong>Centro de Resolución de Incidencias</strong>.
            </p>
            <p>
                Como administrador, usted tiene la responsabilidad de orquestar la solución a los problemas reportados por los usuarios finales. 
                El sistema centraliza todas las solicitudes, eliminando el caos de los correos electrónicos dispersos, llamadas telefónicas no registradas y mensajes de pasillo. 
                Aquí, cada solicitud tiene un número, un responsable y un estado.
            </p>
            <div class="alert alert-info">
                <strong><i class="fas fa-info-circle"></i> Objetivo del Sistema:</strong> 
                Minimizar el tiempo de inactividad de los usuarios (Downtime) y maximizar la transparencia en la gestión del departamento de IT.
            </div>
        </div>
    </div>

    {{-- BLOQUE 2: EL DASHBOARD PRINCIPAL --}}
    <div class="card card-outline card-secondary mt-4 shadow-sm">
        <div class="card-header bg-light">
            <h3 class="card-title text-dark"><i class="fas fa-tachometer-alt mr-2"></i> Análisis del Dashboard Principal</h3>
        </div>
        <div class="card-body">
            <p>
                Al iniciar sesión, lo primero que verá es el <strong>Dashboard</strong>. Este panel es su "termómetro" para medir la salud actual del servicio de soporte.
                Está compuesto por métricas clave (KPIs) y Widgets de acceso rápido.
            </p>

            {{-- ESPACIO PARA CAPTURA: DASHBOARD COMPLETO --}}
            <div class="row justify-content-center my-4">
                <div class="col-md-11 border p-4 bg-light text-center rounded">
                    <img src="/img/image%20copy%204.png" class="img-fluid border shadow-sm" alt="Dashboard General">
                </div>
                <div class="col-12 text-center mt-2">
                    <small class="text-muted">Fig 1.1 - Visión general del cuadro de mando.</small>
                </div>
            </div>

            <h5 class="text-primary mt-4">Desglose de Indicadores</h5>
            <div class="row">
                <div class="col-md-3">
                    <div class="callout callout-info">
                        <strong>Tickets Abiertos</strong>
                        <p class="small text-muted mb-0">La carga de trabajo actual. Si este número crece constantemente sin bajar, el equipo de soporte tiene un cuello de botella.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="callout callout-success">
                        <strong>Tickets Resueltos</strong>
                        <p class="small text-muted mb-0">Medida de productividad histórica. Un número alto indica un departamento activo y eficaz.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="callout callout-warning">
                        <strong>Usuarios Registrados</strong>
                        <p class="small text-muted mb-0">El alcance del sistema. Indica cuántas personas tienen potencial para generar incidencias.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="callout callout-danger">
                        <strong>Tickets Críticos</strong>
                        <p class="small text-muted mb-0">Si existiera funcionalidad de prioridad, aquí veríamos las emergencias absolutas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BLOQUE 3: CONOCIENDO LA INTERFAZ --}}
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header bg-navy">
                    <h3 class="card-title">Barra Lateral (Sidebar)</h3>
                </div>
                <div class="card-body">
                    <p>La barra lateral izquierda es su herramienta de navegación principal. Está dividida en secciones lógicas:</p>
                    <dl>
                        <dt><i class="fas fa-tachometer-alt text-primary"></i> Dashboard</dt>
                        <dd>Vuelta al inicio.</dd>

                        <dt><i class="fas fa-ticket-alt text-warning"></i> Gestión de Tickets</dt>
                        <dd>
                            Donde pasará el 90% de su tiempo.
                            <ul>
                                <li><strong>Todos los Tickets:</strong> Visión global.</li>
                                <li><strong>Tickets Asignados:</strong> Su cola personal de trabajo.</li>
                            </ul>
                        </dd>

                        <dt><i class="fas fa-users text-success"></i> Gestión de Clientes</dt>
                        <dd>Solo Visible para Superadmins. Permite administrar la base de datos de usuarios.</dd>

                        <dt><i class="fas fa-cogs text-secondary"></i> Configuración</dt>
                        <dd>Ajustes de tipos de incidentes, categorías y cuentas de staff.</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header bg-navy">
                    <h3 class="card-title">Iconografía Común</h3>
                </div>
                <div class="card-body">
                    <p>A lo largo de la aplicación encontrará botones de acción estandarizados. Conocerlos acelerará su flujo de trabajo:</p>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Icono</th>
                                    <th>Acción</th>
                                    <th>Contexto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><i class="fas fa-eye text-primary"></i></td>
                                    <td><strong>Ver Detalle</strong></td>
                                    <td>Abre el ticket o usuario en modo lectura/edición.</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i class="fas fa-edit text-info"></i></td>
                                    <td><strong>Editar</strong></td>
                                    <td>Modificar propiedades (cambiar email, título, tipo).</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i class="fas fa-trash text-danger"></i></td>
                                    <td><strong>Eliminar</strong></td>
                                    <td>Borrado permanente. Use con extrema precaución.</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i class="fas fa-user-plus text-warning"></i></td>
                                    <td><strong>Asignar</strong></td>
                                    <td>Tomar responsabilidad de un ticket.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
