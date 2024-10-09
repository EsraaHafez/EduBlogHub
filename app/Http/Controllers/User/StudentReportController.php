<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report; // نموذج تقرير الطلاب
use App\Models\Student; // نموذج الطلاب

class StudentReportController extends Controller
{
    // دالة لعرض تقارير الطلاب
    public function index(Request $request)
    {
        // الحصول على التقارير التي تحتوي على StudentID فقط
        $reports = Report::with('student')->whereNotNull('StudentID')->get();

        // إرجاع العرض مع التقارير
        return view('web.Students_Reports', compact('reports'));
    }

    public function search(Request $request)
    {
        // الحصول على الاسم الكامل من المدخلات
        $fullName = $request->input('full_name');
    
        // تقسيم الاسم الكامل إلى أجزاء
        $nameParts = explode(' ', trim($fullName));
    
        // التأكد من وجود ثلاثة أجزاء على الأقل
        if (count($nameParts) < 3) {
            $noReports = true;
            $reports = collect(); // تعريف $reports كصفيف فارغ
            return view('web.Students_Reports', compact('noReports', 'reports'));
        }
    
        // استخراج الأسماء الثلاثة
        $firstName = $nameParts[0];
        $middleName = $nameParts[1];
        $lastName = $nameParts[2];
    
        // البحث بناءً على الأسماء الثلاثة
        $reports = Report::whereHas('student', function ($query) use ($firstName, $middleName, $lastName) {
            $query->where('Name', 'LIKE', '%' . $firstName . '%')
                  ->where('Name', 'LIKE', '%' . $middleName . '%')
                  ->where('Name', 'LIKE', '%' . $lastName . '%');
        })
        ->whereNotNull('StudentID') // تأكد من أن StudentID ليس NULL
        ->with('student')
        ->get();
    
        // تحقق مما إذا كان هناك تقارير
        if ($reports->isEmpty()) {
            $noReports = true;
            return view('web.Students_Reports', compact('noReports', 'reports')); // تمرير $reports هنا أيضًا
        }
    
        // إرجاع النتائج إذا تم العثور على تقارير
        return view('web.Students_Reports', compact('reports'));
    }
    

  
}
