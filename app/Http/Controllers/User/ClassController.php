<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Classstudents; 
use App\Models\Teacher; 

class ClassController extends Controller
{
    //

     // عرض الفصول
     public function index()
     {
         // عرض جميع الفصول عند فتح الصفحة
         $classes = Classstudents::with('teacher')->get();
         return view('web.class', compact('classes'));
     }
 
     // البحث عن الفصول
     public function search(Request $request)
     {
         $search = $request->input('search');
 
         // البحث باستخدام اسم الفصل أو اسم المدرس
         $classes = Classstudents::where('ClassName', 'LIKE', "%$search%")
                     ->orWhereHas('teacher', function($query) use ($search) {
                         $query->where('Name', 'LIKE', "%$search%");
                     })
                     ->with('teacher') // جلب بيانات المدرس المرتبط بكل فصل
                     ->get();
 
         $noClasses = $classes->isEmpty(); // للتحقق من وجود نتائج
 
         return view('web.class', compact('classes', 'noClasses'));
     }
}
