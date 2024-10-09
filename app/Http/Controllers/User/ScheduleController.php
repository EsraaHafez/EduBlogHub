<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    // عرض الجدول الكامل
    public function index()
    {
        $schedule = Schedule::with(['class', 'teacher'])->get();
        return view('web.timetable', compact('schedule'));
    }

    // وظيفة البحث
    public function search(Request $request)
    {
        $search = $request->input('search');

        // البحث في اسم الفصل أو اسم المدرس
        $schedule = Schedule::whereHas('class', function($query) use ($search) {
            $query->where('ClassName', 'LIKE', "%$search%");
        })->orWhereHas('teacher', function($query) use ($search) {
            $query->where('Name', 'LIKE', "%$search%");
        })->with(['class', 'teacher'])->get();

        // التحقق مما إذا كانت النتائج فارغة
        $noSchedule = $schedule->isEmpty();

        return view('web.timetable', compact('schedule', 'noSchedule'));
    }
}
