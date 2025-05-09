<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1); // Primer segmento (es/en)
        $availableLanguages = ['es', 'en'];

        // 1. Validación del idioma**
        if (!in_array($locale, $availableLanguages)) {
            $locale = 'es'; // Idioma por defecto
            $newUrl = "/$locale" . $request->getPathInfo();
            $query = $request->getQueryString();

            // Si hay query params, se agregan al final
            if ($query) {
                $newUrl .= "?" . $query;
            }

            // Redirección a la URL con prefijo de idioma**
            return redirect($newUrl);
        }

        // Establecer el idioma de la aplicación**
        App::setLocale($locale);
        session(['locale' => $locale]);

        $segments = $request->segments();
        $translatedSegments = [];

        foreach ($segments as $index => $segment) {
            if ($index === 0) {
                // El primer segmento es el idioma, no se traduce
                $translatedSegments[] = $segment;
            } else {
                // Se intenta traducir, si no se encuentra se queda igual
                $translation = __("routes.$segment", [], $locale);
                $translatedSegments[] = ($translation !== "routes.$segment") ? $translation : $segment;
            }
        }

        $newPath = implode('/', $translatedSegments);
        if ($newPath !== $request->path()) {
            return redirect()->to($newPath);
        }

        return $next($request);
        
    }
}


