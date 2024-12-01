<?php

namespace Jeff\LaraLogger\Providers;

use Illuminate\Support\ServiceProvider;

class LoggingServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->config->set('logging.channels', array_merge(
      config('logging.channels') ?? [],
      [
        'database' => [
          'driver' => 'custom',
          'via' => \Jeff\LaraLogger\App\Logging\DatabaseLogger::class,
        ],
      ]
    ));
  }

  public function boot()
  {
    // dd(config_path());
    $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    $this->publishes([
      __DIR__ . '/../database/migrations' => database_path('migrations'),
    ], 'migrations');
  }
}
