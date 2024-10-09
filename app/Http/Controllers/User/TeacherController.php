<?php

namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Teacher; // تأكد من استيراد النموذج المناسب

use Google\Client;
use Google\Service\Calendar;
// في الـ controller الخاص بك:
use Google_Service_Calendar_Event;


class TeacherController extends Controller
{
    /**
     * عرض جميع المدرسين.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // جلب جميع المدرسين (يمكنك تحسين ذلك حسب احتياجاتك)
        $teachers = Teacher::all();
        return view('web.teachers', compact('teachers'));
    }

    /**
     * البحث عن المدرسين حسب الاسم.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function teachersearch(Request $request)
    {
        $query = Teacher::query();

        // إذا كان هناك طلب بحث، طبق الاستعلام
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('Name', 'LIKE', "%{$search}%");
        }

        $teachers = $query->get(); // جلب المدرسين بعد تطبيق الاستعلام

        $noTeachers = $teachers->isEmpty(); // تحقق إذا كان هناك مدرسين أم لا

        return view('web.teachers', compact('teachers', 'noTeachers'));
    }


    public function createMeeting(Request $request)
    {
        // إعداد Google Client
        $client = new Client();
    
        // استخدام مسار credentials من ملف .env
        $client->setAuthConfig(env('GOOGLE_CREDENTIALS_PATH'));
    
        // تعيين إعدادات cURL لملف الشهادات
        $client->setHttpClient(new \GuzzleHttp\Client([
            'verify' => storage_path('cacert.pem')
        ]));
    
        $client->addScope(\Google\Service\Calendar::CALENDAR);
        $client->setRedirectUri('http://127.0.0.1:8000/create-meeting');
    
        // التحقق من وجود الكود في الـ URL
        if ($request->has('code')) {
            // استرجاع الـ access token باستخدام الكود
            $accessToken = $client->fetchAccessTokenWithAuthCode($request->input('code'));
    
            if (!isset($accessToken['error'])) {
                // حفظ التوكن في الجلسة أو قاعدة البيانات
                session(['google_access_token' => $accessToken]);
    
                // تعيين التوكن في الكلاينت
                $client->setAccessToken($accessToken);
            } else {
                // معالجة الخطأ في حال فشل استرجاع التوكن
                return redirect()->route('create.meeting.error');
            }
        }
    
        // التحقق من صلاحية الـ access token
        if ($client->isAccessTokenExpired()) {
            // إذا كان لدينا توكن مجدد، نستخدمه لتجديد التوكن
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // توجيه المستخدم إلى صفحة التفويض
                $authUrl = $client->createAuthUrl();
                return redirect($authUrl);
            }
        }
    
        // إعداد Google Calendar Service
        $service = new Calendar($client);
    
        // إنشاء حدث Google Calendar
        $event = new Google_Service_Calendar_Event([
            'summary' => 'Google Meet Meeting',
            'start' => [
                'dateTime' => date('c', strtotime('+1 hours')),
                'timeZone' => 'Asia/Riyadh',
            ],
            'end' => [
                'dateTime' => date('c', strtotime('+2 hours')),
                'timeZone' => 'Asia/Riyadh',
            ],
            'conferenceData' => [
                'createRequest' => [
                    'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                    'requestId' => 'randomString' . time(),
                ]
            ]
        ]);
    
        // استخدام Calendar API لإدراج الاجتماع
        $calendarId = 'primary';
        $createdEvent = $service->events->insert($calendarId, $event, ['conferenceDataVersion' => 1]);
    
        // الحصول على رابط Google Meet
        $meetingUrl = $createdEvent->getHangoutLink();
    
        // إرسال الرابط إلى view
        return redirect()->route('create.meeting.success')->with('meetingUrl', $meetingUrl);
    }
    
    }
    

 