<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    // Method to display the reports page
    public function index()
    {
        // استرجاع جميع التقارير التي تحتوي على TeacherID
        $reports = Report::whereNotNull('TeacherID')->get();
        return view('web.Teachers_Repoprts', compact('reports'));
    }
 
// Method to search reports by Teacher Name
public function search(Request $request)
{
    $search = $request->input('search');

    // البحث عن التقرير فقط إذا كان الاسم غير فارغ والاسم يتكون من 3 أجزاء
    if (!empty($search) && count(explode(' ', $search)) >= 3) {
        // البحث باستخدام علاقة teacher
        $reports = Report::whereHas('teacher', function ($query) use ($search) {
            $query->where('Name', 'LIKE', '%' . $search . '%'); // البحث باستخدام LIKE لدعم البحث الجزئي
        })->whereNotNull('TeacherID')->get();
    } else {
        $reports = collect(); // إذا كان الحقل فارغًا أو الاسم غير ثلاثي، استرجاع مجموعة فارغة
    }

    // إذا لم يتم العثور على تقارير
    $noReports = $reports->isEmpty();

    return view('web.Teachers_Repoprts', compact('reports', 'noReports'));
}


}
