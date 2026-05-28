<?php

namespace App\Providers;

use App\Models\Configuracione;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            $config = Configuracione::first();
            view()->share('config', $config);
        } catch (\Exception $e) {
            // evita errores si no existe la tabla aún
        }
    }
}
