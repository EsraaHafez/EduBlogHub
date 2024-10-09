<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance - EduBlogHub platform</title>
    <!-- تضمين ملف JavaScript في head مع استخدام defer -->
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
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

   <!-- فورم الغياب -->
   <div class="form-container">
    <h1>Attendance</h1>
    <h2>Record Attendance</h2>
    <form id="registerForm" onsubmit="return validateAttendanceForm()">
        <div class="form-group">
            <label for="person-ID">StudentID:</label>
            <input type="int" id="person-ID" name="person-ID" required>
            <span id="ID-error" class="error-message"></span>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <span id="date-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
            <span id="status-error" class="error-message"></span>
        </div>

        <button type="submit" class="btn btn-primary">Record Attendance</button>
    </form>
</div>
<!-- 
    <footer class="site-footer">
        <p>&copy; 2024 MyBlog. All rights reserved.</p>
    </footer> -->

    <script src="script.js"></script>
</body>
</html>