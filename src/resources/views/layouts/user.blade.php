    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>@yield('title', __('general.frontoffice.layout.page_title'))</title>

            <!-- Bootstrap CSS desde el CDN -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Archivo de estilos personalizados -->
            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

            <!-- AdminLTE CSS -->
            <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
            <!-- <link rel="stylesheet" href="{{ asset('css/alerts.css') }}"> -->

            <!-- canonical -->
            <link rel="canonical" href="{{ url()->current() }}">
        </head>


        <body class="hold-transition sidebar-mini layout-fixed">
            <header class="bg-primary text-white py-3">
                <div class="container">
                    <h1 class="text-center">{{ __('general.frontoffice.layout.header') }}</h1>
                    <x-language-switcher />
                </div>
            </header>
            <div class="wrapper">

                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">@yield('header', __('general.frontoffice.layout.header'))</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>

                <footer class="main-footer2">
                    <div class="float-right d-none d-sm-block">
                        <b>Version</b> 3.2
                    </div>
                        <strong>&copy; {{ date('Y') }} - Gestión de Tickets.</strong> Todos los derechos reservados.
                </footer>

            </div>

            <!-- Bootstrap JS desde el CDN -->
            <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

        </body>
    </html>

    