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
    </head>
    <body>
        <header class="bg-primary text-white py-3">
            <div class="container">
                <h1 class="text-center">{{ __('general.frontoffice.layout.header') }}</h1>
                <x-language-switcher />
            </div>
        </header>

        <main class="py-5">
            <div class="container">
                @yield('content')
            </div>
        </main>


        <footer class="bg-light text-center py-4">
            <div class="container">
                <p class="mb-0">{{ __('general.frontoffice.layout.footer', ['year' => date('Y')]) }}</p>
            </div>
        </footer>
    </body>
</html>
