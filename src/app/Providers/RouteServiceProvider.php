<?php

namespace App\Providers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * El nombre de la ruta principal del sistema.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Registra los servicios de rutas.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $currentLocale = app()->getLocale();
            $alternateLocale = $currentLocale == 'es' ? 'en' : 'es';

            $currentRouteName = Route::currentRouteName();
            // dd($currentRouteName);

            $segments = explode('.', $currentRouteName); // Dividir la ruta en segmentos

            $methods = ['index', 'show', 'create', 'edit', 'destroy', 'update', 'store'];

            $translatedSegments = array_map(function ($segment) use ($alternateLocale, $methods) {
                if (in_array($segment, $methods)) {
                    return $segment;
                }
                return trans("routes.$segment", [], $alternateLocale) ?: $segment;
            }, $segments);



            $translatedRoute = implode('/', $translatedSegments);
            $alternateUrl = url("/$alternateLocale/$translatedRoute");

            $view->with([
                'currentLocale' => $currentLocale,
                'alternateLocale' => $alternateLocale,
                'alternateUrl' => $alternateUrl
            ]);

            // dd($currentLocale, $alternateLocale, $currentRouteName, $translatedRoute, $alternateUrl);
        });
    }
    
    
    
    

    /**
     * Registra los servicios de rutas.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
