<?php

 namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // عرض جميع الطلاب
    public function index()
    {
        $students = Student::all(); // جلب جميع الطلاب من قاعدة البيانات
        return view('students.index', compact('students')); // إرسال البيانات إلى الـ View
    }

    
    // عرض صفحة إنشاء طالب جديد
    public function create()
    {
        return view('students.create'); // هذا الملف هو الـ View الخاص بك
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
    return redirect()->route('students.index')->with('success', 'Student added successfully!');
}


      // عرض تفاصيل الطالب
      public function show($StudentID)
       {
     // العثور على الطالب بواسطة معرفه
     $student = Student::findOrFail($StudentID);

     // تمرير بيانات الطالب إلى الواجهة
     return view('students.show', compact('student'));
      }

      // عرض صفحة التعديل لطالب محدد
      public function edit($StudentID)
      {
          $student = Student::findOrFail($StudentID);
          return view('students.edit', compact('student'));
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
  
          return redirect()->route('students.index')->with('success', 'Student updated successfully!');
      }


    // حذف طالب
    public function destroy($StudentID)
    {
        $student = Student::findOrFail($StudentID);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
