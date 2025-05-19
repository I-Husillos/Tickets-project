    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>@yield('title', __('general.frontoffice.layout.page_title'))</title>

            @vite(['resources/js/app.js', 'resources/css/app.css'])
        

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

            <!-- Estilos personalizados -->
            <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        </head>

        <body class="hold-transition sidebar-mini" style="height: auto;">              
            <div class="wrapper">
                
                <!-- Navbar -->
                @include('components.navbar')

                
                <!-- Sidebar -->
                @include('components.sidebar')
                
                
                <div class="content-wrapper">
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </section>

                
                    
                        <!-- Footer -->
                    <!-- <footer class="main-footer">
                        <div class="float-right d-none d-sm-block">
                            <b>Versión</b> 3.2
                        </div>
                        <strong>&copy; {{ date('Y') }} - Mi Aplicación.</strong> Todos los derechos reservados.
                    </footer> -->
                
                </div>
                

            </div>
        </body>
        
    </html>

