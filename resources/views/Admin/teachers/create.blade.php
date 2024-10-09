<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers - EduBlogHub platform</title>
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Awesome -->

    <style>
    /* تحسين تصميم الحاوية */
    .form-container {
        width: 60%;
        margin: 50px auto;
        /* توسيط الحاوية في منتصف الصفحة */
        padding: 20px;
        background-color: #ffffff;
        /* لون الخلفية للحاوية */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    h1,
    h2 {
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button.btn-primary {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        color: white;
        background-color: #4CAF50;
        /* لون الزر */
        border: none;
        transition: background-color 0.3s ease;
    }

    button.btn-primary:hover {
        background-color: #45a049;
    }

    .error-message {
        color: red;
        /* لون الرسالة */
        font-size: 0.9em;
        /* حجم النص */
    }
    </style>
</head>

<body>
    <!-- فورم تسجيل المدرسين -->
    <div class="form-container">
        <h1>Teacher Management</h1>
        <h2>Add New Teacher</h2>
        <form action="{{ route('Admin_teachers.store') }}" method="POST" id="registerForm">
            @csrf
            <!-- إضافة هذه لتجنب مشاكل CSRF -->
            <div class="form-group">
                <label for="teacher-name">Name:</label>
                <input type="text" id="teacher-name" name="teacher-name" required>
                <span id="name-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="hire-date">Hire Date:</label>
                <input type="date" id="hire-date" name="hire-date" required>
                <span id="date-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject:</label>
                <select id="subject_id" name="subject_id" required>
                    <option value="">Select a Subject</option>
                    @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
                <span id="subject-error" class="error-message"></span>
            </div>
            <div class="form-group">
                <label for="department_id">Department:</label>
                <select id="department_id" name="department_id" required>
                    <option value="">Select a Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                    @endforeach
                </select>
                <span id="department-error" class="error-message"></span>
            </div>


            <button type="submit" class="btn btn-primary">Add Teacher</button>
        </form>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </div>
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>