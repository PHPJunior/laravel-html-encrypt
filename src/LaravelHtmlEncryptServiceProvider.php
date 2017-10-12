<?php

namespace PhpJunior\LaravelHtmlEncrypt;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
class LaravelHtmlEncryptServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        $this->publishes([
            $this->configPath() => config_path('laravel-html-encrypt.php'),
        ]);

        if (config('laravel-html-encrypt.encrypt')) {
            $kernel->prependMiddleware('PhpJunior\LaravelHtmlEncrypt\Middleware\HtmlEncrypt');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'laravel-html-encrypt');
    }

    /**
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/laravel-html-encrypt.php';
    }
}
