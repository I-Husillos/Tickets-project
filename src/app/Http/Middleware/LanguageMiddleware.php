<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1); // Idioma desde la URL
        
        
        $availableLanguages = ['es', 'en'];

        // Si la ruta es "change-language", no sobreescribimos el idioma
        if ($request->routeIs('change.language')) {
            return $next($request); // Continuar sin modificar el idioma
        }

        if (!in_array($locale, $availableLanguages)) {
            $defaultLocale = 'es';
            return redirect("/$defaultLocale" . $request->getPathInfo());
        }

        if ($locale !== Session::get('locale')) {
            // Session::put('locale', $locale);
            App::setLocale($locale);
            Log::info("Idioma actualizado en sesión y Laravel: " . Session::get('locale'));
        }

        return $next($request);
    }



}
