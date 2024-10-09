<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل خروج المستخدم

        $request->session()->invalidate(); // إلغاء الجلسة

        $request->session()->regenerateToken(); // تجديد رمز الجلسة

        return redirect('/login'); // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
    }
}
