<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Teachers_Repoprts - EduBlogHub platform</title>
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
     
 <!-- form Reports -->
 <div class="form-container">
    <h1>Reports</h1>
    <h2>Generate Report</h2>
   <form id="timetableForm" onsubmit="return validateTeacherReportForm()">

        <div class="form-group">
            <label for="TeacherID">TeacherID:</label>
            <input type="number" id="TeacherID" name="TeacherID" required>
            <span id="TeacherID-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="date-from">From:</label>
            <input type="date" id="date-from" name="date-from" required>
            <span id="date-from-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="date-to">To:</label>
            <input type="date" id="date-to" name="date-to" required>
            <span id="date-to-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="Comments">Comments:</label>
            <textarea id="Comments" name="Comments" rows="4" cols="50" required> Write Reports </textarea>
            <span id="Comments-error" class="error-message"></span>
        </div>

        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>
<!-- 
    <footer class="site-footer">
        <p>&copy; 2024 MyBlog. All rights reserved.</p>
    </footer> -->
 
</body>
</html>

<!-- form Reports -->
<!-- <div class="form-container">
    <h1>Reports</h1>
    <h2>Generate Report</h2>
    <form id="timetableForm" onsubmit="return validateTeacherReportForm()">

        <div class="form-group">
            <label for="TeacherID">TeacherID:</label>
            <input type="number" id="TeacherID" name="TeacherID" required>
            <span id="TeacherID-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="date-from">From:</label>
            <input type="date" id="date-from" name="date-from" required>
            <span id="date-from-error" class="error-message"></span>
        </div>

        <div class="form-group">
            <label for="date-to">To:</label>
            <input type="date" id="date-to" name="date-to" required>
            <span id="date-to-error" class="error-message"></span>
        </div>


        <div class="form-group">
            <label for="Comments">Comments:</label>
            <textarea id="Comments" name="Comments" rows="4" cols="50" required> Write Reports </textarea>
            <span id="Comments-error" class="error-message"></span>
        </div>

        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
</div>
  -->