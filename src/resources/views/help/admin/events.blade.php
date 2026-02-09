@extends('layouts.admin')

@section('title', __('help.admin_events_page.title'))

@section('admincontent')
<div class="container-fluid">
    <div class="row">
        {{-- MAIN CONTENT --}}
        <div class="col-12">
            
            {{-- HEADER --}}
            <div class="mb-4">
                <h1>{{ __('help.admin_events_page.title') }}</h1>
                <p class="lead text-muted">{{ __('help.admin_events_page.intro') }}</p>
            </div>

            {{-- 1. INTERFACE & TABLE --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.admin_events_page.interface.title') }}</h3>
                </div>
                <div class="card-body">
                    <p class="mb-4">{{ __('help.admin_events_page.interface.desc') }}</p>
                    
                    {{-- SCREENSHOT: TABLE --}}
                    <div class="text-center mb-4">
                        <img src="{{ asset('img/help/events_table.png') }}" 
                             alt="{{ __('help.admin_events_page.interface.screenshot_alt') }}" 
                             class="img-fluid border shadow-sm rounded">
                        <p class="text-muted small mt-2">
                            <em>{{ __('help.admin_events_page.interface.screenshot_alt') }}</em>
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary"><i class="fas fa-table mr-2"></i>{{ __('help.admin_events_page.interface.table_title') }}</h5> 
                            <ul class="list-unstyled mt-3 pl-3 border-left">
                                <li class="mb-3">{!! __('help.admin_events_page.interface.table.type') !!}</li>
                                <li class="mb-3">{!! __('help.admin_events_page.interface.table.desc') !!}</li>
                                <li class="mb-3">{!! __('help.admin_events_page.interface.table.user') !!}</li>
                                <li class="mb-3">{!! __('help.admin_events_page.interface.table.date') !!}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-primary"><i class="fas fa-search mr-2"></i>{{ __('help.admin_events_page.interface.search_title') }}</h5>
                            <div class="bg-light p-3 rounded border">
                                <p class="mb-0 small text-secondary">
                                    {!! __('help.admin_events_page.interface.search_desc') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. USE CASES (Logic) --}}
            <div class="card card-outline card-dark">
                <div class="card-header">
                    <h3 class="card-title">{{ __('help.admin_events_page.concept.title') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">{{ __('help.admin_events_page.concept.desc') }}</p>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="callout callout-danger">
                                <h5>{{ __('help.admin_events_page.concept.scenarios.case1.tit') }}</h5>
                                <p class="small text-muted">{!! __('help.admin_events_page.concept.scenarios.case1.desc') !!}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="callout callout-warning">
                                <h5>{{ __('help.admin_events_page.concept.scenarios.case2.tit') }}</h5>
                                <p class="small text-muted">{!! __('help.admin_events_page.concept.scenarios.case2.desc') !!}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="callout callout-info">
                                <h5>{{ __('help.admin_events_page.concept.scenarios.case3.tit') }}</h5>
                                <p class="small text-muted">{!! __('help.admin_events_page.concept.scenarios.case3.desc') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        

    </div>
</div>
@endsection

