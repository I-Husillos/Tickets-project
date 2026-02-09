@extends('layouts.admin')

@section('title', 'Manual Operativo · Introducción y Dashboard')

@section('admincontent')
<div class="container-fluid">
    <div class="row">
        {{-- MAIN CONTENT --}}
        <div class="col-12">
            
            {{-- HEADER --}}
            <div class="mb-4">
                <h1>Manual del Administrador: Introducción y Dashboard</h1>
                <p class="lead text-muted">Guía completa de familiarización con la interfaz de gestión IT y el cuadro de mando principal.</p>
            </div>

            {{-- 1. BIENVENIDA Y FILOSOFÍA --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-home mr-2"></i> Bienvenida al Centro de Resolución</h3>
                </div>
                <div class="card-body">
                    <p class="lead mb-4">
                        Bienvenido al Panel de Administración del Sistema de Tickets. Esta herramienta ha sido diseñada no solo como un repositorio de problemas, sino como un <strong>Centro de Resolución de Incidencias</strong>.
                    </p>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <p>
                                Como administrador, usted tiene la responsabilidad de orquestar la solución a los problemas reportados por los usuarios finales. 
                                El sistema centraliza todas las solicitudes, eliminando el caos de los correos electrónicos dispersos, llamadas telefónicas no registradas y mensajes de pasillo. 
                            </p>
                            <h5 class="mt-4 text-primary">Pilares del Sistema:</h5>
                            <ul class="mt-2">
                                <li><strong>Centralización:</strong> Toda la información técnica y comunicación en un solo lugar.</li>
                                <li><strong>Trazabilidad:</strong> Cada acción queda registrada con fecha, hora y autor en el historial.</li>
                                <li><strong>Eficiencia:</strong> Flujos de trabajo claros para asignar, gestionar y resolver incidencias.</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="alert alert-info h-100 d-flex flex-column justify-content-center">
                                <h5><i class="fas fa-bullseye mr-2"></i> Objetivo del Sistema</h5>
                                <p class="mb-0">Minimizar el tiempo de inactividad de los usuarios (Downtime) y maximizar la transparencia en la gestión del departamento de IT.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. DASHBOARD OVERVIEW --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-tachometer-alt mr-2"></i> El Dashboard Principal</h3>
                </div>
                <div class="card-body">
                    <p class="mb-4">
                         Al iniciar sesión, lo primero que verá es el <strong>Dashboard</strong>. Este panel es su "termómetro" para medir la salud actual del servicio de soporte en tiempo real.
                         Proporciona una vista rápida del estado de las operaciones sin necesidad de navegar por listas complejas.
                    </p>

                    {{-- SCREENSHOT --}}
                    <div class="text-center mb-5 p-3 bg-light border rounded">
                        <img src="{{ asset('img/image copy 4.png') }}" 
                             alt="Dashboard General" 
                             class="img-fluid shadow-sm rounded">
                        <p class="text-muted small mt-2">
                             <em>Fig 1.1 - Visión general del cuadro de mando administrativo</em>
                        </p>
                    </div>

                    <h5 class="text-primary mb-3"><i class="fas fa-chart-pie mr-2"></i> Métricas Clave (KPIs)</h5>
                    <p class="text-muted mb-4">En la parte superior encontrará tarjetas con números vitales que deben ser monitoreados diariamente:</p>

                    <div class="row">
                         <div class="col-md-3 col-sm-6">
                            <div class="info-box shadow-sm border">
                                <span class="info-box-icon bg-info"><i class="fas fa-folder-open"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tickets Abiertos</span>
                                    <span class="info-box-number small font-weight-normal">Carga de trabajo actual</span>
                                    <span class="text-muted small">Estado: Nuevo, En Progreso, Reabierto</span>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-sm-6">
                            <div class="info-box shadow-sm border">
                                <span class="info-box-icon bg-success"><i class="fas fa-check-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Resueltos</span>
                                    <span class="info-box-number small font-weight-normal">Productividad histórica</span>
                                    <span class="text-muted small">Estado: Resuelto, Cerrado</span>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-sm-6">
                            <div class="info-box shadow-sm border">
                                <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Usuarios</span>
                                    <span class="info-box-number small font-weight-normal">Alcance del sistema</span>
                                    <span class="text-muted small">Total de cuentas activas</span>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-sm-6">
                            <div class="info-box shadow-sm border">
                                <span class="info-box-icon bg-danger"><i class="fas fa-exclamation-circle"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Críticos</span>
                                    <span class="info-box-number small font-weight-normal">Atención prioritaria</span>
                                    <span class="text-muted small">Prioridad Alta/Crítica</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. NAVEGACIÓN LATERAL --}}
            <div class="card card-outline card-dark">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-compass mr-2"></i> Estructura de Navegación</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <h5 class="mb-3">Menú Principal (Sidebar)</h5>
                            <p>La barra lateral izquierda es su herramienta de navegación principal. Está dividida en secciones lógicas para facilitar el acceso rápido a las funciones más usadas:</p>
                            
                            <dl class="row mt-4">
                                <dt class="col-sm-4 text-primary"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</dt>
                                <dd class="col-sm-8">Vuelta al inicio. Resumen gráfico de la situación actual.</dd>

                                <dt class="col-sm-4 text-warning"><i class="fas fa-ticket-alt mr-2"></i> Tickets</dt>
                                <dd class="col-sm-8">
                                    El núcleo del trabajo diario.
                                    <ul class="pl-3 mb-0">
                                        <li><strong>Gestionar tickets:</strong> Listado global de incidencias.</li>
                                        <li><strong>Tickets asignados:</strong> Su cola de trabajo personal.</li>
                                    </ul>
                                </dd>

                                <dt class="col-sm-4 text-success"><i class="fas fa-users-cog mr-2"></i> Usuarios</dt>
                                <dd class="col-sm-8"><em>(Solo Superadmin)</em> Gestión de altas, bajas y modificación de datos de usuarios y personal técnico.</dd>

                                <dt class="col-sm-4 text-secondary"><i class="fas fa-cogs mr-2"></i> Config.</dt>
                                <dd class="col-sm-8">Definición de Tipos de incidencias y ajustes globales del sistema.</dd>
                            </dl>
                        </div>

                        <div class="col-md-6 pl-md-4">
                             <h5 class="text-dark mb-3">Guía Rápida de Iconografía</h5>
                             <p class="small text-muted mb-3">Para mantener la interfaz limpia, utilizamos iconos estandarizados para las acciones comunes. Familiarícese con ellos:</p>
                             
                             <table class="table table-hover table-sm border-bottom">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" style="width: 60px;">Icono</th>
                                        <th>Acción</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-info p-2"><i class="fas fa-eye"></i></span></td>
                                        <td class="align-middle"><strong>Ver / Detalles</strong></td>
                                        <td class="align-middle text-muted small">Accede a la ficha completa para leer y revisar sin editar.</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-warning p-2"><i class="fas fa-edit"></i></span></td>
                                        <td class="align-middle"><strong>Editar</strong></td>
                                        <td class="align-middle text-muted small">Modifica los datos del registro (título, estado, prioridad).</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-success p-2"><i class="fas fa-check"></i></span></td>
                                        <td class="align-middle"><strong>Resolver</strong></td>
                                        <td class="align-middle text-muted small">Acción rápida para marcar un ticket como solucionado.</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle"><span class="badge badge-danger p-2"><i class="fas fa-trash-alt"></i></span></td>
                                        <td class="align-middle"><strong>Eliminar</strong></td>
                                        <td class="align-middle text-muted small">Borrado permanente. Requiere confirmación adicional.</td>
                                    </tr>
                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 4. CONSEJOS --}}
            <div class="alert alert-light border shadow-sm">
                <h5><i class="fas fa-lightbulb text-warning mr-2"></i> Consejos de Productividad</h5>
                <ul class="mb-0 pl-3">
                    <li>Utilice el <strong>buscador global</strong> en la parte superior derecha de las tablas de datos para encontrar usuarios o tickets rápidamente por nombre o ID.</li>
                    <li>Mantenga el dashboard limpio <strong>cerrando definitivamente</strong> los tickets que han sido resueltos y validados por el usuario.</li>
                    <li>Revise la campana de <strong>Notificaciones</strong> diariamente para no dejar ninguna interacción de usuario sin respuesta.</li>
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection
