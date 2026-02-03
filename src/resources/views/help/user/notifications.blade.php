@extends('layouts.user')

@section('title', 'Ayuda · Notificaciones')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Notificaciones</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.help.index', ['locale' => app()->getLocale()]) }}">Ayuda</a>
                </li>
                <li class="breadcrumb-item active">Notificaciones</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-bell mr-2"></i>
                Tipos de notificaciones
            </h3>
        </div>
        <div class="card-body">
            <ul>
                <li>Cambio de estado del ticket</li>
                <li>Nuevos comentarios del administrador</li>
                <li>Resolución o cierre del ticket</li>
            </ul>
        </div>
    </div>

    <div class="card card-outline card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-info-circle mr-2"></i>
                ¿Qué debes hacer?
            </h3>
        </div>
        <div class="card-body">
            <p>
                Revisa las notificaciones para conocer el estado de tus tickets.
                Solo es necesario actuar cuando se solicite información adicional.
            </p>
        </div>
    </div>

    <div class="alert alert-success">
        <i class="fas fa-check-circle mr-2"></i>
        Las notificaciones evitan que tengas que revisar manualmente cada ticket.
    </div>

</div>
@endsection
