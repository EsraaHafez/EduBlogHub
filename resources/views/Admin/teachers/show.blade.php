<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">

    <style>
        /* Improve form design */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make the page cover the full height of the screen */
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
        <h1>Teacher Details</h1>

        <div class="teacher-info">
            <p><strong>Name:</strong> {{ $teacher->Name }}</p>
            <p><strong>Hire Date:</strong> {{ $teacher->HireDate }}</p>
            <p><strong>Subject:</strong> {{ $teacher->subject->subject_name }}</p>
            <p><strong>Department:</strong> {{ $teacher->department->department_name }}</p>
        </div>

        <!-- Update and Delete buttons -->
        <a href="{{ route('Admin_teachers.edit', $teacher->TeacherID) }}" class="btn btn-primary">Update</a>
        <form action="{{ route('Admin_teachers.destroy', $teacher->TeacherID) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

        <!-- Button to return to the teacher list page -->
        <a href="{{ route('Admin_teachers.index') }}" class="btn btn-back">Return to All Teachers</a>
    </div>
</body>
</html>
