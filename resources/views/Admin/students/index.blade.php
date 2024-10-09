<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">

    <style>
    /* تحسين تصميم الجدول */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }

    th,
    td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: rgb(133, 137, 75);
        color: white;
        text-align: center;
    }

    tr:hover {
        background-color: rgb(144, 137, 35);
    }

    td {
        text-align: center;
    }

    /* تحسين تصميم الأزرار */
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border: none;
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

    .btn-show {
        background-color: rgb(146, 137, 75);
        color: white;
        text-decoration: none;
    }

    .btn-show:hover {
        background-color: rgb(146, 137, 35);
    }

    /* زر العودة للصفحة الرئيسية وزر إضافة طالب */
    .btn-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .btn-home,
    .btn-add-student {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-home {
        background-color: rgb(146, 137, 5);
        color: white;
    }

    .btn-home:hover {
        background-color: rgb(146, 137, 75);
    }

    .btn-add-student {
        background-color: black;
        color: white;
    }

    .btn-add-student:hover {
        background-color: rgb(146, 137, 5);
    }

    /* تحسين تصميم الحاوية */
    .container {
        width: 80%;
        margin: auto;
        padding: 20px;
        background: linear-gradient(135deg, rgb(146, 137, 5), #e6e9ef);
        /* تدرج ألوان هادئة وجذابة */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .alert {
        padding: 15px;
        background-color: #4CAF50;
        color: white;
        margin-bottom: 20px;
        text-align: center;
    }

    /* تصميم الرسالة الترحيبية */
    .welcome-message {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        padding: 15px;
        background-color: #333;
        border-radius: 8px;
        margin-bottom: 20px;
        display: none;
        /* اخفاء الرسالة في البداية */
        animation: fadein 2s forwards;
        /* تأثير الظهور */
    }

    /* تأثير ظهور واختفاء الرسالة */
    @keyframes fadein {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeout {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    /* توسيط الصفحة */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f2f2f2;
    }

    .container {
        width: 60%;
    }

    /* تصميم مربع البحث */
    .search-container {
        margin-bottom: 20px;
    }

    .search-box {
        padding: 10px 35px 10px 10px;
        /* مساحة داخلية */
        width: 50%;
        /* تصغير العرض */
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
        background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png');
        /* أيقونة البحث */
        background-position: right 10px center;
        background-repeat: no-repeat;
        background-size: 20px;
        /* حجم الأيقونة */
        margin-bottom: 10px;
    }

    /* تصميم أزرار Next و Previous */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination-btn {
        padding: 10px 15px;
        margin: 0 5px;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        text-decoration: none;
        width: 70px;
    }

    .pagination-btn:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>

    <div class="container">
        <!-- رسالة ترحيب -->
        <div class="welcome-message" id="welcomeMessage">
            Welcome, {{ Auth::user()->name }}!
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- أزرار العودة للصفحة الرئيسية وإضافة طالب جديد -->
        <div class="btn-container">
            <a href="{{ asset('dashboard') }}" class="btn-home">Go to Dashboard</a>
            <a href="{{ route('Admin_students.create') }}" class="btn-add-student">Add New Student</a>
        </div>

        <!-- مربع البحث عن طالب -->
        <div class="search-container">
            <form action="{{ route('Admin_students.index') }}" method="GET">
                <input type="text" name="search" class="search-box" placeholder="Search for a student...">
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Division</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->Name }}</td>
                    <td>{{ $student->Age }}</td>
                    <td>{{ $student->class->ClassName }}</td>
                    <td>{{ $student->division->division_name }}</td>
                    <td>
                        <!-- زر العرض -->
                        <a href="{{ route('Admin_students.show', $student->StudentID) }}" class="btn btn-show">Show</a>

                        <!-- زر التحديث -->
                        <a href="{{ route('Admin_students.edit', $student->StudentID) }}"
                            class="btn btn-primary">Update</a>

                        <!-- زر الحذف -->
                        <form action="{{ route('Admin_students.destroy', $student->StudentID) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- أزرار Next و Previous -->
<!--         <div class="pagination-container">
            <form action="{{ route('Admin_students.index') }}" method="GET" class="pagination-btn">
                @if ($currentPage > 1)
                    <input type="hidden" name="page" value="{{ $currentPage - 1 }}">
                    <button type="submit" class="pagination-btn">Previous</button>
                @endif
            </form>
            <form action="{{ route('Admin_students.index') }}" method="GET" class="pagination-btn">
                <input type="hidden" name="page" value="{{ $currentPage + 1 }}">
                <button type="submit" class="pagination-btn">Next</button>
            </form>
        </div> -->
        <!-- أزرار Next و Previous -->
        <div class="pagination-container">
            @if ($currentPage > 1)
            <form action="{{ route('Admin_students.index') }}" method="GET" class="pagination-btn">
                <input type="hidden" name="page" value="{{ $currentPage - 1 }}">
                <button type="submit" class="pagination-btn">Previous</button>
            </form>
            @endif
            <form action="{{ route('Admin_students.index') }}" method="GET" class="pagination-btn">
                <input type="hidden" name="page" value="{{ $currentPage + 1 }}">
                <button type="submit" class="pagination-btn">Next</button>
            </form>
        </div>

    </div>

    <script>
    // عرض الرسالة الترحيبية لفترة قصيرة
    document.addEventListener('DOMContentLoaded', function() {
        var welcomeMessage = document.getElementById('welcomeMessage');
        welcomeMessage.style.display = 'block'; // عرض الرسالة

        // إخفاء الرسالة بعد 3 ثواني
        setTimeout(function() {
            welcomeMessage.style.animation = 'fadeout 1s forwards'; // تأثير الاختفاء
            setTimeout(function() {
                welcomeMessage.style.display = 'none'; // إخفاء الرسالة تماماً
            }, 1000); // الانتظار لمدّة تأثير الاختفاء
        }, 3000);
    });
    </script>

</body>

</html>