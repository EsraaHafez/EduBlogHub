 <!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Students - EduBlogHub platform</title>
    <!-- تضمين ملف JavaScript في head مع استخدام defer -->
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <a href="{{ asset('index') }}" class="navbar-brand"><i class="fa-brands fa-blogger"></i> EduBlogHub</a>
        <nav class="nav-links">
            <a href="{{ asset('index') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
            <a href="{{ asset('posts') }}" class="nav-link"><i class="fas fa-list"></i> Posts</a>
            <a href="{{ asset('new-post') }}" class="nav-link"><i class="fas fa-plus"></i> New Post</a>
            <a href="{{ asset('login') }}" class="nav-link"><i class="fas fa-user"></i> Login</a>
            <a href="{{ asset('register') }}" class="nav-link"><i class="fa-regular fa-id-card"></i> Register</a>

            <!-- قائمة منسدلة لإدارة الفصول والموظفين -->
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-building-columns"></i> Management</button>
                <div class="dropdown-content">
                <a href="{{ asset('students') }}" >Students</a>
                <a href="{{ asset('teachers') }}" >Teachers</a>
                <a href="{{ asset('attendance') }}" >Attendance</a>
                <a href="{{ asset('timetable') }}" >Timetable</a>
                <a href="{{ asset('class') }}">Class</a>
                </div>
            </div>
    
            <!-- قائمة منسدلة للتقارير -->
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-file"></i> Reports</button>
                <div class="dropdown-content">
                    <a href="{{ asset('Teachers_Repoprts') }}">Teacher Reports</a>
                    <a href="{{ asset('Students_Reports') }}">Student Reports</a>
                </div>
            </div>
        </nav>
    </header>
    
     
   <!-- فورم تسجيل الطلبه -->
   <div class="form-container">
    <h1>Student Management</h1>
    <h2>Add New Student</h2>
    <form action="{{ route('students.store') }}" method="POST" id="registerForm" onsubmit="return validateStudentForm()">
    @csrf <!-- إضافة هذه لتجنب مشاكل CSRF -->
        <div class="form-group">
            <label for="student-name">Name:</label>
            <input type="text" id="student-name" name="student-name" required>
            <span id="name-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="student-age">Age:</label>
            <input type="number" id="student-age" name="student-age" required>
            <span id="age-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="student-class">Class:</label>
            <input type="text" id="student-class" name="student-class" required>
            <span id="class-error" class="error-message"></span>
        </div>



        <div class="form-group">
            <label for="postDivision">Division:</label>
            <input type="text" id="postDivision" name="postDivision" required>
            <span id="Division-error" class="error-message"></span>
        </div>


<!--  
        <div class="form-group">
            <label for="postDivision">Division:</label>
            <select id="postDivision" name="postDivision" required>
                <option value="Scientific science">Scientific science</option>
                <option value="Scientific mathematics">Scientific mathematics</option>
                <option value="literary">literary</option>
            </select>
            <span id="Division-error" class="error-message"></span>
        </div> -->

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
</div>
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
 