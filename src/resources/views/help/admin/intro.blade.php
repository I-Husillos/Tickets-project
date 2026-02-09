@extends('layouts.admin')

@section('title', __('help.admin_intro_page.title'))

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-dark border-bottom pb-2">{{ __('help.admin_intro_page.header') }}</h1>
            <p class="text-muted lead">{{ __('help.admin_intro_page.subtitle') }}</p>
        </div>
    </div>

    <div class="row">
        {{-- COLUMNA IZQUIERDA: CONTENIDO PRINCIPAL --}}
        <div class="col-lg-9">
            
            {{-- SECCIÓN 1.1: ALCANCE --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_intro_page.section_1.title') }}</h3>
                <p>
                    {!! __('help.admin_intro_page.section_1.text') !!}
                </p>
                <div class="alert alert-light border shadow-sm">
                    <h5 class="alert-heading"><i class="fas fa-shield-alt text-info mr-2"></i>{{ __('help.admin_intro_page.section_1.roles_box.title') }}</h5>
                    <p class="mb-2 text-sm">{{ __('help.admin_intro_page.section_1.roles_box.text') }}</p>
                    <ul class="mb-2">
                        <li>{!! __('help.admin_intro_page.section_1.roles_box.superadmin') !!}</li>
                        <li>{!! __('help.admin_intro_page.section_1.roles_box.admin') !!}</li>
                    </ul>
                    <hr>
                    <p class="mb-0 text-xs text-muted">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        {{ __('help.admin_intro_page.section_1.roles_box.security_note') }}
                    </p>
                </div>
            </div>

            {{-- SECCIÓN 1.2: HUB DE NAVEGACIÓN --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_intro_page.section_2.title') }}</h3>
                <p>
                    {!! __('help.admin_intro_page.section_2.text') !!}
                </p>
                
                {{-- FIGURA: HUB --}}
                <div class="col-12 text-center my-4">
                    <div class="d-inline-block border bg-light p-3">
                        <img src="/img/admin-control-panel.png" class="img-fluid border shadow-sm rounded" alt="Hub de Navegación">
                        <p class="small text-muted mt-2">{{ __('help.admin_intro_page.section_2.img_caption') }}</p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6 mb-2">
                        <div class="card card-outline card-primary h-100">
                             <div class="card-body">
                                <p class="card-text">{!! __('help.admin_intro_page.section_2.buttons.assigned') !!}</p>
                             </div>
                        </div>
                    </div>
                     <div class="col-md-6 mb-2">
                        <div class="card card-outline card-success h-100">
                             <div class="card-body">
                                <p class="card-text">{!! __('help.admin_intro_page.section_2.buttons.management') !!}</p>
                             </div>
                        </div>
                     </div>
                </div>
            </div>

            {{-- SECCIÓN 1.3: DASHBOARD ANALÍTICO --}}
             <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_intro_page.section_3.title') }}</h3>
                <span class="badge badge-info mb-2">{{ __('help.admin_intro_page.section_3.subtitle') }}</span>
                <p>
                    {!! __('help.admin_intro_page.section_3.text') !!}
                </p>
                
                <h5 class="mt-4">KPIs (Indicadores Clave de Rendimiento)</h5>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush border p-3 rounded bg-white">
                            <li class="list-group-item">
                                <i class="fas fa-users text-info mr-2"></i>
                                <strong>{{ __('help.admin_intro_page.section_3.kpis.users.title') }}:</strong> 
                                {{ __('help.admin_intro_page.section_3.kpis.users.desc') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-user-shield text-secondary mr-2"></i>
                                <strong>{{ __('help.admin_intro_page.section_3.kpis.admins.title') }}:</strong> 
                                {{ __('help.admin_intro_page.section_3.kpis.admins.desc') }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                         <ul class="list-group list-group-flush border p-3 rounded bg-white">
                             <li class="list-group-item">
                                <i class="fas fa-clipboard-list text-success mr-2"></i>
                                <strong>{{ __('help.admin_intro_page.section_3.kpis.assigned.title') }}:</strong> 
                                {{ __('help.admin_intro_page.section_3.kpis.assigned.desc') }}
                            </li>
                            <li class="list-group-item">
                                <i class="fas fa-ticket-alt text-warning mr-2"></i>
                                <strong>{{ __('help.admin_intro_page.section_3.kpis.total.title') }}:</strong> 
                                {{ __('help.admin_intro_page.section_3.kpis.total.desc') }}
                            </li>
                         </ul>
                    </div>
                </div>

                <div class="callout callout-warning mt-4">
                    <h5>{{ __('help.admin_intro_page.section_3.events_widget.title') }}</h5>
                    <p>{{ __('help.admin_intro_page.section_3.events_widget.text') }}</p>
                </div>
            </div>

            {{-- SECCIÓN 1.4: NAVEGACIÓN --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_intro_page.section_4.title') }}</h3>
                <p>
                    {!! __('help.admin_intro_page.section_4.text') !!}
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-gray-light">
                                <strong>{{ __('help.admin_intro_page.section_4.modules.ops.title') }}</strong>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm mb-0">
                                    <tr>
                                        <td class="pl-3"><i class="fas fa-tachometer-alt text-muted mr-2"></i> {!! __('help.admin_intro_page.section_4.modules.ops.dashboard') !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-3"><i class="fas fa-ticket-alt text-muted mr-2"></i> {!! __('help.admin_intro_page.section_4.modules.ops.tickets') !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-3"><i class="fas fa-users text-muted mr-2"></i> {!! __('help.admin_intro_page.section_4.modules.ops.users') !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-header bg-gray-light">
                                <strong>{{ __('help.admin_intro_page.section_4.modules.sys.title') }}</strong>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm mb-0">
                                    <tr>
                                        <td class="pl-3"><i class="fas fa-tags text-muted mr-2"></i> {!! __('help.admin_intro_page.section_4.modules.sys.types') !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-3"><i class="fas fa-history text-muted mr-2"></i> {!! __('help.admin_intro_page.section_4.modules.sys.events') !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="pl-3"><i class="fas fa-user-shield text-muted mr-2"></i> {!! __('help.admin_intro_page.section_4.modules.sys.admins') !!}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <a href="{{ route('admin.help.index', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action active font-weight-bold">
                                {{ __('help.admin_intro_page.toc.intro') }}
                            </a>
                            <a href="{{ route('admin.help.tickets', ['locale' => app()->getLocale()]) }}" class="list-group-item list-group-item-action">
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
