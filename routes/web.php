<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\StudentController;
//use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;



 
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogpostController;



use App\Http\Controllers\User\AttendanceController;
use App\Http\Controllers\User\ScheduleController;
use App\Http\Controllers\User\ClassController;
use App\Http\Controllers\User\ReportController;
use App\Http\Controllers\User\StudentReportController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\StudentController;
use App\Http\Controllers\User\TeacherController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\BlogpostController as UserPostController;
use App\Http\Controllers\User\LessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-----------------------user-------------------------------------------------------------------

// إظهار نموذج التسجيل
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

// معالجة بيانات التسجيل
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
 
  

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//------------------middleware:user------------------------------------------------------------

// Group routes for user
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('posts', UserPostController::class);
    // Add other user routes here

    Route::get('/index', [BlogpostController::class, 'displaypost'])->name('home');

/*     Route::get('/index', function () {
        return view('web.index');
    }); 
 */
    
    //posts
    Route::get('/posts', [BlogpostController::class, 'index'])->name('web.posts');
    Route::get('/post/{id}', [BlogpostController::class, 'show'])->name('web.post');
    Route::get('/new-post', [BlogpostController::class, 'create'])->name('web.new-post');
    Route::post('/posts', [BlogpostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [BlogpostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [BlogpostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [BlogpostController::class, 'destroy'])->name('posts.destroy');



    //students
    Route::get('students',  [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students_Store', [StudentController::class, 'store'])->name('students.store');
   //Route::get('/All_students', [StudentController::class, 'index'])->name('students.index');
   Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
   Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
   Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
   Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
   Route::get('/studentses', [StudentController::class, 'studentsearch'])->name('studentsearch');



   //teachers
   Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
   Route::get('/teachersearch', [TeacherController::class, 'teachersearch'])->name('teachersearch');
   
   //attendance
   Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
   Route::get('/attendance/search', [AttendanceController::class, 'search'])->name('attendance.search');
   
  // timetable
    Route::get('/timetable', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/timetable/search', [ScheduleController::class, 'search'])->name('schedule.search');

  // class
  Route::get('/class', [ClassController::class, 'index'])->name('classes.index');
  Route::get('/class/search', [ClassController::class, 'search'])->name('classes.search');

 //Teachers_Repoprts
 
// Route to display the reports page
Route::get('/Teachers_Repoprts', [ReportController::class, 'index'])->name('reports.index');

// Route to search reports by TeacherID
Route::get('/Teachers_Repoprts/search', [ReportController::class, 'search'])->name('reports.search');

 

 //Students_Reports
// Route لعرض تقرير الطلاب
Route::get('/Students_Reports', [StudentReportController::class, 'index'])->name('student-reports.index');

// Route للبحث في تقرير الطلاب
Route::get('/Students_Reports/search', [StudentReportController::class, 'search'])->name('student-reports.search');

//comments 

 Route::post('/comments/{PostID}', [CommentController::class, 'store'])->name('comments.store');

 Route::put('comments/{id}', [CommentController::class, 'update'])->name('comments.update');
 Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');


//index
// routes/web.php
Route::get('/', [BlogpostController::class, 'displaypost'])->name('home');
Route::get('/Recent_posts/{id}', [BlogpostController::class, 'show'])->name('displaypost');
Route::get('/index', [BlogpostController::class, 'displaypost'])->name('index');





//lessons 


Route::resource('lessons', LessonController::class);

/* Route::get('lessons',  [LessonController::class, 'index'])->name('lessons.index');
Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
Route::post('/lessons_Store', [LessonController::class, 'store'])->name('lessons.store');
//Route::get('/All_lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::delete('/lessons/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');
Route::get('/lessons/{id}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
Route::put('/lessons/{id}', [LessonController::class, 'update'])->name('lessons.update');
Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
Route::get('/lessonses', [LessonController::class, 'lessonssearch'])->name('lessonssearch');

 */






});

//Route::post('/create-meeting', [TeacherController::class, 'createMeeting'])->name('create.meeting');
Route::get('/create-meeting', [TeacherController::class, 'createMeeting'])->name('create.meeting');


Route::get('/create-meeting-success', function () {
    return view('web.create-meeting-success'); // عرض صفحة نجاح الاجتماع
})->name('create.meeting.success');

 

//---------------middleware:Admin---------------------------------------------------------------
 
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
// Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


//Group routes for admin with admin middleware

//Route::middleware('admin')->group(function () {

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Add other admin routes here
     
   //students
    Route::get('Admin/students',  [AdminStudentController::class, 'index'])->name('Admin_students.index');
    Route::get('Admin/students/create', [AdminStudentController::class, 'create'])->name('Admin_students.create');
    Route::post('Admin/students_Store', [AdminStudentController::class, 'store'])->name('Admin_students.store');
    //Route::get('/All_students', [AdminStudentController::class, 'index'])->name('students.index');
    Route::delete('Admin/students/{id}', [AdminStudentController::class, 'destroy'])->name('Admin_students.destroy');
    Route::get('Admin/students/{id}/edit', [AdminStudentController::class, 'edit'])->name('Admin_students.edit');
    Route::put('Admin/students/{id}', [AdminStudentController::class, 'update'])->name('Admin_students.update');
    Route::get('Admin/students/{id}', [AdminStudentController::class, 'show'])->name('Admin_students.show');
    Route::get('Admin/studentses', [AdminStudentController::class, 'studentsearch'])->name('Admin_studentsearch');

   //AdminTeacherController 
   Route::get('Admin/teachers',  [AdminTeacherController::class, 'index'])->name('Admin_teachers.index');
   Route::get('Admin/teachers/create', [AdminTeacherController::class, 'create'])->name('Admin_teachers.create');
   Route::post('Admin/teachers_Store', [AdminTeacherController::class, 'store'])->name('Admin_teachers.store');
   //Route::get('/All_teachers', [AdminTeacherController::class, 'index'])->name('teachers.index');
   Route::delete('Admin/teachers/{id}', [AdminTeacherController::class, 'destroy'])->name('Admin_teachers.destroy');
   Route::get('Admin/teachers/{id}/edit', [AdminTeacherController::class, 'edit'])->name('Admin_teachers.edit');
   Route::put('Admin/teachers/{id}', [AdminTeacherController::class, 'update'])->name('Admin_teachers.update');
   Route::get('Admin/teachers/{id}', [AdminTeacherController::class, 'show'])->name('Admin_teachers.show');
   Route::get('Admin/teacherses', [AdminTeacherController::class, 'teachersearch'])->name('Admin_teachersearch');

    



   //Route::post('/create-meeting', [TeacherController::class, 'createMeeting'])->name('create.meeting');



    //pages_tables
    //Route::get('tables',  [AdminStudentController::class, 'index'])->name('Adminstudents.index');
    Route::get('tables', function () {
        return view('Admin.tables');
    }); 


    //pages_index
    Route::get('Adminindex', function () {
            return view('Admin.index');
        }); 



    //pages_buttons
    Route::get('buttons', function () {
        return view('Admin.buttons');
    }); 


    //pages_cards
    Route::get('cards', function () {
        return view('Admin.cards');
    }); 




    //pages_colors
    Route::get('utilities-color', function () {
        return view('Admin.utilities-color');
    }); 


    //pages_border
    Route::get('utilities-border', function () {
        return view('Admin.utilities-border');
    });     


    //pages_animation
    Route::get('utilities-animation', function () {
        return view('Admin.utilities-animation');
    }); 


    //pages_other
    Route::get('utilities-other', function () {
        return view('Admin.utilities-other');
    });     

    //Admin_forgot-password
    Route::get('forgot-password', function () {
        return view('Admin.forgot-password');
    }); 

    //404
    Route::get('404', function () {
        return view('Admin.404');
    }); 



    //blank

    Route::get('blank', function () {
        return view('Admin.blank');
    }); 

    //charts

    Route::get('charts', function () {
        return view('Admin.charts');
    });     



/* 
      Route::resource('students', StudentController::class);

     Route::resource('posts', BlogpostController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.layout');

     Route::get('/dashboard', function () {
        return view('Admin.dashboard'); });

    Route::get('teachers', function () {
        return view('web.teachers');
    });  

    Route::get('attendance', function () {
        return view('web.attendance');
    });
    
 
    Route::get('timetable', function () {
        return view('web.timetable');
    }); 
    
 
    Route::get('class', function () {
        return view('web.class');
    });
    

 
    Route::get('Teachers_Repoprts', function () {
           return view('web.Teachers_Repoprts');
    }); 



 
    Route::get('Students_Reports', function () {
          return view('web.Students_Reports');
    }); */
     



/*  
    Route::get('trt',  [StudentController::class, 'index'])->name('teachers.index');
    Route::get('attenda',  [StudentController::class, 'index'])->name('attendance.index');
    Route::get('time',  [StudentController::class, 'index'])->name('timetable.index');
    Route::get('clas',  [StudentController::class, 'index'])->name('classes.index');
    Route::get('teacrepo',  [StudentController::class, 'index'])->name('teachers.reports');
    Route::get('repstudents',  [StudentController::class, 'index'])->name('reports.students');
    Route::post('commentsn',  [StudentController::class, 'index'])->name('comments.store');

 */


    
});

//----------------------------------------------------------------------------
 