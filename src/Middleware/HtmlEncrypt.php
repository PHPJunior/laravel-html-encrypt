<?php

namespace PhpJunior\LaravelHtmlEncrypt\Middleware;

use Closure;

class HtmlEncrypt
{
    private $hex;

    /**
     * HtmlEncrypt constructor.
     */
    public function __construct()
    {
        $this->hex = '';
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * @var $response Response
         */
        $response = $next($request);

        $contentType = $response->headers->get('Content-Type');
        if (strpos($contentType, 'text/html') !== false) {
            $response->setContent($this->encryptHtml($response->getContent()));
        }

        return $response;

    }

    public function encryptHtml($content)
    {
        $text = str_split(bin2hex($this->collapseWhiteSpace($content)),2);

        array_walk($text , function (&$a) {
            $this->addHexValue('%'.$a);
        });

        return '<script type="text/javascript">document.writeln(unescape("'.$this->hex.'"));</script><noscript><i>Javascript required</i></noscript>';
    }

    public function collapseWhiteSpace($input)
    {
        $replace = [
            '/<!--[^\[](.*?)[^\]]-->/s' => '',
            "/<\?php/" => '<?php ',
            "/\n([\S])/" => '$1',
            "/\r/" => '',
            "/\n/" => '',
            "/\t/" => '',
            "/ +/" => ' ',
            "/> +</" => '><',
        ];

        return preg_replace(array_keys($replace), array_values($replace), $input);
    }

    public function addHexValue($hex)
    {
        $this->hex .= $hex;
    }
}
