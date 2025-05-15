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

            // $segments = explode('.', $currentRouteName); // Dividir la ruta en segmentos

            // $translatedSegments = array_map(function ($segment) use ($alternateLocale) {
            //     return trans("routes.$segment", [], $alternateLocale);
            // }, $segments);



            $translatedRoute = trans("routes.$currentRouteName", [], $alternateLocale);

            
            $alternateUrl = url("/$alternateLocale/$translatedRoute");
            
            //dd("routes.$currentRouteName", $alternateLocale, $translatedRoute, $alternateUrl);
            
            $view->with([
                'currentLocale' => $currentLocale,
                'alternateLocale' => $alternateLocale,
                'alternateUrl' => $alternateUrl
            ]);

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
