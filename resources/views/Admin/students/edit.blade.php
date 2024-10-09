<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
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

        input[type="text"], input[type="number"] {
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
        <!-- زر العودة للصفحة الرئيسية -->
        <!-- <a href="{{ asset('index') }}" class="btn-home">Go to Home</a> -->

        <h1>Edit Student</h1>

        <form action="{{ route('Admin_students.update', $student->StudentID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student-name">Name:</label>
                <input type="text" id="student-name" name="student-name" value="{{ $student->Name }}" required>
            </div>

            <div class="form-group">
                <label for="student-age">Age:</label>
                <input type="number" id="student-age" name="student-age" value="{{ $student->Age }}" required>
            </div>

            <div class="form-group">
                <label for="student-class">Class:</label>
                <input type="text" id="student-class" name="student-class" value="{{ $student->ClassID }}" required>
            </div>

            <div class="form-group">
                <label for="postDivision">Division:</label>
                <input type="text" id="postDivision" name="postDivision" value="{{ $student->division_id }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</body>
</html>
