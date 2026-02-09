@extends('layouts.admin')

@section('title', __('help.admin_notifications_page.title'))

@section('admincontent')
<div class="container-fluid">
    <div class="row">
        {{-- MAIN CONTENT --}}
        <div class="col-12">
            
            {{-- HEADER --}}
            <div class="mb-4">
                <h1>{{ __('help.admin_notifications_page.title') }}</h1>
                <p class="lead text-muted">{{ __('help.admin_notifications_page.intro') }}</p>
            </div>

            {{-- 1. INTERFACE & TABLE --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.admin_notifications_page.interface.title') }}</h3>
                </div>
                <div class="card-body">
                    <p class="mb-4">{{ __('help.admin_notifications_page.interface.desc') }}</p>
                    
                    {{-- SCREENSHOT: TABLE --}}
                    <div class="text-center mb-4">
                        <img src="{{ asset('img/help/notifications_table.png') }}" 
                             alt="{{ __('help.admin_notifications_page.interface.screenshot_alt') ?? 'Table Screenshot' }}" 
                             class="img-fluid border shadow-sm rounded">
                        <p class="text-muted small mt-2">
                            <em>{{ __('help.admin_notifications_page.interface.screenshot_alt') ?? 'Interfaz principal de notificaciones' }}</em>
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary"><i class="fas fa-table mr-2"></i>{{ __('help.admin_notifications_page.interface.table_title') }}</h5> 
                            <ul class="list-unstyled mt-3 pl-3 border-left">
                                <li class="mb-3">{!! __('help.admin_notifications_page.interface.table.type') !!}</li>
                                <li class="mb-3">{!! __('help.admin_notifications_page.interface.table.content') !!}</li>
                                <li class="mb-3">{!! __('help.admin_notifications_page.interface.table.date') !!}</li>
                                <li class="mb-3">{!! __('help.admin_notifications_page.interface.table.actions') !!}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary"><i class="fas fa-search mr-2"></i>{{ __('help.admin_notifications_page.interface.search_title') ?? 'Search & Filter' }}</h5>
                            <div class="bg-light p-3 rounded border">
                                <p class="mb-0 small text-secondary">
                                    {!! __('help.admin_notifications_page.interface.search_desc') ?? 'Use the search box to filter...' !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. ACTIONS --}}
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.admin_notifications_page.interface.actions_title') ?? 'Actions' }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box shadow-none border">
                                <span class="info-box-icon bg-info"><i class="fas fa-eye"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">View</span>
                                    <span class="info-box-number small font-weight-normal">{!! __('help.admin_notifications_page.interface.actions.view') !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box shadow-none border">
                                <span class="info-box-icon bg-success"><i class="fas fa-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Mark Read</span>
                                    <span class="info-box-number small font-weight-normal">{!! __('help.admin_notifications_page.interface.actions.read') !!}</span>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="info-box shadow-none border">
                                <span class="info-box-icon bg-danger"><i class="fas fa-trash-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Delete</span>
                                    <span class="info-box-number small font-weight-normal">{!! __('help.admin_notifications_page.interface.actions.delete') !!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. MODAL --}}
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.admin_notifications_page.modal.title') }}</h3>
                </div>
                <div class="card-body">
                     <p class="mb-4">{!! __('help.admin_notifications_page.modal.desc') !!}</p>
                     
                     {{-- SCREENSHOT: MODAL --}}
                     <div class="text-center">
                        <img src="{{ asset('img/help/notifications_modal.png') }}" 
                             alt="{{ __('help.admin_notifications_page.modal.screenshot_alt') ?? 'Modal Screenshot' }}" 
                             class="img-fluid border shadow-sm rounded w-75">
                         <p class="text-muted small mt-2">
                            <em>{{ __('help.admin_notifications_page.modal.screenshot_alt') ?? 'Vista detallada en modal' }}</em>
                        </p>
                    </div>
                </div>
            </div>

            {{-- 4. LOGIC --}}
            <div class="card card-outline card-dark">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.admin_notifications_page.logic.title') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">{{ __('help.admin_notifications_page.logic.desc') }}</p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="callout callout-info">
                                <h5>{{ __('help.admin_notifications_page.logic.scenarios.new_ticket.tit') }}</h5>
                                <p><strong>To:</strong> {{ __('help.admin_notifications_page.logic.scenarios.new_ticket.who') }}</p>
                                <small class="text-muted">{{ __('help.admin_notifications_page.logic.scenarios.new_ticket.why') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="callout callout-success">
                                <h5>{{ __('help.admin_notifications_page.logic.scenarios.client_reply_assigned.tit') }}</h5>
                                <p><strong>To:</strong> {{ __('help.admin_notifications_page.logic.scenarios.client_reply_assigned.who') }}</p>
                                <small class="text-muted">{{ __('help.admin_notifications_page.logic.scenarios.client_reply_assigned.why') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="callout callout-danger">
                                <h5>{{ __('help.admin_notifications_page.logic.scenarios.client_reply_unassigned.tit') }}</h5>
                                <p><strong>To:</strong> {{ __('help.admin_notifications_page.logic.scenarios.client_reply_unassigned.who') }}</p>
                                <small class="text-muted">{{ __('help.admin_notifications_page.logic.scenarios.client_reply_unassigned.why') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TIP --}}
            <div class="alert alert-light border">
                <h5><i class="icon fas fa-info"></i> {{ __('help.admin_notifications_page.tips.title') }}</h5>
                {!! __('help.admin_notifications_page.tips.desc') !!}
            </div>

        </div>
    </div>
</div>
@endsection

