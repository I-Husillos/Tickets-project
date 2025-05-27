    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <meta name="notification-url-template" content="{{ route(request()->is('admin*') ? 'admin.notifications.show' : 'user.notifications.show', ['locale' => app()->getLocale(), 'notification' => ':id']) }}">

            
            <title>@yield('title', __('general.frontoffice.layout.page_title'))</title>

            @vite(['resources/js/app.js', 'resources/css/app.css'])
        

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

            <!-- Canonical -->
            <link rel="canonical" href="{{ url()->current() }}">

            @include('partials.translations.notifications')

        </head>

        <body class="hold-transition sidebar-mini" style="height: auto;">              
            <div class="wrapper">
                
                <!-- Navbar -->
                @include('components.navbar')

                
                <!-- Sidebar -->
                @include('components.sidebar')
                
                
                <div class="content-wrapper">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">@yield('title', __('general.frontoffice.layout.page_title'))</h1>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Breadcrumbs -->
                                    <!-- Breadcrumbs -->
                                    <div class="col-sm-6">
                                        @isset($breadcrumbs)
                                            @include('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main content -->
                    <section class="content">
                        @yield('content')
                    </section>
                    <!-- Inyectar modales mediante push desde la vista en cuestión -->
                    @stack('modals')

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

