<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}"> <!-- Se obtiene el idioma activo de la aplicación de forma dinámica -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', __('Panel de Administración'))</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


        @vite('resources/js/app.js', 'resources/css/app.css')

        <link rel="canonical" href="{{ url()->current() }}">

        <script>
            window.Laravel = {
                locale: "{{ app()->getLocale() }}"
            };
        </script>

    </head>

    <body class="hold-transition sidebar-mini" style="height: auto;">
        <div class="wrapper">
            <!-- Navbar -->
            @include('components.navbar')
                        
            <!-- Sidebar -->
            @include('components.admin-sidebar')
              

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('title', __('general.frontoffice.layout.page_title'))</h1>
                            </div>
                            <div class="col-sm-6">
                                <!-- Breadcrumbs -->
                                 <!-- permite que cada vista pueda “inyectar” su bloque personalizado de breadcrumbs usando push --> 
                                <!-- @stack('breadcrumbs') -->


                                <!-- @php
                                    $breadcrumbs = \App\Helpers\BreadcrumbHelper::generate();
                                @endphp

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach($breadcrumbs as $breadcrumb)
                                            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                                                @if (!$loop->last)
                                                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                                @else
                                                    {{ $breadcrumb['name'] }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ol>
                                </nav> -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    @yield('admincontent')
                </section>
            </div>
            <!-- Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Versión</b> 3.2
                </div>
                <strong>&copy; {{ date('Y') }} - Mi Aplicación.</strong> Todos los derechos reservados.
            </footer>
        </div>
    </body>
</html>


