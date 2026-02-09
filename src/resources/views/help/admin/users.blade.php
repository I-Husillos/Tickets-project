@extends('layouts.admin')

@section('title', __('help.admin_users_page.title'))

@section('admincontent')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <p class="text-muted lead">{{ __('help.admin_users_page.intro') }}</p>
        </div>
    </div>

    <div class="row">
        {{-- COLUMNA IZQUIERDA: CONTENIDO --}}
        <div class="col-12">

            {{-- SECCIÓN 3.1: ROLES --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_users_page.types.title') }}</h3>
                <p>{{ __('help.admin_users_page.types.desc') }}</p>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-primary mb-3" style="border-top-width: 4px;">
                            <div class="card-body">
                                <h5 class="card-title text-primary font-weight-bold mb-3">
                                    <i class="fas fa-user mr-2"></i>{{ __('help.admin_users_page.types.client_title') }}
                                </h5>
                                <p class="card-text">{{ __('help.admin_users_page.types.client_desc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-danger mb-3" style="border-top-width: 4px;">
                            <div class="card-body">
                                <h5 class="card-title text-danger font-weight-bold mb-3">
                                    <i class="fas fa-user-shield mr-2"></i>{{ __('help.admin_users_page.types.admin_title') }}
                                </h5>
                                <p class="card-text">{{ __('help.admin_users_page.types.admin_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN 3.2: GESTIÓN DE USUARIOS --}}
            <div class="mb-5">
                <h3 class="text-primary mb-3">{{ __('help.admin_users_page.manage_users.title') }}</h3>
                <p>{{ __('help.admin_users_page.manage_users.desc') }}</p>

                <div class="card bg-light border-0">
                    <div class="card-body">
                        <h5 class="text-dark"><i class="fas fa-plus-circle text-success mr-2"></i>{{ __('help.admin_users_page.manage_users.create.title') }}</h5>
                        <ol>
                            <li>{!! __('help.admin_users_page.manage_users.create.steps.1') !!}</li>
                            <li>{!! __('help.admin_users_page.manage_users.create.steps.2') !!}</li>
                            <li>{!! __('help.admin_users_page.manage_users.create.steps.3') !!}</li>
                        </ol>
                    </div>
                </div>
                
                <h5 class="mt-4 text-dark"><i class="fas fa-key text-warning mr-2"></i>{{ __('help.admin_users_page.manage_users.password.title') }}</h5>
                <div class="alert alert-warning">
                     <i class="fas fa-exclamation-triangle mr-2"></i>{{ __('help.admin_users_page.manage_users.password.desc') }}
                </div>
            </div>

            {{-- SECCIÓN 3.3: PRIVILEGIOS DE SUPERADMIN --}}
            @if(Auth::guard('admin')->user()->superadmin)
            <div class="mb-5">
                <h3 class="text-danger mb-3">{{ __('help.admin_users_page.superadmin.title') }}</h3>
                <p>{{ __('help.admin_users_page.superadmin.desc') }}</p>
                <div class="alert alert-danger">
                    <i class="fas fa-radiation mr-2"></i>{{ __('help.admin_users_page.superadmin.warning') }}
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
