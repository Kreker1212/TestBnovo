<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Namespace для контроллеров по умолчанию.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Определение маршрутов для приложения.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRoutes();
    }

    /**
     * Определение маршрутов.
     *
     * @return void
     */
    protected function configureRoutes()
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }
}
