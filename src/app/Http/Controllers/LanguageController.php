<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{

    public function switchLanguage($targetLocale)
    {
        $allowedLocales = ['es', 'en'];
    
        if (!in_array($targetLocale, $allowedLocales)) {
            $targetLocale = 'es';
        }
    
        Session::put('locale', $targetLocale);
        session()->save();
    
        App::setLocale($targetLocale);
    
        // Obtenemos la URL anterior y analizamos su estructura
        $previousUrl = url()->previous();
        $parsedUrl = parse_url($previousUrl);
        $path = $parsedUrl['path'] ?? '/';
    
        // Descomponemos los segmentos de la URL
        $segments = explode('/', trim($path, '/'));
    
        // Si el primer segmento es un idioma permitido, lo reemplazamos
        if (isset($segments[0]) && in_array($segments[0], $allowedLocales)) {
            $segments[0] = $targetLocale;
        } else {
            array_unshift($segments, $targetLocale);
        }
    
        // Construimos el nuevo path asegurando el reemplazo correcto
        $newPath = '/' . implode('/', $segments);
    
        // Reconstruimos la nueva URL correctamente
        $newUrl = ($parsedUrl['scheme'] ?? 'http') . '://' . 
                  ($parsedUrl['host'] ?? 'localhost') . 
                  (isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '') . 
                  $newPath;
    
        Log::info('URL anterior completa: ' . $previousUrl);
        Log::info('Segmentos extraídos: ' . implode(', ', $segments));
        Log::info('Primer segmento modificado: ' . ($segments[0] ?? 'N/A'));
        Log::info('Nueva URL generada: ' . $newUrl);
    
        return redirect($newUrl);
    }
    


    
}

