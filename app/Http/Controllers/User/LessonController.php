<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Google\Client as GoogleClient;
use Google\Service\Calendar;

use Google\Client;
// في الـ controller الخاص بك:
use Google_Service_Calendar_Event;

class LessonController extends Controller
{
    //

    public function index()
{
    // عرض الدروس الخاصة بالمستخدم الحالي
    $lessons = Lesson::where('teacher_id', auth()->id())->get();
    $lessons = Lesson::all()->map(function ($lesson) {
        $lesson->youtube_id = $this->getYouTubeID($lesson->video_link);
        return $lesson;
    });
    
    return view('web.lessons', compact('lessons'));
}

function getYouTubeID($url)
{
    preg_match("/(youtu\.be\/|youtube\.com\/(watch\?(.*&)?v=|(embed|v|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return $matches[5] ?? null;
}

/* 
    public function index()
    {
        $lessons = Lesson::all();
        return view('web.lessons', compact('lessons'));
    }
 */

    
    public function create()
    {
        return view('lessons.create');

    }


    public function store(Request $request)
    {
 
        // حفظ الدرس مع رابط Google Meet
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'meeting_link' => 'nullable|url',
            'video_link' => 'nullable|url',
        ]);

        Lesson::create([
            'title' => $request->title,
            'date' => $request->date,
            'meeting_link' =>  $request->meeting_link, // استخدم المتغير الصحيح هنا
            'teacher_id' => auth()->id(), // إذا كنت قد أضفت نظام تسجيل دخول
            'description' => $request->description,
            'video_link' => $request->video_link
        ]);
        
        return redirect()->route('lessons.index')->with('success');
   
        //return redirect()->route('lessons.index')->with('success', 'Lesson created successfully with Google Meet link: ' . $meeting_link);
    }
 
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }
    

    public function update(Request $request, Lesson $lesson)
    {
        // تحقق من صحة البيانات المدخلة
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'meeting_link' => 'nullable|url',
            'video_link' => 'nullable|url',
        ]);
    
        // تحديث البيانات
        $lesson->update($request->all());
    
        // إعادة التوجيه مع رسالة النجاح
        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully!');
    }

 
    public function destroy(Lesson $lesson)
    {
        // حذف الدرس
        $lesson->delete();
    
        // إعادة التوجيه مع رسالة النجاح
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully!');
    }
    


    public function show($id)
    {
        $lesson = Lesson::findOrFail($id); // جلب الدرس بناءً على المعرف
        return view('lessons.show', compact('lesson')); // تأكد أن اسم الـ View صحيح
    }
    
    
}
