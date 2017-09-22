<?php

namespace PhpJunior\LaravelHtmlEncrypt;

use Illuminate\Support\ServiceProvider;

class LaravelHtmlEncryptServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath() => config_path('laravel-html-encrypt.php'),
        ]);
    }

    /**
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/laravel-html-encrypt.php';
    }
}
