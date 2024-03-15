<?php

namespace Onjoakimsmind\Arc\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

use Onjoakimsmind\Arc\Console\ArcCommand;
use Onjoakimsmind\Arc\Models\Theme;

class ArcServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $theme = Theme::where('active', 1)->first();
        if(!$theme) {
            $theme = Theme::create(['name' => 'Arc', 'active' => 1]);
        }

        Config::set('view.paths', [resource_path('themes/'.$theme->name.'/views')]);
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerResources();

        Blade::componentNamespace('Onjoakimsmind\\Arc\\View\\Components', 'arc');
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->commands([
            ArcCommand::class,
        ]);
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'arc-migrations');

        $this->publishes([
            __DIR__.'/../config/arc.php' => config_path('arc.php'),
        ], 'arc-config');

        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/arc'),
        ], 'arc-assets');
    }

    /**
     * Register the package resources such as routes, templates, etc.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->registerRoutes();
        $this->registerViews();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/admin.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');
        $this->loadViewsFrom(base_path('themes/Arc/views'), 'arc');
    }
}
