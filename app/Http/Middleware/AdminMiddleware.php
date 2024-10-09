<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // تأكد من استيراد Auth

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // التحقق مما إذا كان المستخدم مسجل دخول وصلاحياته أدمن
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // السماح بالوصول إذا كان المستخدم أدمن
        }

        // يمكنك إضافة رسالة إعلامية هنا إذا أردت
        return redirect('/')->with('error', 'You do not have admin access'); // إعادة التوجيه مع رسالة إذا لم يكن أدمن
    }
}
