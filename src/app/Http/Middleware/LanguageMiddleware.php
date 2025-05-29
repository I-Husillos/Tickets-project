<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1); // Idioma desde la URL
        
        $availableLanguages = ['es', 'en'];

        // omitir las rutas de debugbar para que no haya conflicto con el prefijo de idiomas
        if ($request->is('_debugbar*')) {
            return $next($request);
        }

        if($request->is('api/*')) {
            return $next($request);
        }


        if (!in_array($locale, $availableLanguages)) {
            $defaultLocale = 'es';
            return redirect("/$defaultLocale" . $request->getPathInfo());
        }

        if ($locale !== Session::get('locale')) {
            // Session::put('locale', $locale);
            App::setLocale($locale);
        }


        return $next($request);
    }

}


