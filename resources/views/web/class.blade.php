<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Page design */
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

        .search-container {
            margin-bottom: 20px;
            position: relative;
            width: 100%;
        }

        .search-container input[type="text"] {
            width: calc(100% - 50px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            padding-right: 40px;
        }

        .search-container button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #45a049;
        }

        .search-container i {
            font-size: 18px;
        }

        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: linear-gradient(135deg, rgb(146, 137, 5), #e6e9ef);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .back-button {
            margin-bottom: 20px;
            text-align: left;
        }

        .back-button a {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .back-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Back to home button -->
        <div class="back-button">
            <a href="{{ url('/') }}">Back to Home</a>
        </div>

        <h1>Classrooms</h1>

        <!-- Search form -->
        <div class="search-container">
            <form action="{{ route('classes.search') }}" method="GET">
                <input type="text" name="search" placeholder="Enter class or teacher name" required>
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- No data found message -->
        @if(isset($noClasses) && $noClasses)
        <p class="alert">No data found with this name</p>
        @endif

        <!-- Classrooms table -->
        <table>
            <thead>
                <tr>
                    <th>Class Name</th>
                    <th>Student Count</th>
                    <th>Assigned Teacher</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classes as $class)
                <tr>
                    <td>{{ $class->ClassName }}</td>
                    <td>{{ $class->student_count }}</td>
                    <td>{{ $class->teacher ? $class->teacher->Name : 'Not Available' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No data available.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
