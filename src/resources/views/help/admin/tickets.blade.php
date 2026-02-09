@extends('layouts.admin')

@section('title', __('help.admin_tickets_page.title'))

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <p class="text-muted lead">{{ __('help.admin_tickets_page.intro') }}</p>
        </div>
    </div>

    <div class="row">
        {{-- COLUMNA IZQUIERDA: CONTENIDO PRINCIPAL --}}
        <div class="col-12">

            {{-- SECCIÓN 2.1: CICLO DE VIDA --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_tickets_page.lifecycle.title') }}</h3>
                <p>{{ __('help.admin_tickets_page.lifecycle.desc') }}</p>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge badge-info mr-3 p-2" style="min-width: 80px;">NEW</span>
                                <div>{!! __('help.admin_tickets_page.lifecycle.status.new') !!}</div>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge badge-primary mr-3 p-2" style="min-width: 80px;">OPEN</span>
                                <div>{!! __('help.admin_tickets_page.lifecycle.status.open') !!}</div>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge badge-warning mr-3 p-2" style="min-width: 80px;">PENDING</span>
                                <div>{!! __('help.admin_tickets_page.lifecycle.status.pending') !!}</div>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge badge-success mr-3 p-2" style="min-width: 80px;">SOLVED</span>
                                <div>{!! __('help.admin_tickets_page.lifecycle.status.solved') !!}</div>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge badge-secondary mr-3 p-2" style="min-width: 80px;">CLOSED</span>
                                <div>{!! __('help.admin_tickets_page.lifecycle.status.closed') !!}</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="alert alert-info border-info shadow-sm">
                    <h5><i class="fas fa-random mr-2"></i>{{ __('help.admin_tickets_page.lifecycle.flow_title') }}</h5>
                    <p class="mb-0">{{ __('help.admin_tickets_page.lifecycle.flow_text') }}</p>
                </div>
            </div>

            {{-- SECCIÓN 2.2: TRIAJE --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_tickets_page.triage.title') }}</h3>
                <p>{{ __('help.admin_tickets_page.triage.desc') }}</p>
                
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <div class="card bg-light border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-hand-pointer text-primary mr-2"></i>Manual (Push)</div>
                                        <p class="mt-2 mb-0 small">{!! __('help.admin_tickets_page.triage.manual') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="card bg-light border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-user-check text-success mr-2"></i>Self-Claim (Pull)</div>
                                        <p class="mt-2 mb-0 small">{!! __('help.admin_tickets_page.triage.claim') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="callout callout-info">
                    <strong>{{ __('help.admin_tickets_page.triage.filters_title') }}:</strong> {{ __('help.admin_tickets_page.triage.filters_text') }}
                </div>
            </div>

            {{-- SECCIÓN 2.3: SLA --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_tickets_page.sla.title') }}</h3>
                <p>{{ __('help.admin_tickets_page.sla.desc') }}</p>
                
                <table class="table table-bordered table-hover shadow-sm bg-white">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width: 15%;">Priority</th>
                            <th scope="col" style="width: 55%;">Definition</th>
                            <th scope="col" style="width: 30%;">SLA Targets</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><span class="badge badge-danger p-2">HIGH</span></td>
                            <td class="small">{{ __('help.admin_tickets_page.sla.high.desc') }}</td>
                            <td class="small font-weight-bold text-danger">{{ __('help.admin_tickets_page.sla.high.time') }}</td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle"><span class="badge badge-warning p-2">MEDIUM</span></td>
                            <td class="small">{{ __('help.admin_tickets_page.sla.medium.desc') }}</td>
                            <td class="small font-weight-bold text-warning">{{ __('help.admin_tickets_page.sla.medium.time') }}</td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle"><span class="badge badge-success p-2">LOW</span></td>
                            <td class="small">{{ __('help.admin_tickets_page.sla.low.desc') }}</td>
                            <td class="small font-weight-bold text-success">{{ __('help.admin_tickets_page.sla.low.time') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- SECCIÓN 2.4: HERRAMIENTAS --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_tickets_page.features.title') }}</h3>
                <p>{{ __('help.admin_tickets_page.features.desc') }}</p>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-reply fa-2x text-primary mb-3"></i>
                                <p class="card-text small">{!! __('help.admin_tickets_page.features.reply') !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-comment-slash fa-2x text-secondary mb-3"></i>
                                <p class="card-text small">{!! __('help.admin_tickets_page.features.notes') !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-paperclip fa-2x text-info mb-3"></i>
                                <p class="card-text small">{!! __('help.admin_tickets_page.features.files') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
