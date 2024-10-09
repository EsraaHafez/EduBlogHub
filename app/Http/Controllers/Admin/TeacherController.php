<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Teacher; // تأكد من استيراد النموذج المناسب
use App\Models\Subject;
use App\Models\Department;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        // الحصول على رقم الصفحة الحالي من استعلام GET
        $currentPage = $request->input('page', 1);

        // إذا كان هناك عملية بحث
        if ($search) {
            $teachers = Teacher::where('Name', 'like', '%' . $search . '%')
                        ->orWhere('HireDate', 'like', '%' . $search . '%')
                        ->orWhereHas('subject', function ($query) use ($search) {
                            $query->where('subject_name', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('department', function ($query) use ($search) {
                            $query->where('department_name', 'like', '%' . $search . '%');
                        })
                        ->paginate(3); // استخدام التصفح (Pagination) هنا
        } else {
            // إذا لم يكن هناك عملية بحث
            $teachers = Teacher::paginate(3); // جلب 3 سجلات في كل صفحة
        }

        return view('Admin.teachers.index', compact('teachers', 'currentPage')); // تمرير الصفحة الحالية إلى العرض
    }

    // عرض صفحة إنشاء معلم جديد
    public function create()
    {
        // الحصول على جميع الموضوعات
        $subjects = Subject::all(); 
        // الحصول على جميع الأقسام
        $departments = Department::all(); 
    
        // عرض صفحة إنشاء المدرس مع قائمة المواد والأقسام
        return view('Admin.teachers.create', [
            'subjects' => $subjects,
            'departments' => $departments,
        ]);
        
    }
    
    

    // حفظ المعلم الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'teacher-name' => 'required|string|max:255',
            'hire-date' => 'required|date',
            'subject_id' => 'required|integer', // تم تغيير هنا
            'department_id' => 'required|integer', // تم تغيير هنا
        ]);
        

        // إنشاء معلم جديد
        Teacher::create([
            'Name' => $validatedData['teacher-name'],
            'HireDate' => $validatedData['hire-date'],
            'subject_id' => $validatedData['subject_id'],
            'department_id' => $validatedData['department_id'],
        ]);
        
        // إعادة توجيه المستخدم إلى صفحة عرض المدرسين مع رسالة نجاح
        return redirect()->route('Admin_teachers.index')->with('success', 'Teacher added successfully!');
    }

    // عرض تفاصيل المعلم
    public function show($TeacherID)
    {
        // العثور على المعلم بواسطة معرفه
        $teacher = Teacher::findOrFail($TeacherID);

        // تمرير بيانات المعلم إلى الواجهة
        return view('Admin.teachers.show', compact('teacher'));
    }

    // عرض صفحة التعديل لمعلم محدد
    public function edit($TeacherID)
    {
        $teacher = Teacher::findOrFail($TeacherID);
        return view('Admin.teachers.edit', compact('teacher'));
    }

    // تحديث بيانات المعلم
    public function update(Request $request, $TeacherID)
    {
        $request->validate([
            'teacher-name' => 'required|string|max:255',
            'HireDate' => 'required|date',
            'subject' => 'required|integer',
            'department' => 'required|integer',
        ]);

        $teacher = Teacher::findOrFail($TeacherID);
        $teacher->Name = $request->input('teacher-name');
        $teacher->HireDate = $request->input('HireDate');
        $teacher->subject_id = $request->input('subject');
        $teacher->department_id = $request->input('department');
        $teacher->save();

        return redirect()->route('Admin_teachers.index')->with('success', 'Teacher updated successfully!');
    }

    // حذف معلم
    public function destroy($TeacherID)
    {
        $teacher = Teacher::findOrFail($TeacherID);
        $teacher->delete();

        return redirect()->route('Admin_teachers.index')->with('success', 'Teacher deleted successfully!');
    }

    public function teachersearch(Request $request)
    {
        // استعلام لجلب جميع المدرسين
        $query = Teacher::query();

        // تطبيق البحث إذا كانت هناك طلبات بحث
        if ($request->has('search')) {
            $search = $request->input('search');
            
            // البحث عن الاسم الكامل
            $query->where(function($q) use ($search) {
                $names = explode(' ', $search);
                if (count($names) === 3) {
                    $q->where('Name', 'LIKE', "%{$search}%");
                }
            });
        }

        $teachers = $query->get(); // جلب المدرسين بعد تطبيق الاستعلام

        // تحقق من وجود مدرسين بعد البحث
        $noTeachers = $teachers->isEmpty();

        return view('Admin.teachers.index', compact('teachers', 'noTeachers'));
    }
}
