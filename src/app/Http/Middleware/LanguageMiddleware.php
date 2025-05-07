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
        $locale = $request->segment(1); // Obtiene el segmento de la URL
        $availableLanguages = ['es', 'en']; // Idiomas disponibles

        if(in_array($locale, $availableLanguages)){ // Verifica si el idioma es válido
            App::setLocale($locale); // Aplica el idioma
        }else{
            App::setLocale('es'); // Aplica el idioma por defecto (español)
        }


        if(session()->has('locale')){ // Verifica si hay un idioma guardado
            App::setLocale(session()->get('locale')); // Aplica el idioma
        }
        return $next($request); // Continúa con la solicitud
    }
}




