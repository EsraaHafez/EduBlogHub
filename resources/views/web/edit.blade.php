<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - EduBlogHub</title>
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, rgb(146, 140, 25), #e6e9ef); /* تدرج ألوان هادئة وجذابة */
            display: flex; /* استخدام flexbox لترتيب العناصر */
            justify-content: center; /* محاذاة العناصر في الوسط */
            align-items: center; /* محاذاة العناصر في الوسط عمودياً */
            height: 100vh; /* ارتفاع الصفحة */
            position: relative; /* لجعل المربع الثابت يعمل بشكل صحيح */
        }

        .form-container {
            background-color: rgb(146, 140, 25); /* لون الخلفية */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 80%; /* عرض الـ container */
            max-width: 500px; /* أقصى عرض للـ container */
            text-align: center;
            margin-left: 20px; /* إضافة مسافة على اليسار */
        }

        h2 {
            color: black; /* لون العنوان */
            margin-bottom: 10px; /* تقليل المسافة أسفل العنوان */
        }

        .smiley-icon {
            font-size: 40px; /* حجم الرمز */
            color: #ffcc00; /* لون الرمز */
            margin: 15px 0; /* مسافة فوق وتحت الرمز */
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            color: black;
            font-weight: bold;
            margin-top: 10px; /* إضافة مسافة فوق العناوين */
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .error-message {
            color: black;
            font-size: 0.9em;
        }

        button.btn-primary {
            background-color: rgb(138, 122, 35); /* لون الزر */
            color: black;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 10px; /* إضافة مسافة فوق الزر */
        }

        button.btn-primary:hover {
            background-color: rgb(138, 177, 89);
        }

        .sidebar {
            background-color: rgb(146, 140, 25); /* لون الخلفية للمربع الجانبي */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 300px; /* عرض المربع الجانبي */
            max-width: 100%; /* أقصى عرض */
            position: absolute; /* جعل المربع الجانبي ثابتًا */
            left: 20px; /* محاذاة المربع الجانبي لليسار */
            top: 50%; /* محاذاة المربع الجانبي في منتصف الصفحة */
            transform: translateY(-50%); /* تحريك المربع لأعلى نصف طوله */
            display: block; /* بداية عرض المربع */
        }

        .sidebar h3 {
            margin-bottom: 15px; /* مسافة أسفل العنوان */
            text-align: center; /* مركز العنوان */
        }

        .sidebar p {
            text-align: center; /* مركز الفقرات */
            color: black; /* لون النص */
        }
    </style>
    <script>
        // دالة لإظهار وإخفاء المربع الجانبي بشكل متكرر
        window.onload = function() {
            const sidebar = document.querySelector('.sidebar');
            setInterval(function() {
                if (sidebar.style.display === 'none' || sidebar.style.display === '') {
                    sidebar.style.display = 'block'; // إظهار المربع الجانبي
                } else {
                    sidebar.style.display = 'none'; // إخفاء المربع الجانبي
                }
            }, 5000); // كل 5 ثوانٍ
        }
    </script>
</head>
<body>
    <!-- Edit Post Section -->
    <main class="form-container">
        <h2>Edit Post</h2>
        <div class="smiley-icon">
            <i class="fas fa-smile"></i> <!-- رمز وجه مبتسم -->
        </div>
        <form action="{{ route('posts.update', $post->PostID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT for updating data -->

            <div class="form-group">
                <label for="Post_title">Post Title:</label>
                <input type="text" id="Post_title" name="Post_title" value="{{ $post->Post_title }}" required>
                @error('Post_title')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Classification">Classification:</label>
                <select id="Classification" name="Classification" required>
                    <option value="Technology" {{ $post->Classification == 'Technology' ? 'selected' : '' }}>Technology</option>
                    <option value="Health" {{ $post->Classification == 'Health' ? 'selected' : '' }}>Health</option>
                    <option value="Sports" {{ $post->Classification == 'Sports' ? 'selected' : '' }}>Sports</option>
                    <option value="Art" {{ $post->Classification == 'Art' ? 'selected' : '' }}>Art</option>
                </select>
                @error('Classification')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image_url">Update Image:</label>
                <input type="file" id="image_url" name="image_url" accept="image/*">
                <img src="{{ asset($post->image_url) }}" alt="Current Image" style="max-width: 100px;"> <!-- Display current image -->
                @error('image_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Post_content">Post Content:</label>
                <textarea id="Post_content" name="Post_content" rows="10" required>{{ $post->Post_content }}</textarea>
                @error('Post_content')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Update Post</button>
            <button onclick="window.location.href='{{ route('home') }}'" class="btn-primary">Return to Home Page</button>
        </form>
    </main>

    <!-- Sidebar -->
    <aside class="sidebar">
        <h3>Tip:</h3>
        <p>Review your post before publishing!</p> <!-- جملة واحدة فقط -->
    </aside>

    <!-- Include JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
