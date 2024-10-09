<?php
namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Attendance; // تأكد من أن النموذج متاح
use App\Models\Student; // تأكد من أن النموذج متاح

class AttendanceController extends Controller
{

    public function index()
{
    $attendance = Attendance::with('student')->get();
    return view('web.attendance', compact('attendance'));
}

/*     public function index()
    {
        // يعرض جميع سجلات الحضور
        $attendance = Attendance::all();
        return view('web.attendance', compact('attendance'));
    } */

    public function search(Request $request)
    {
        $search = $request->input('search');
        $attendance = Attendance::whereHas('student', function ($query) use ($search) {
            $query->where('Name', 'LIKE', "%{$search}%");
        })->get();

        if ($attendance->isEmpty()) {
            $noAttendance = true;
        } else {
            $noAttendance = false;
        }

        return view('web.attendance', compact('attendance', 'noAttendance'));
    }
}
