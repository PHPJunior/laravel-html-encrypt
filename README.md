# Laravel Html Encrypt

[![Latest Stable Version](https://poser.pugx.org/php-junior/laravel-html-encrypt/v/stable)](https://packagist.org/packages/php-junior/laravel-html-encrypt)
[![Total Downloads](https://poser.pugx.org/php-junior/laravel-html-encrypt/downloads)](https://packagist.org/packages/php-junior/laravel-html-encrypt)

## Installation

You can install the package via composer:
``` bash
 composer require php-junior/laravel-html-encrypt
```

Once installed, in your project's config/app.php file replace the following entry from the providers array:

```php
PhpJunior\LaravelHtmlEncrypt\LaravelHtmlEncryptServiceProvider::class,
```

And 
```php 
php artisan vendor:publish --provider="PhpJunior\LaravelHtmlEncrypt\LaravelHtmlEncryptServiceProvider"
```

This is the contents of the published config file:

```php
return [
    'encrypt' => env('HTML_ENCRYPT', true),
    'disable_right_click'       => true,
    'disable_ctrl_and_F12_key'  => true,
];

## HTML Encryption?

One major reason for the success of the World Wide Web is undeniably the openness of HTML. HTML files are basically plain text documents, meaning software applications and human users can easily create, read, and update web pages. The open nature of HTML not only allows users to edit websites with nothing more than a simple text editor, it also enables search engines to spider the web and forms the basis for a wide range of web-related applications for any platform you can imagine.

However, as a web designer or website owner you may encounter situations in which you feel a need for protecting your HTML, CSS or JavaScript code from being viewed and reused .

## How It Works

HTML encryption/decryption techniques are based on JavaScript. The encrypted HTML code, which is saved inside the HTML document, is decrypted at runtime through JavaScript and written directly into the browser window using the document.write(…) function. This ensures that any JavaScript-enabled web browser can load and display the pages without additional components or plugins.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
