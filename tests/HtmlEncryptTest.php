<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 11/16/17
 * Time: 11:47 PM
 */

namespace PhpJunior\LaravelHtmlEncrypt\Tests;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpJunior\LaravelHtmlEncrypt\Middleware\HtmlEncrypt;

class HtmlEncryptTest extends TestCase
{
    public function testHtmlEncrypt()
    {
        $response = Response::create();

        $request = $this->get('https://nyinyilwin.me');

        $middleware = new HtmlEncrypt();

        $response =  $middleware->handle($request, function () use ($response) {
            return $response;
        });

        $this->assertEquals($response->getStatusCode(), 200);
    }
}