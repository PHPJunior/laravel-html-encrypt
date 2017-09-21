# Laravel Html Encrypt

[![Latest Stable Version](https://poser.pugx.org/php-junior/laravel-html-encrypt/v/stable)](https://packagist.org/packages/php-junior/laravel-html-encrypt)
[![Total Downloads](https://poser.pugx.org/php-junior/laravel-html-encrypt/downloads)](https://packagist.org/packages/php-junior/laravel-html-encrypt)

## Installation

You can install the package via composer:
``` bash
 composer require php-junior/laravel-html-encrypt
```

Next you must add the `\PhpJunior\LaravelHtmlEncrypt\Middleware\HtmlEncrypt` middleware to the kernel.
```php
// app/Http/Kernel.php

...
protected $middleware = [
    ...
    \PhpJunior\LaravelHtmlEncrypt\Middleware\HtmlEncrypt::class,
];
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.