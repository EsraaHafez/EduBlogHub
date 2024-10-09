<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Post - EduBlogHub</title>
    <script src="{{ asset('web/js/script.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, rgb(146, 140, 25) , #e6e9ef); /* تدرج ألوان هادئة وجذابة */
        }

        .form-container {
            background-color: rgb(146, 140, 25); /* أزرق هادئ */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 80%; /* عرض الـ container */
            max-width: 500px; /* أقصى عرض للـ container */
            text-align: center;
            margin: 50px auto; /* لمركز الشكل */
        }

        h2 {
            color: black; /* لون العنوان */
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group-row {
            display: flex; /* ترتيب الحقول جنباً إلى جنب */
            justify-content: space-between; /* إضافة مسافة بين الحقول */
            margin-bottom: 15px;
        }

        .form-group-row > div {
            width: 48%; /* عرض الحقلين */
        }

        label {
            color: black;
            font-weight: bold;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
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
            background-color: rgb(138,122,35); /* لون الزر */
            color: black;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 10px; /* إضافة مسافة فوق الزر */
        }

        button.btn-primary:hover{
            background-color : rgb(138,177,89) ;
        }


        /* إضافة تنسيق للجملة المتحركة */
        .animated-message {
            color: black;
            font-size: 1.2em;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            overflow: hidden;
            white-space: nowrap;
            animation: typing 3s steps(30, end) infinite alternate;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }
    </style>
</head>
<body>
  
    <!-- New Post Creation Section -->
    <main class="form-container">
        
        <!-- جملة تشجع على نشر البوست -->
        <div class="animated-message">✨ Share your ideas and start writing now! ✨</div>

        <h2>Create New Post</h2>
 
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- حقول إدخال جديدة مع صفوف -->
            <div class="form-group-row">
                <div class="form-group">
                    <label for="Post_title">Post Title:</label>
                    <input type="text" id="Post_title" name="Post_title" required>
                    @error('Post_title')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Classification">Classification:</label>
                    <select id="Classification" name="Classification" required>
                        <option value="Technology">Technology</option>
                        <option value="Health">Health</option>
                        <option value="Sports">Sports</option>
                        <option value="Art">Art</option>
                    </select>
                    @error('Classification')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="image_url">Add Image:</label>
                <input type="file" id="image_url" name="image_url" accept="image/*" required>
                @error('image_url')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Post_content">Post Content:</label>
                <textarea id="Post_content" name="Post_content" rows="10" required></textarea>
                @error('Post_content')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Publish Post</button>
            <button onclick="window.location.href='{{ route('home') }}'" class="btn-primary">Return to Home Page</button>
        </form>

        <!-- جملة تشجع على نشر البوست -->
        <!-- <div class="animated-message">✨ Share your ideas and start writing now! ✨</div> -->
    </main>

    <!-- Include JavaScript libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
