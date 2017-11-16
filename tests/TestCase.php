<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 11/16/17
 * Time: 11:31 PM
 */

namespace PhpJunior\LaravelHtmlEncrypt\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use PhpJunior\LaravelHtmlEncrypt\LaravelHtmlEncryptServiceProvider;

abstract class TestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return LaravelHtmlEncryptServiceProvider::class;
    }
}