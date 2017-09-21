# Laravel Html Encrypt

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