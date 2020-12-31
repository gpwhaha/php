<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class CrossHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
        private $headers;
        private $allow_origin;
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        $response->header('Access-Control-Allow-Credentials', 'false');

        // $response = $next($request);
        // $origin = $request->server('HTTP_ORIGIN') ? $request->server('HTTP_ORIGIN') : '';
        // $allow_origin = [
        //     'http://localhost:8080',//允许访问
        //     'http://www.gpw.net'
        // ];
        // if (in_array($origin, $allow_origin)) {
        //     $response->header('Access-Control-Allow-Origin', $origin);
        //     $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, X-CSRF-TOKEN, Accept, Authorization, X-XSRF-TOKEN');
        //     $response->header('Access-Control-Expose-Headers', 'Authorization, authenticated');
        //     $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        //     $response->header('Access-Control-Allow-Credentials', 'true');
        // }

        // $this->headers = [
        //     'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE',
        //     'Access-Control-Expose-Headers' => 'Authorization',
        //     'Cache-Control' => 'no-store',
        //     'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers'),
        //     'Access-Control-Allow-Credentials' => 'true',//允许客户端发送cookie
        //     'Access-Control-Max-Age' => 1728000 //该字段可选，用来指定本次预检请求的有效期，在此期间，不用发出另一条预检请求。
        // ];

        // $this->allow_origin = [
        //     'http://localhost:8080',
        //     'http://www.hellomao.net',
        //     'http://www.gpw.net'
        //     'chrome-extension://mojcgcngknbgppkahglfamfkblanimpl' //nw客户端
        // ];
        // $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

        // //如果origin不在允许列表内，直接返回403
        // if (!in_array($origin, $this->allow_origin) && !empty($origin))
        //     return new Response('Forbidden', 403);
        // //如果是复杂请求，先返回一个200，并allow该origin
        // if ($request->isMethod('options'))
        //     return $this->setCorsHeaders(new Response('OK', 200), $origin);
        // //如果是简单请求或者非跨域请求，则照常设置header
        // $response = $next($request);
        // $methodVariable = array($response, 'header');
        // //这个判断是因为在开启session全局中间件之后，频繁的报header方法不存在，所以加上这个判断，存在header方法时才进行header的设置
        // if (is_callable($methodVariable, false, $callable_name)) {
        //     return $this->setCorsHeaders($response, $origin);
        // }
        return $response;
    }
}
