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



            $translatedRoute = trans("routes.$currentRouteName", [], $alternateLocale);

            
            $alternateUrl = url("/$alternateLocale/$translatedRoute");
            
            $view->with([
                'currentLocale' => $currentLocale,
                'alternateLocale' => $alternateLocale,
                'alternateUrl' => $alternateUrl
            ]);
        });

        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));

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
