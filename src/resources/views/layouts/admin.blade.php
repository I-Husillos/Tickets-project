<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}"> <!-- Se obtiene el idioma activo de la aplicación de forma dinámica -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('Panel de Administración'))</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <link rel="canonical" href="{{ url()->current() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Se obtiene el nombre de la ruta actual para aplicar estilos condicionales -->
    @php
        $routeName = Route::currentRouteName();
    @endphp

    <div class="sidebar">
        <h4>{{ __('general.admin_sidebar.title_admin_panel') }}</h4>

        <div class="mb-3">
            <x-language-switcher/>
        </div>

        <hr class="bg-light mx-3">
        <!-- route('register', ['locale' => app()->getLocale()]) --> 
        <a href="{{ route('admin.manage.dashboard', ['locale' => app()->getLocale()]) }}" 
        class="d-block text-white {{ str_starts_with($routeName, 'admin.dashboard.list.') ? 'fw-bold text-decoration-underline' : '' }}">
            {{ __('general.admin_sidebar.panel_control') }}
        </a>
            @if (Auth::guard('admin')->user()->superadmin)
                @if (str_starts_with($routeName, 'admin.dashboard.list.'))
                        <div class="ps-3 mt-1">
                            <a href="{{ route('admin.dashboard.list.users', ['locale' => app()->getLocale()]) }}"
                            class="d-block text-white {{ $routeName === 'admin.dashboard.list.users' ? 'fw-bold' : '' }}">
                                {{ __('general.admin_sidebar.ver_usuarios') }}
                            </a>
                            <a href="{{ route('admin.dashboard.list.admins', ['locale' => app()->getLocale()]) }}"
                            class="d-block text-white {{ $routeName === 'admin.dashboard.list.admins' ? 'fw-bold' : '' }}">
                                {{ __('general.admin_sidebar.ver_admins') }}
                            </a>
                        </div>
                    @endif
                <a href="{{ route('admin.types.index', ['locale' => app()->getLocale()]) }}">{{ __('general.admin_sidebar.tipos_de_tickets') }}</a>
                <a href="{{ route('admin.manage.tickets', ['locale' => app()->getLocale()]) }}">{{ __('general.admin_sidebar.gestionar_tickets') }}</a>
            @endif
        <a href="{{ route('admin.show.assigned.tickets', ['locale' => app()->getLocale()]) }}">{{ __('general.admin_sidebar.tickets_asignados') }}</a>
        <a href="{{ route('admin.history.events', ['locale' => app()->getLocale()]) }}">{{ __('general.admin_sidebar.historial_eventos') }}</a>
        <a href="{{ route('admin.notifications', ['locale' => app()->getLocale()]) }}" class="d-block text-white">
            {{ __('general.admin_sidebar.notificaciones') }} 
            @if (Auth::user()->unreadNotifications->count() > 0)
                <span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
            @endif
        </a>

        <form method="POST" action="{{ route('admin.logout', ['locale' => app()->getLocale()]) }}" class="mt-4 px-3">
            @csrf
            <button class="btn btn-danger w-100">{{ __('general.admin_sidebar.cerrar_sesion') }}</button>
        </form>
    </div>

    <div class="main-content">
        @yield('admincontent')
    </div>
</body>
</html>
