<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // التحقق من صحة بيانات تسجيل الدخول
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // الحصول على المستخدم الحالي
            $user = Auth::user();

            // التحقق من دور المستخدم
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'student') {
                return redirect()->route('home');
            }
        }

        // إذا كانت بيانات الدخول غير صحيحة
        return redirect()->back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }
}
