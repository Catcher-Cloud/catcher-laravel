<?php

namespace Catcher\Laravel\Providers;

use Catcher\Catcher;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class CatcherLaravelServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (!$this->isConfigured()) {
            return;
        }

        $this->app->singleton(Catcher::class, function (Application $app) {
            $defaults = [
                'environment' => $app->environment(),
                'root' => base_path(),
                'handleException' => true,
                'handleError' => true,
                'handleFatal' => true,
            ];

            $config = array_merge($defaults, $app['config']->get('catcher', []));

            $config['accessToken'] = config('catcher.accessToken');

            if (empty($config['accessToken'])) {
                throw new InvalidArgumentException('Catcher access token not configured');
            }

            $handleException = (bool)Arr::pull($config, 'handle_exception');
            $handleError = (bool)Arr::pull($config, 'handle_error');
            $handleFatal = (bool)Arr::pull($config, 'handle_fatal');

            Catcher::init($config, $handleException, $handleError, $handleFatal);

            return Catcher::logger();
        });
    }

    /**
     * Check if the package has been configured.
     *
     * @return bool
     */
    protected function isConfigured(): bool
    {
        $level = config('catcher.level', 'DEBUG');

        $token = config('catcher.accessToken');

        return !$token || !$level;
    }
}
