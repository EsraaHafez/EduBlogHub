<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - EduBlogHub platform</title>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>
        <!-- Navbar -->
        <header class="navbar">
        <a href="{{ url('/') }}" class="navbar-brand"><i class="fa-brands fa-blogger"></i> EduBlogHub</a>
        <nav class="nav-links">
            <a href="{{ url('/') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
            <a href="{{ url('/posts') }}" class="nav-link"><i class="fas fa-list"></i> Posts</a>
            <a href="{{ url('/new-post') }}" class="nav-link"><i class="fas fa-plus"></i> New Post</a>
            <a href="{{ url('/login') }}" class="nav-link"><i class="fas fa-user"></i> Login</a>
            <a href="{{ url('/register') }}" class="nav-link"><i class="fa-regular fa-id-card"></i> Register</a>

            <!-- قائمة منسدلة لإدارة الفصول والموظفين -->
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-building-columns"></i> Management</button>
                <div class="dropdown-content">
                    <a href="{{ url('/students') }}">Students</a>
                    <a href="{{ url('/teachers') }}">Teachers</a>
                    <a href="{{ url('/attendance') }}">Attendance</a>
                    <a href="{{ url('/timetable') }}">Timetable</a>
                    <a href="{{ url('/class') }}">Class</a>
                </div>
            </div>

            <!-- قائمة منسدلة للتقارير -->
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-file"></i> Reports</button>
                <div class="dropdown-content">
                    <a href="{{ url('/teachers-reports') }}">Teacher Reports</a>
                    <a href="{{ url('/students-reports') }}">Student Reports</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- فورم تسجيل المستخدمين -->
    <div class="form-container">
        <h2>Register a new account</h2>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <form action="{{ route('register') }}" method="POST" id="registerForm" onsubmit="return validateRegisterForm()">
            @csrf
            <div class="form-group">
                <label for="name">User Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p>Already registered? <a href="{{ route('login') }}">Login here</a>.</p>
    </div>
</body>
</html>
