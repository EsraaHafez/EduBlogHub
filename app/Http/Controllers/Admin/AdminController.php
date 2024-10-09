<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // عرض صفحة لوحة التحكم للأدمن
    public function index()
    {

        $user = Auth::user();
    
        if ($user->role === 'admin') {
            return view('Admin.dashboard');
        } elseif ($user->role === 'student') {
            return view('home');
        }
        
        return redirect()->route('admin.login')->with('error', 'Unauthorized role.');

 
    }

    // عرض صفحة تسجيل الدخول للأدمن
    public function showLoginForm()
    {
        return view('auth.login');
        //return view('Admin.login');
    }

    // تسجيل الدخول للأدمن
    public function login(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $credentials = $request->only('email', 'password');
        
        // محاولة تسجيل الدخول باستخدام Auth
        if (Auth::attempt($credentials)) {
            // التحقق مما إذا كان المستخدم مسجل كأدمن
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout(); // تسجيل خروج إذا لم يكن المستخدم أدمن
                return redirect()->route('admin.login')->with('error', 'You do not have admin access.');
            }
        }

        // إعادة التوجيه إذا كانت بيانات الدخول غير صحيحة
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // تسجيل الخروج
/*     public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    } */

    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل خروج المستخدم

        $request->session()->invalidate(); // إلغاء الجلسة

        $request->session()->regenerateToken(); // تجديد رمز الجلسة

        return redirect('/login'); // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول
    }
}

