<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">

    <style>
        /* تحسين تصميم الحاوية */
        .container {
            width: 60%;
            margin: 50px auto; /* توسيط الحاوية في منتصف الصفحة */
            padding: 20px;
            background-color: #ffffff; /* لون الخلفية للحاوية */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h1 {
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

        input[type="text"], input[type="date"], input[type="number"] {
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
            background-color: #4CAF50; /* نفس لون زر الإضافة في الصفحة الرئيسية */
            border: none;
            transition: background-color 0.3s ease;
        }

        button.btn-primary:hover {
            background-color: #45a049;
        }

        /* تحسين تصميم زر العودة للصفحة الرئيسية */
        .btn-home {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            background-color: #007BFF; /* لون مطابق للزر في الصفحة الرئيسية */
            color: white;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-home:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Teacher</h1>

        <form action="{{ route('Admin_teachers.update', $teacher->TeacherID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="teacher-name">Name:</label>
                <input type="text" id="teacher-name" name="teacher-name" value="{{ $teacher->Name }}" required>
            </div>

            <div class="form-group">
                <label for="HireDate">Hire Date:</label>
                <input type="date" id="HireDate" name="HireDate" value="{{ $teacher->HireDate }}" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="number" id="subject" name="subject" value="{{ $teacher->subject->subject_id }}" required>
            </div>

            <div class="form-group">
                <label for="department">Department:</label>
                <input type="number" id="department" name="department" value="{{ $teacher->department->department_id }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Teacher</button>
        </form>

     </div>
</body>
</html>
