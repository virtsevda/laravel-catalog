<?php
namespace Virtsevda\LaravelCatalog\Providers;

use Illuminate\Support\ServiceProvider;
use Yuraplohov\LaravelExample\Console\Commands\ExampleCommand;

class LaravelCatalogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([
                __DIR__ . '/../../config/catalog.php' => config_path('catalog.php'),
            ]);

            $this->commands([
                CategoriesImportCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/api.php');
    }
}

?>