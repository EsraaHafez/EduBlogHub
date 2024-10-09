<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduBlogHub Platform</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            /* Gradient background */
            background: linear-gradient(135deg, rgb(146, 137, 5), #e6e9ef);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            text-align: center;
        }

        .welcome-message {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #000000; /* Text color */
            font-size: 28px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: fadeIn 2s ease-out;
        }

        .form-container {
            background: goldenrod; /* Form background color */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: slideIn 1s ease-out;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #000000; /* Heading text color */
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #000000; /* Label text color */
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #000000;
            outline: none;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #ffffff;
            color: goldenrod;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #f0f0f0;
        }

        .error-message {
            color: red;
            margin: 10px 0;
            font-size: 14px;
        }

        p {
            margin-top: 15px;
        }

        a {
            color: #000000;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .animated-box {
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 10px;
            margin: 20px auto;
            width: fit-content;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: bounce 2s infinite;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        Welcome to EduBlogHub
    </div>
    <div class="animated-box">
        <h3>Ready for a new experience?</h3>
        <p>Join us today and start exploring amazing content.</p>
    </div>
    <div class="form-container">
        <h2>Login</h2>
        @if ($errors->any())
            <div class="error-message">
                <p>{{ $errors->first() }}</p>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
