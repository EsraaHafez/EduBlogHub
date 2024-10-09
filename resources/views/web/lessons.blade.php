<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* خلفية الصفحة مع تدرج */
        body {
            background: linear-gradient(135deg, rgb(146, 137, 5), #e6e9ef);
            /* تدرج هادئ */
            font-family: 'Arial', sans-serif;
        }

        /* ترحيب المدرسين */
        .welcome-text {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 30px;
        }

        /* تحسين شكل الجدول مع تدرج */
        table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        /* تحسين الأزرار */
        .btn-primary,
        .btn-show,
        .btn-danger {
            background: linear-gradient(135deg, rgb(146, 137, 5), #e6e9ef);
            border: none;
            color: white;
        }

        button {
            margin-top: 5px;
            padding: 8px 12px;
        }

        /* تحسين شكل الروابط */
        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        /* تظليل عند تمرير الماوس على الصفوف */
        tr:hover {
            background-color: #f1f1f1;
        }

        .create-lesson-btn {
            display: block;
            text-align: center;
            margin: 20px 0;
        }

        .create-lesson-btn a {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            text-decoration: none;
        }

        .create-lesson-btn a:hover {
            background-color: #218838;
        }

        /* زر العودة إلى الصفحة الرئيسية */
        .back-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            display: inline-block;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        /* تحديد حجم الفيديو */
        iframe {
            width: 280px; /* عرض الفيديو */
            height: 157px; /* ارتفاع الفيديو */
        }
    </style>
</head>

<body>
    <div class="container mt-5">

        <!-- جملة ترحيبية -->
        <div class="welcome-text">
            Welcome Teachers! Ready to create new lessons and inspire your students?
        </div>

        <!-- زر إنشاء درس جديد -->
        <div class="create-lesson-btn">
            <!-- زر العودة إلى الصفحة الرئيسية -->
            <a href="{{ url('/') }}" class="back-btn">Back to Home</a>

            <a href="{{ route('lessons.create') }}">Create New Lesson</a>
        </div>

        <!-- عرض الرسالة إن وجدت -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- جدول الدروس -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Google Meet</th>
                    <th>Video</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->title }}</td>
                    <td>{{ $lesson->description }}</td>
                    <td>{{ $lesson->date }}</td>
                    <td>
                        @if($lesson->meeting_link)
                        <a href="{{ $lesson->meeting_link }}" target="_blank" class="btn btn-outline-info">Join Meeting</a>
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        @if($lesson->youtube_id)
                        <iframe src="https://www.youtube.com/embed/{{ $lesson->youtube_id }}"
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        <!-- زر العرض -->
                        <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-show">Show</a>

                        <!-- زر التحديث -->
                        <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-primary">Update</a>

                        <!-- زر الحذف -->
                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
