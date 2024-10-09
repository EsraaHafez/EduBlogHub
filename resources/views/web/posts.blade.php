<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts - EduBlogHub platform</title>
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Awesome -->
    <style>
    /* أضف التنسيق الخاص بك هنا */
    .btn-back {
        background-color: rgb(138, 144, 25);
        color: black;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 20px;
        /* مسافة بين الزر والمحتوى */
        margin-top: 66px;
        transition: background-color 0.3s;
    }

    .btn-back:hover {
        background-color: rgb(138, 144, 50);
    }


    .btn-create {
        display: inline-block;
        /* يسمح للزر بأن يكون في خط مع العناصر الأخرى */
        padding: 10px 20px;
        /* مساحة داخلية للزر */
        font-size: 16px;
        /* حجم الخط */
        color:black;
        /* لون النص */
        background-color: rgb(138, 144, 25);
        /* لون خلفية الزر */
        border: none;
        /* إزالة الحدود */
        border-radius: 5px;
        /* زوايا مدورة */
        text-align: center;
        /* محاذاة النص في المنتصف */
        text-decoration: none;
        /* إزالة التسطير */
        transition: background-color 0.3s;
        /* تأثير عند التمرير */
    }

    .btn-create:hover {
        background-color: rgb(138, 144, 50);
        /* تغيير لون الخلفية عند التمرير */
    }
    </style>
</head>

<body>
    <!--     <header class="navbar">
        <a href="{{ asset('index') }}" class="navbar-brand"><i class="fa-brands fa-blogger"></i> EduBlogHub</a>
        <nav class="nav-links">
            <a href="{{ asset('index') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
            <a href="{{ asset('posts') }}" class="nav-link"><i class="fas fa-list"></i> Posts</a>
            <a href="{{ asset('new-post') }}" class="nav-link"><i class="fas fa-plus"></i> New Post</a>
            <a href="{{ asset('login') }}" class="nav-link"><i class="fas fa-user"></i> Login</a>
            <a href="{{ asset('register') }}" class="nav-link"><i class="fa-regular fa-id-card"></i> Register</a>

            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-building-columns"></i> Management</button>
                <div class="dropdown-content">
                    <a href="{{ asset('students') }}">Students</a>
                    <a href="{{ asset('teachers') }}">Teachers</a>
                    <a href="{{ asset('attendance') }}">Attendance</a>
                    <a href="{{ asset('timetable') }}">Timetable</a>
                    <a href="{{ asset('class') }}">Class</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-file"></i> Reports</button>
                <div class="dropdown-content">
                    <a href="{{ asset('Teachers_Repoprts') }}">Teacher Reports</a>
                    <a href="{{ asset('Students_Reports') }}">Student Reports</a>
                </div>
            </div>
        </nav>
    </header> -->

    <main class="posts-container">
        <!-- <h1 class="section-title"> Posts</h1> -->
        <a href="{{ asset('index') }}" class="btn-back">Back to Home</a>
        <a href="{{ asset('new-post') }}" class="btn-create">Create New Post</a>
        <div class="posts-grid">
            @foreach ($posts as $post)
            <div class="post-card" data-aos="fade-up">
                <img src="{{ asset('storage/' . $post->image_url) }}" alt="{{ $post->Post_title }}" class="post-image">
                <div class="post-content">
                    <h2 class="post-title">{{ $post->Post_title }}</h2>
                    <p class="post-excerpt">{{ Str::limit($post->Post_content, 100) }}</p>
                    <a href="{{ route('web.post', $post->PostID) }}" class="btn-secondary">Read More</a>

                    <!-- أزرار الحذف والتحديث -->
                    @if (auth()->check() && auth()->user()->id == $post->AuthorID)
                    <!-- شرط التحقق من ملكية المنشور -->
                    <div class="post-actions">
                        <a href="{{ route('posts.edit', $post->PostID) }}" class="btn-edit"><i class="fas fa-edit"></i>
                            Edit</a>

                        <form action="{{ route('posts.destroy', $post->PostID) }}" method="POST" class="delete-form"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>