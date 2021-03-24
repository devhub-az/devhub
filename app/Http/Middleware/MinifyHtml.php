<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MinifyHtml
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $this->html($response);
    }

    public function html($response)
    {
        $buffer = $response->getContent();
        $replace = [
            '/<!--[^\[](.*?)[^\]]-->/s' => '',
            "/<\?php/" => '<?php ',
            "/\n([\S])/" => '$1',
            "/\r/" => '',
            "/\n/" => '',
            "/\t/" => '',
            '/ +/' => ' ',
        ];
        if (false !== strpos($buffer, '<pre>')) {
            $replace = [
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/" => '<?php ',
                "/\r/" => '',
                "/>\n</" => '><',
                "/>\s+\n</" => '><',
                "/>\n\s+</" => '><',
            ];
        }
        $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);
        $response->setContent($buffer);

        return $response;
    }
}
