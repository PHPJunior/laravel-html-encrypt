<?php

namespace PhpJunior\LaravelHtmlEncrypt\Middleware;

use Closure;

class HtmlEncrypt
{
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
        $hex = '';

        for ($i = 0 ; $i < strlen($this->collapseWhiteSpace($content)) ; $i++)
        {
            $hex .= '%'.dechex(array_first(unpack('N', mb_convert_encoding(($this->collapseWhiteSpace($content))[$i], 'UCS-4BE', 'UTF-8'))));
        }

        return '<script type="text/javascript">document.writeln(unescape("'.$hex.'"));</script><noscript><i>Javascript required</i></noscript>';
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
}
