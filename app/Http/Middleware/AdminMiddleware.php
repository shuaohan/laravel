<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminMiddleware
{
    /**创建中间件：
     * php artisan make:middleware AdminMiddleware 
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::guard('admin')->check())
        {
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
