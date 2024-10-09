<?php

 //namespace App\Http\Controllers;

 namespace App\Http\Controllers\Admin;


 use App\Http\Controllers\Controller;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->input('search');
        // الحصول على رقم الصفحة الحالي من استعلام GET
        $currentPage = $request->input('page', 1);
        
        // إذا كان هناك عملية بحث
        if ($search) {
            $students = Student::where('Name', 'like', '%' . $search . '%')
                        ->orWhere('Age', 'like', '%' . $search . '%')
                        ->orWhereHas('class', function ($query) use ($search) {
                            $query->where('ClassName', 'like', '%' . $search . '%');
                        })
                        ->orWhereHas('division', function ($query) use ($search) {
                            $query->where('division_name', 'like', '%' . $search . '%');
                        })
                        ->paginate(3); // استخدام التصفح (Pagination) هنا
        } else {
            // إذا لم يكن هناك عملية بحث
            $students = Student::paginate(3); // جلب 3 سجلات في كل صفحة
        }
    
        return view('Admin.students.index', compact('students', 'currentPage')); // تمرير الصفحة الحالية إلى العرض
    }
    
    
    // عرض جميع الطلاب
/*     public function index()
    {
        $students = Student::all(); // جلب جميع الطلاب من قاعدة البيانات
        return view('Admin.students.index', compact('students')); // إرسال البيانات إلى الـ View
    }
 */

/*     public function index(Request $request)
    {
        $query = Student::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('Name', 'LIKE', "%{$search}%")
                  ->orWhere('Age', 'LIKE', "%{$search}%")
                  ->orWhere('ClassID', 'LIKE', "%{$search}%");
        }
    
        $students = $query->get();
        $students = Student::paginate(3);
    
        return view('Admin.students.index', compact('students'));
    } */

    // عرض صفحة إنشاء طالب جديد
    public function create()
    {
        return view('Admin.students.create'); // هذا الملف هو الـ View الخاص بك
    }

// ملف StudentController.php
public function store(Request $request)
{
    // التحقق من صحة البيانات
    $validatedData = $request->validate([
        'student-name' => 'required|string|max:255',
        'student-age' => 'required|integer',
        'student-class' => 'required|string|max:255',
        'postDivision' => 'required|string|max:255',
    ]);

    // إنشاء طالب جديد
    Student::create([
        'Name' => $validatedData['student-name'],
        'Age' => $validatedData['student-age'],
        'ClassID' => $validatedData['student-class'],
        'division_id' => $validatedData['postDivision'],
    ]);

    // إعادة توجيه المستخدم إلى صفحة عرض الطلاب مع رسالة نجاح
    return redirect()->route('Admin_students.index')->with('success', 'Student added successfully!');
}


      // عرض تفاصيل الطالب
      public function show($StudentID)
       {
     // العثور على الطالب بواسطة معرفه
     $student = Student::findOrFail($StudentID);

     // تمرير بيانات الطالب إلى الواجهة
     return view('Admin.students.show', compact('student'));
      }

      // عرض صفحة التعديل لطالب محدد
      public function edit($StudentID)
      {
          $student = Student::findOrFail($StudentID);
          return view('Admin.students.edit', compact('student'));
      }
  
      // تحديث بيانات الطالب
      public function update(Request $request, $StudentID)
      {
          $request->validate([
              'student-name' => 'required|string|max:255',
              'student-age' => 'required|integer|min:1',
              'student-class' => 'required|string|max:255',
              'postDivision' => 'required|string',
          ]);
  
          $student = Student::findOrFail($StudentID);
          $student->Name = $request->input('student-name');
          $student->Age = $request->input('student-age');
          $student->ClassID = $request->input('student-class');
          $student->division_id = $request->input('postDivision');
          $student->save();
  
          return redirect()->route('Admin_students.index')->with('success', 'Student updated successfully!');
      }


    // حذف طالب
    public function destroy($StudentID)
    {
        $student = Student::findOrFail($StudentID);
        $student->delete();

        return redirect()->route('Admin_students.index')->with('success', 'Student deleted successfully!');
    }


 /*    public function studentsearch(Request $request)
    {
        // استعلام لجلب جميع الطلاب
        $query = Student::query();

        // تطبيق البحث إذا كانت هناك طلبات بحث
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('Name', 'LIKE', "%{$search}%");
        }

        $students = $query->get(); // جلب الطلاب بعد تطبيق الاستعلام

        return view('students.index', compact('students'));
    } */


    public function studentsearch(Request $request)
    {
        // استعلام لجلب جميع الطلاب
        $query = Student::query();
    
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
    
        $students = $query->get(); // جلب الطلاب بعد تطبيق الاستعلام
    
        // تحقق من وجود طلاب بعد البحث
        $noStudents = $students->isEmpty();
    
        return view('Admin.students.index', compact('students', 'noStudents'));
    }
    






}
