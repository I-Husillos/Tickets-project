<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de Administración')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    @php
        $routeName = Route::currentRouteName();
    @endphp

    <div class="sidebar">
        <h4>Admin Panel</h4>
        <hr class="bg-light mx-3">
        <a href="{{ route('admin.users.index') }}" 
        class="d-block text-white {{ str_starts_with($routeName, 'admin.dashboard.list.') ? 'fw-bold text-decoration-underline' : '' }}">
            Usuarios y Admins
        </a>
            @if (Auth::guard('admin')->user()->superadmin)
                @if (str_starts_with($routeName, 'admin.dashboard.list.'))
                        <div class="ps-3 mt-1">
                            <a href="{{ route('admin.dashboard.list.users') }}"
                            class="d-block text-white {{ $routeName === 'admin.dashboard.list.users' ? 'fw-bold' : '' }}">
                                Ver Usuarios
                            </a>
                            <a href="{{ route('admin.dashboard.list.admins') }}"
                            class="d-block text-white {{ $routeName === 'admin.dashboard.list.admins' ? 'fw-bold' : '' }}">
                                Ver Admins
                            </a>
                        </div>
                    @endif
                <a href="{{ route('admin.types.index') }}">Tipos de Tickets</a>
                <a href="{{ route('admin.manage.tickets') }}">Gestionar Tickets</a>
            @endif
        <a href="{{ route('admin.show.assigned.tickets') }}">Tickets Asignados</a>

        <form method="POST" action="{{ route('admin.logout') }}" class="mt-4 px-3">
            @csrf
            <button class="btn btn-danger w-100">Cerrar Sesión</button>
        </form>
    </div>

    <div class="main-content">
        @yield('admincontent')
    </div>
</body>
</html>
