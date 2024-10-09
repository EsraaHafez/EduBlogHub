<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - EduBlogHub Platform</title>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> <!-- Font Awesome -->
    <style>
        body {
            background: linear-gradient(135deg, rgb(146, 137, 5), #e6e9ef);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: goldenrod;
            color: black;
            max-width: 800px;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 15px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            gap: 25px; /* Adding gap between fields */
        }

        .form-group {
            width: 100%; /* Each form group takes 100% of the width */
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            margin-top: 3px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 8px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        .btn:hover {
            background-color: #555;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        p a {
            color: black;
            text-decoration: none;
            font-weight : bold ;
        }

        .welcome-message {
            text-align: center;
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        /* Adding space between every two rows of fields */
        .form-row:not(:last-child) {
            margin-bottom: 20px; /* Added margin between field groups */
        }

        /* Animation using AOS */
        [data-aos] {
            opacity: 0;
            transition-property: opacity, transform;
        }

        [data-aos].aos-animate {
            opacity: 1;
            transform: translate(0, 0);
        }

        .form-container, h2, .form-group, .btn, p {
            animation: fadeInUp 1s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="form-container" data-aos="fade-up">
        <div class="welcome-message">Welcome to EduBlogHub!</div>
        <h2>Register a New Account</h2>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <form action="{{ route('register') }}" method="POST" id="registerForm" onsubmit="return validateRegisterForm()">
            @csrf
            <!-- Row 1: Username and Email -->
            <div class="form-row">
                <div class="form-group">
                    <label for="name">User Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Row 2: Password and Confirm Password -->
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p>Already registered? <a href="{{ route('login') }}">Login here</a>.</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
