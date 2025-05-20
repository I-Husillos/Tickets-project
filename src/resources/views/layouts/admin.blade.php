<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}"> <!-- Se obtiene el idioma activo de la aplicación de forma dinámica -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('Panel de Administración'))</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @vite('resources/js/app.js', 'resources/css/app.css')

    <link rel="canonical" href="{{ url()->current() }}">
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        @include('components.navbar')

                    
        <!-- Sidebar -->
        @include('components.sidebar')

        <div class="content-wrapper">
            <section class="content">
                @yield('admincontent')
            </section>
        </div>
                
    </div>
</body>
</html>


