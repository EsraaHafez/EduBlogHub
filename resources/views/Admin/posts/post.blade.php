<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->Post_title }} - EduBlogHub</title>
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Awesome -->
    <style>
    .post-actions {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
    }

    .post-actions .btn {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        color: white;
        text-decoration: none;
    }

    .post-actions .btn-primary {
        background-color: #007bff;
    }

    .post-actions .btn-danger {
        background-color: #dc3545;
    }

    .post-actions .btn i {
        margin-right: 5px;
    }

    .post-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    .post-image-wrapper {
        width: 50%;
        max-width: 800px;
        height: auto;
        overflow: hidden;
        border: 2px solid #ddd;
        /* Border around the image */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Shadow effect */
    }

    .post-image {
        width: 100%;
        height: auto;
        display: block;
    }

    .post-info {
        text-align: center;
    }

    .post-title {
        margin: 10px 0;
    }

    .post-content {
        margin: 20px 0;
    }

    .comments-section {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="navbar">
        <a href="{{ asset('index') }}" class="navbar-brand"><i class="fa-brands fa-blogger"></i> EduBlogHub</a>
        <nav class="nav-links">
            <a href="{{ asset('index') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
            <a href="{{ asset('posts') }}" class="nav-link"><i class="fas fa-list"></i> Posts</a>
            <a href="{{ asset('new-post') }}" class="nav-link"><i class="fas fa-plus"></i> New Post</a>
            <a href="{{ asset('login') }}" class="nav-link"><i class="fas fa-user"></i> Login</a>
            <a href="{{ asset('register') }}" class="nav-link"><i class="fa-regular fa-id-card"></i> Register</a>

            <!-- Dropdown for Management -->
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

            <!-- Dropdown for Reports -->
            <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-file"></i> Reports</button>
                <div class="dropdown-content">
                    <a href="{{ asset('Teachers_Repoprts') }}">Teacher Reports</a>
                    <a href="{{ asset('Students_Reports') }}">Student Reports</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="post-details-container">
        <!-- Action Buttons -->
        <!--         <div class="post-actions">
            <a href="{{ route('posts.edit', $post->PostID) }}" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Edit</a>
            <form action="{{ route('posts.destroy', $post->PostID) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </div> -->

        <div class="post-header">
            <div class="post-image-wrapper">
                <img src="{{ asset('storage/' . $post->image_url) }}" alt="Post Image" class="post-image">
            </div>
            <div class="post-info">
                <h1 class="post-title">{{ $post->Post_title }}</h1>
                <p class="post-meta">
                    Posted on {{ $post->DateCreated }}
                    @if($author)
                    by {{ $author->name }}
                    @else
                    by Unknown Author
                    @endif
                </p>
            </div>
        </div>

        <div class="post-content">
            <p>{{ $post->Post_content }}</p>
        </div>

        <div class="post-actions">
            @if(Auth::check() && Auth::user()->id == $post->AuthorID)
            <!-- تحقق من أن المستخدم مسجل وأنه صاحب المنشور -->
            <a href="{{ route('posts.edit', $post->PostID) }}" class="btn btn-primary"><i
                    class="fa-solid fa-pencil"></i> Edit</a>
            <form action="{{ route('posts.destroy', $post->PostID) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
            @endif
        </div>


        <div class="comments-section">
            <h3 class="comments-title">Comments</h3>

            <!-- Display Comments -->
            @foreach($post->comments as $comment)
            <div class="comment">
                <div class="comment-header">
                    <strong class="username">{{ $comment->author->name ?? 'Unknown User' }}</strong>
                    <span
                        class="comment-date">{{ \Carbon\Carbon::parse($comment->DateCreated)->format('Y-m-d') }}</span>
                </div>
                <p class="comment-text">{{ $comment->Content }}</p>
            </div>
            @endforeach


            <!-- Add Comment Form -->
            <h4 class="add-comment-title">Add a Comment</h4>
            <form id="commentForm" class="comment-form" action="{{ route('comments.store', $post->PostID) }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label for="comment">Your Comment:</label>
                    <textarea id="comment" name="Content" rows="4" class="form-textarea" required></textarea>

                </div>
                <button type="submit" class="btn-submit">Submit Comment</button>
            </form>
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>