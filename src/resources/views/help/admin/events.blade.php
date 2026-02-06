@extends('layouts.admin')

@section('title', 'Ayuda Admin · Auditoría y logs')

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-8">
            <h1 class="m-0 text-dark">Auditoría, Seguridad y Trazabilidad</h1>
            <p class="text-muted">Cómo investigar "qué pasó" en el sistema utilizando los logs de eventos.</p>
        </div>
        <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a></li>
                <li class="breadcrumb-item active">Historial</li>
            </ol>
        </div>
    </div>

    {{-- INTRODUCCIÓN --}}
    <div class="callout callout-info shadow-sm bg-white">
        <h5><i class="fas fa-shield-alt text-info"></i> ¿Por qué es importante esta sección?</h5>
        <p>
            En un entorno corporativo, la responsabilidad (accountability) es clave. A veces, un ticket desaparece, cambia de estado misteriosamente, o un usuario reclama que no se le atendió.
            El <strong>Historial de Eventos</strong> es la "Caja Negra" del sistema: registra inmutablemente todas las acciones críticas.
        </p>
    </div>

    {{-- CASOS DE USO --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Casos Prácticos de Investigación (Forense)</h3>
                </div>
                <div class="card-body">
                    
                    {{-- CASO 1 --}}
                    <div class="row mb-4">
                        <div class="col-md-1 text-center">
                            <span class="badge badge-danger p-2 rounded-circle">1</span>
                        </div>
                        <div class="col-md-11">
                            <h5 class="text-dark font-weight-bold">Caso: "Mi ticket ha desaparecido"</h5>
                            <p>
                                Un usuario llama enfadado porque no encuentra su ticket #105.
                                <br><strong>Acción:</strong> Vaya al Historial y filtre por entidad "Ticket" y ID "105".
                                <br><strong>Resultado típico:</strong> Verá un registro tipo <code>Deleted Ticket #105</code> con el nombre del Administrador que pulsó el botón de borrar. 
                                <br><em>Solución:</em> Ahora sabe a qué compañero preguntarle por qué lo borró.
                            </p>
                        </div>
                    </div>
                    <hr>

                    {{-- CASO 2 --}}
                    <div class="row mb-4">
                        <div class="col-md-1 text-center">
                             <span class="badge badge-warning p-2 rounded-circle">2</span>
                        </div>
                        <div class="col-md-11">
                            <h5 class="text-dark font-weight-bold">Caso: "Nadie me contesta desde hace una semana"</h5>
                            <p>
                                Hay una queja de servicio.
                                <br><strong>Acción:</strong> Busque el historial del ticket.
                                <br><strong>Resultado:</strong> Podrá ver exactamente cuándo fue <code>CREATED</code> (creado) y si existen eventos de <code>COMMENT_ADDED</code> (comentarios). 
                                Si hay un hueco de 7 días entre eventos, la queja es válida. Si ve que el Admin respondió a la hora, tiene pruebas para refutar la queja.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- INTERPRETANDO LA TABLA --}}
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-table mr-2"></i> Interpretación de la Tabla de Eventos</h3>
        </div>
        <div class="card-body">
            {{-- ESPACIO PARA CAPTURA: TABLA DE EVENTOS --}}
            <div class="row justify-content-center my-3">
                <div class="col-md-11 border border-secondary p-3 bg-light text-center rounded">
                    <i class="fas fa-list-ol fa-2x text-dark mb-2"></i>
                    <h6 class="text-muted font-weight-bold">[Captura: Tabla del Historial de Eventos]</h6>
                    <small>Muestre columnas: Usuario, Acción, Modelo (Entidad), Fecha.</small>
                </div>
            </div>

            <p>La tabla consta de 4 columnas fundamentales que debe saber leer:</p>

            <table class="table table-bordered table-striped mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 20%">Actor (Responsable)</th>
                        <th style="width: 20%">Evento (Acción)</th>
                        <th style="width: 40%">Detalle / Descripción</th>
                        <th style="width: 20%">Timestamp (Cuándo)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juan Admin</td>
                        <td><span class="badge badge-success">created</span></td>
                        <td>Creó el ticket #50 "Fallo de Red"</td>
                        <td><small>06 Oct, 10:30 AM</small></td>
                    </tr>
                    <tr>
                        <td>Sistema</td>
                        <td><span class="badge badge-info">assigned</span></td>
                        <td>Asignó Ticket #50 a Maria Admin</td>
                        <td><small>06 Oct, 10:35 AM</small></td>
                    </tr>
                    <tr>
                        <td>Maria Admin</td>
                        <td><span class="badge badge-warning">status_change</span></td>
                        <td>Ticket #50 Estado: Pendiente -> Resuelto</td>
                        <td><small>06 Oct, 11:00 AM</small></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
