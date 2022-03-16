<?php

declare(strict_types=1);

namespace Devayes\Tao;

use Illuminate\Support\ServiceProvider;

class TaoServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                TaoCommand::class,
            ]);
        }
    }

    /**
     * Get the config source.
     *
     * @return string
     */
    protected function getConfigSource()
    {
        return realpath(__DIR__ . '/config/tao.php');
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getConfigSource(), 'tao');

        $this->app->singleton('tao', function (Container $app) {
            return new Tao($app['config']);
        });

        $this->app->alias('tao', Tao::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['tao'];
    }
}
