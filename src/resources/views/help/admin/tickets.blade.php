@extends('layouts.admin')

@section('title', __('help.admin_tickets_page.title'))

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-dark border-bottom pb-2">{{ __('help.admin_tickets_page.title') }}</h1>
            <p class="text-muted lead">{{ __('help.admin_tickets_page.intro') }}</p>
        </div>
    </div>

    <div class="row">
        {{-- COLUMNA IZQUIERDA: CONTENIDO PRINCIPAL --}}
        <div class="col-lg-9">

            {{-- SECCIÓN 2.1: CICLO DE VIDA --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_tickets_page.lifecycle.title') }}</h3>
                <p>{{ __('help.admin_tickets_page.lifecycle.desc') }}</p>

                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body">
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
            </div>

            {{-- SECCIÓN 2.2: TRIAJE --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_tickets_page.triage.title') }}</h3>
                <p>{{ __('help.admin_tickets_page.triage.desc') }}</p>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-hand-pointer text-primary mr-2"></i>Manual</div>
                                        <p class="mt-2 mb-0 small">{!! __('help.admin_tickets_page.triage.manual') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card bg-light border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-user-check text-success mr-2"></i>Self-Claim</div>
                                        <p class="mt-2 mb-0 small">{!! __('help.admin_tickets_page.triage.claim') !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 2.3: SLA --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_tickets_page.sla.title') }}</h3>
                <p>{{ __('help.admin_tickets_page.sla.desc') }}</p>
                
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="width: 20%;">Priority</th>
                            <th scope="col">Definition & SLA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><span class="badge badge-danger p-2">HIGH</span></td>
                            <td>{!! __('help.admin_tickets_page.sla.high') !!}</td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle"><span class="badge badge-warning p-2">MEDIUM</span></td>
                            <td>{!! __('help.admin_tickets_page.sla.medium') !!}</td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle"><span class="badge badge-success p-2">LOW</span></td>
                            <td>{!! __('help.admin_tickets_page.sla.low') !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        {{-- COLUMNA DERECHA: TABLA DE CONTENIDOS --}}
        <div class="col-lg-3">
            <div class="sticky-top" style="top: 20px; z-index: 1;">
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('help.admin_intro_page.toc.header') }}</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                {{ __('help.admin_intro_page.toc.intro') }}
                            </a>
                            <a href="{{ route('admin.help.tickets', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action active font-weight-bold">
                                {{ __('help.admin_intro_page.toc.tickets') }}
                            </a>
                            <a href="{{ route('admin.help.users', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                {{ __('help.admin_intro_page.toc.users') }}
                            </a>
                            <a href="{{ route('admin.help.notifications', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                {{ __('help.admin_intro_page.toc.notifications') }}
                            </a>
                            <a href="{{ route('admin.help.events', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
                                {{ __('help.admin_intro_page.toc.events') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="text-muted text-sm text-center">
                        <i class="far fa-file-pdf mr-1"></i> {{ __('help.admin_intro_page.toc.doc_info') }}<br>
                        {{ __('Updated') }}: {{ date('Y-m-d') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
