<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Student</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">

    <style>
        /* تحسين تصميم النموذج */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* لجعل الصفحة تغطي ارتفاع الشاشة بالكامل */
            margin: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 60%;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-danger {
            background-color: #f44336;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #e41f1f;
        }

        .btn-back {
            background-color: #007BFF;
            color: white;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Details</h1>

        <div class="student-info">
            <p><strong>Name:</strong> {{ $student->Name }}</p>
            <p><strong>Age:</strong> {{ $student->Age }}</p>
            <p><strong>Class:</strong> {{ $student->ClassID }}</p>
            <p><strong>Division:</strong> {{ $student->division_id }}</p>
        </div>

        <!-- أزرار التحديث والحذف -->
        <a href="{{ route('students.edit', $student->StudentID) }}" class="btn btn-primary">Update</a>
        <form action="{{ route('students.destroy', $student->StudentID) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <!-- زر العودة إلى صفحة عرض الطلاب -->
        <a href="{{ route('students.index') }}" class="btn btn-back">Back to All Students</a>
    </div>
</body>
</html>
