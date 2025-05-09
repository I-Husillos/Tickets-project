<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        parent::boot();
    
        Route::model('ticket', \App\Models\Ticket::class);
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
