@extends('layouts.user')

@section('title', __('help.notifications_page.title'))

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>{{ __('help.notifications_page.header') }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">{{ __('help.breadcrumbs.help') }}</a></li>
                <li class="breadcrumb-item active">{{ __('help.notifications_page.breadcrumbs') }}</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    {{-- EXPLICACIÓN GENERAL --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-bell mr-2"></i> {{ __('help.notifications_page.explanation.title') }}</h3>
                </div>
                <div class="card-body">
                    <p>
                        {{ __('help.notifications_page.explanation.text1') }}
                    </p>
                    <p>
                        {{ __('help.notifications_page.explanation.text2') }}
                    </p>
                    <p>
                        <strong>{{ __('help.notifications_page.explanation.list_intro') }}</strong>
                    </p>
                    <ul>
                        <li>{!! __('help.notifications_page.explanation.list.reply') !!}</li>
                        <li>{!! __('help.notifications_page.explanation.list.status_change') !!}</li>
                        <li>{{ __('help.notifications_page.explanation.list.assigned') }}</li>
                        <li>{{ __('help.notifications_page.explanation.list.event') }}</li>
                    </ul>
                </div>
            </div>

            {{-- GESTIÓN DE NOTIFICACIONES --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-envelope-open-text mr-2"></i> {{ __('help.notifications_page.management.title') }}</h3>
                </div>
                <div class="card-body">
                    <h5>{{ __('help.notifications_page.management.bell_icon.title') }}</h5>
                    <p>
                        {!! __('help.notifications_page.management.bell_icon.text') !!}
                    </p>
                     <div class="row align-items-center mb-3">
                        <div class="col-md-4 text-center">
                            <span class="fa-stack fa-2x">
                              <i class="fas fa-circle fa-stack-2x text-light"></i>
                              <i class="far fa-bell fa-stack-1x"></i>
                              <span class="badge badge-warning" style="position:absolute; top:0; right:0;">3</span>
                            </span>
                            <p class="small text-muted">{{ __('help.notifications_page.management.bell_icon.img_caption') }}</p>
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li>{!! __('help.notifications_page.management.bell_icon.list.count') !!}</li>
                                <li>{{ __('help.notifications_page.management.bell_icon.list.preview') }}</li>
                                <li>{{ __('help.notifications_page.management.bell_icon.list.view_all') }}</li>
                            </ul>
                        </div>
                    </div>

                    <hr>
                    <h5>{{ __('help.notifications_page.management.notifications_screen.title') }}</h5>
                    <p>
                        {{ __('help.notifications_page.management.notifications_screen.text') }}
                    </p>
                    <div class="text-center my-4 border bg-light p-3">
                        <img src="/img/user-notifications-table.png" class="img-fluid border shadow-sm" alt="Lista de Notificaciones">
                        <p class="small text-muted">{{ __('help.notifications_page.management.notifications_screen.img_caption') }}</p>
                    </div>
                    <p>
                        {{ __('help.notifications_page.management.notifications_screen.actions_intro') }}
                    </p>
                    <dl class="row">
                        <dt class="col-sm-3"><i class="fas fa-check text-green"></i> {{ __('help.notifications_page.management.notifications_screen.actions.mark_read.dt') }}</dt>
                        <dd class="col-sm-9">
                            {!! __('help.notifications_page.management.notifications_screen.actions.mark_read.dd') !!}
                        </dd>

                        <dt class="col-sm-3"><i class="fas fa-times text-yellow"></i> {{ __('help.notifications_page.management.notifications_screen.actions.mark_unread.dt') }}</dt>
                        <dd class="col-sm-9">
                            {{ __('help.notifications_page.management.notifications_screen.actions.mark_unread.dd') }}
                        </dd>

                        <dt class="col-sm-3"><i class="fas fa-ticket-alt text-blue"></i> {{ __('help.notifications_page.management.notifications_screen.actions.go_to_ticket.dt') }}</dt>
                        <dd class="col-sm-9">
                            {!! __('help.notifications_page.management.notifications_screen.actions.go_to_ticket.dd') !!}
                        </dd>
                        <div class="col-12 text-center my-4">
                            <div class="d-inline-block border bg-light p-3">
                                <img src="/img/user-modal-notifications.png" class="img-fluid border shadow-sm my-3" alt="Modal de Notificación">
                                <p class="small text-muted mb-0">{{ __('help.notifications_page.management.notifications_screen.modal_caption') }}</p>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            {{-- CONSEJOS --}}
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-lightbulb mr-2"></i> {{ __('help.notifications_page.tips.title') }}</h3>
                </div>
                <div class="card-body">
                    <div class="callout callout-success">
                        <h5>{{ __('help.notifications_page.tips.clean_inbox.title') }}</h5>
                        <p>{{ __('help.notifications_page.tips.clean_inbox.text') }}</p>
                    </div>
                    <div class="callout callout-info">
                        <h5>{{ __('help.notifications_page.tips.dont_ignore.title') }}</h5>
                        <p>{{ __('help.notifications_page.tips.dont_ignore.text') }}</p>
                    </div>
                </div>
            </div>
            
            {{-- FAQ RÁPIDO --}}
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3 class="card-title">{{ __('help.notifications_page.faq.title') }}</h3>
                </div>
                <div class="card-body">
                    <strong>{{ __('help.notifications_page.faq.email_q') }}</strong>
                    <p class="text-muted text-sm">{{ __('help.notifications_page.faq.email_a') }}</p>
                    <hr>
                    <strong>{{ __('help.notifications_page.faq.delete_q') }}</strong>
                    <p class="text-muted text-sm">{{ __('help.notifications_page.faq.delete_a') }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
