<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLanguage($locale)
    {
        $allowedLocales = ['es', 'en'];

        if (in_array($locale, $allowedLocales)) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }

        $previousUrl = url()->previous();
        $parts = parse_url($previousUrl);
        $path = $parts['path'] ?? '/';
        // Quitamos la barra inicial para trabajar con los segmentos correctamente
        $segments = explode('/', ltrim($path, '/'));

        if (isset($segments[0]) && in_array($segments[0], $allowedLocales)) {
            $segments[0] = $locale;
        } else {
            array_unshift($segments, $locale);
        }

        $newPath = '/' . implode('/', $segments);
        $query = isset($parts['query']) ? '?' . $parts['query'] : '';

        return redirect($newPath . $query);
    }
    
}

