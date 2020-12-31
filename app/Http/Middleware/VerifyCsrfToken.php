<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     任何指向 web 中 POST, PUT 或 DELETE 路由的 HTML 表单请求都应该包含一个 CSRF 令牌(CSRF token)，否则，这个请求将会被拒绝。
     laravel5.6 提示The page has expired due to inactivity. Please refresh and try again.的解决方法
     */
    protected $except = [
        //移除 CSRF token
        '/*' //添加路由 解决post请求出现The page has expired due to inactivity. Please refresh and try again
    ];
}
