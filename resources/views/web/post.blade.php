<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->Post_title }} - EduBlogHub</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    .post-info {
        text-align: center;
        margin-bottom: 20px;
    }

    .post-title {
        font-size: 24px;
        margin: 10px 0;
        color: black;
    }

    .post-meta {
        color: #077502;
        font-size: 14px;
    }

    .post-content {
        margin: 20px 0;
        line-height: 1.6;
        color: black;
        font-style: italic;
        font-weight: bold;
    }



    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content i {
        cursor: pointer;
        color: goldenrod;
        transition: color 0.3s;
        margin: 5px;
    }

    .dropdown-content i:hover {
        color: darkgoldenrod;
    }

    .like-dislike {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        color:goldenrod;
    }

    .like-dislike i {
        cursor: pointer;
        color: goldenrod;
        transition: color 0.3s;
    }

    .like-dislike i:hover {
        color: darkgoldenrod;
    }

    .btn-back {
        background-color: goldenrod;
        color: black;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        margin-bottom: 40px;
        display: inline-block;
    }

    .btn-back:hover {
        background-color: darkgoldenrod;
    }

    .edit-comment-form {
        display: none;
        margin-top: 20px;
    }

    .edit-comment-form textarea {
        width: 70%;
        border-radius: 12px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .edit-comment-form button {
        background-color: goldenrod;
        color: black;
        padding: 10px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }

    .edit-comment-form button:hover {
        background-color: darkgoldenrod;
    }

    .cancel-link {
        color: green;
        text-decoration: none;
        margin-left: 15px;
        font-size: 14px;
    }

    .cancel-link:hover{
        text-decoration: none;
    }
    .delete-comment-btn{
        background: none;
        color:goldenrod;
        border:none;

    }
    .edit-comment-btn{
        background: none;
        color:goldenrod;
        border:none;

    }
    .comment-actions i{

        color:goldenrod;
    }
    </style>
</head>

<body>
    <main class="post-details-container">
        <!-- Back to all posts button -->
        <a href="{{ route('web.posts') }}" class="btn-back">Back to All Posts</a>

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

        <!-- Post actions (dropdown menu for share, delete, edit, bookmark) -->
        <div class="post-actions">
            <div class="dropdown">
                <i class="fa-solid fa-ellipsis"></i>
                <div class="dropdown-content">
                    @if(Auth::check() && Auth::user()->id == $post->AuthorID)
                    <a href="{{ route('posts.edit', $post->PostID) }}"><i class="fa-solid fa-pencil"></i></a>
                    <form action="{{ route('posts.destroy', $post->PostID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-post-btn"
                            style="background: none; border: none; cursor: pointer;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    @endif
                    <i class="fa-solid fa-share"></i>
                    <i class="fa-solid fa-bookmark"></i>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <h3 class="comments-title">Comments</h3>

            @foreach($post->comments as $comment)
            <div class="comment" id="comment-{{ $comment->CommentID }}">
                <div class="comment-header">
                    <strong class="username">{{ $comment->author->name ?? 'Unknown User' }}</strong>
                    <span
                        class="comment-date">{{ \Carbon\Carbon::parse($comment->DateCreated)->format('Y-m-d') }}</span>
                </div>
                <p class="comment-text">{{ $comment->Content }}</p>

                <!-- Like, Dislike, Edit, Delete in one row -->
                <div class="comment-actions">
                    <i class="fa-solid fa-thumbs-up"></i>
                    <i class="fa-solid fa-thumbs-down"></i>
                    @if(Auth::check() && Auth::user()->id == $comment->AuthorID)
                    <button class="edit-comment-btn" data-comment-id="{{ $comment->CommentID }}">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <form action="{{ route('comments.destroy', $comment->CommentID) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"   class="delete-comment-btn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    @endif
                </div>

                <!-- Edit comment form -->
                <form id="edit-comment-form-{{ $comment->CommentID }}" class="edit-comment-form"
                    action="{{ route('comments.update', $comment->CommentID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <textarea name="Content" rows="3">{{ $comment->Content }}</textarea>
                    <button type="submit">Save</button>

                    <!-- Cancel Link -->
                    <a href="javascript:void(0);" class="cancel-link"
                        data-comment-id="{{ $comment->CommentID }}">Cancel</a>
                </form>
            </div>
            @endforeach


            <!-- Add Comment Form -->
            @if(Auth::check())
            <form action="{{ route('comments.store', ['PostID' => $post->PostID]) }}" method="POST"
                class="add-comment-form">
                @csrf
                <textarea  style="width: 444px; heght:99px; border-radius:12px;" name="Content" rows="4" placeholder="Add a comment..."></textarea>
                <input type="hidden" name="PostID" value="{{ $post->PostID }}">
                <button type="submit" class="btn-submit">Submit</button>
            </form>
            @else
            <p>You must be logged in to comment.</p>
            @endif
        </div>
    </main>

    <script>
    // Toggle the edit comment form
    document.querySelectorAll('.edit-comment-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const editForm = document.getElementById(`edit-comment-form-${commentId}`);
            editForm.style.display = (editForm.style.display === 'none' || !editForm.style.display) ?
                'block' : 'none';
        });
    });


    document.querySelectorAll('.cancel-link').forEach(link => {
        link.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const editForm = document.getElementById(`edit-comment-form-${commentId}`);
            editForm.style.display = 'none'; // إخفاء الفورم
        });
    });
    </script>
</body>

</html>