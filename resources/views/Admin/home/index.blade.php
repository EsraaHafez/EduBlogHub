<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduBlogHub Platform</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Awesome -->
    <style>
    .btn-logout {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        color: black;
        background-color: rgb(146, 137, 5); 
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-logout:hover {
        background-color:rgb(146, 122, 45);
    }
    </style>
</head>

<body>
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
                    <a href="{{ asset('students') }}">Students</a>
                    <a href="{{ asset('teachers') }}">Teachers</a>
                    <a href="{{ asset('attendance') }}">Attendance</a>
                    <a href="{{ asset('timetable') }}">Timetable</a>
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
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">تسجيل خروج</button>
            </form>
        </nav>
    </header>
    <section class="hero">
        <h1>Welcome to MyBlog</h1>
        <p>Share your thoughts and ideas with the world.</p>
        <a href="{{ asset('new-post') }}" class="btn-primary">Create a Post</a>
    </section>
    <main class="posts-container">
        <h2 class="section-title">Recent Posts</h2>
        <div class="posts-grid">
            <div class="post-card" data-aos="fade-up">
                <!-- <img src="images/Blogg.jpg" alt="Post Image" class="post-image"> -->
                <div class="post-content">
                    <h3 class="post-title">Post Title 1</h3>
                    <p class="post-excerpt">This is a short excerpt from the post...</p>
                    <a href="{{ asset('posts') }}" class="btn-secondary">Read More</a>
                </div>
                <!-- Add more posts similarly -->
            </div>

            <div class="post-card" data-aos="fade-up">
                <!-- <img src="images/Blogg.jpg" alt="Post Image" class="post-image"> -->
                <div class="post-content">
                    <h3 class="post-title">Post Title 2</h3>
                    <p class="post-excerpt">This is a short excerpt from the post...</p>
                    <a href="{{  asset('posts')}}" class="btn-secondary">Read More</a>
                </div>
                <!-- Add more posts similarly -->
            </div>

            <div class="post-card" data-aos="fade-up">
                <!-- <img src="images/Blogg.jpg" alt="Post Image" class="post-image"> -->
                <div class="post-content">
                    <h3 class="post-title">Post Title 3</h3>
                    <p class="post-excerpt">This is a short excerpt from the post...</p>
                    <a href="{{ asset('posts') }}" class="btn-secondary">Read More</a>
                </div>
                <!-- Add more posts similarly -->
            </div>

            <div class="post-card" data-aos="fade-up">
                <!-- <img src="images/Blogg.jpg" alt="Post Image" class="post-image"> -->
                <div class="post-content">
                    <h3 class="post-title">Post Title 4</h3>
                    <p class="post-excerpt">This is a short excerpt from the post...</p>
                    <a href="{{ asset('posts') }}" class="btn-secondary">Read More</a>
                </div>
                <!-- Add more posts similarly -->
            </div>
        </div>
        <section class="featured-media">
            <h2 class="section-title">Featured Video</h2>
            <iframe controls class="featured-video" data-aos="fade-up" width="400" height="315"
                src="https://www.youtube.com/embed/qldf3CPLqJA?si=At0ihy-7xvrx9Lho" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </section>
        <section class="additional-content">
            <div class="content-box" data-aos="fade-up">
                <img src="{{ asset('web/images/Blogg2.jpg') }}" alt="Feature Image" class="feature-image">
                <h3>Feature Title 1</h3>
                <p>Discover amazing content and resources here...</p>
            </div>
            <div class="content-box" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('web/images/Blogg4.jpg') }}" alt="Feature Image" class="feature-image">
                <h3>Feature Title 2</h3>
                <p>Explore new trends and insights with our latest updates...</p>
            </div>
            <div class="content-box" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('web/images/Blogg3.jpg') }}" alt="Feature Image" class="feature-image">
                <h3>Feature Title 3</h3>
                <p>Join our community and stay connected with the world...</p>
            </div>
        </section>
    </main>


    <footer class="site-footer">
        <div class="footer-info">
            <p><i class="fas fa-envelope"></i> Email: contact@myblog.com</p>
            <p><i class="fas fa-phone"></i> Phone: +123 456 7890</p>
        </div>
        <p>&copy; 2024 MyBlog. All rights reserved.</p>
    </footer>

    <!--     
    <footer>
        <p>&copy; 2024 MyBlog. All rights reserved.</p>
    </footer> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>