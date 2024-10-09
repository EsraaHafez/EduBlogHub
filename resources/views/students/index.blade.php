<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Improve table design */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            display: none; /* Hide the table initially */
        }

        th, td {
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

        /* Improve button design */
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

        /* Improve search design */
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
            padding-right: 40px; /* Add space on the right to avoid overlap with icon */
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
            font-size: 14px; /* Make the icon smaller */
        }

        /* Back to home button */
        .btn-home {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            background-color: rgb(146, 137, 5);
            color: white;
            display: inline-block;
        }

        .btn-home:hover {
            background-color: rgb(146, 137, 75);
        }

        /* Improve container design */
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: linear-gradient(135deg, rgb(146, 137, 5), #e6e9ef); /* Calm and attractive gradient */
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

        /* Center the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Make the page cover full screen height */
            margin: 0;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Students</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search form -->
        <div class="search-container">
            <form action="{{ route('studentsearch') }}" method="GET">
                <input type="text" name="search" placeholder="Enter full name" required>
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Message when no students found -->
        @if(isset($noStudents) && $noStudents)
            <p class="alert">No students found with that name</p>
        @endif

        @if(isset($students) && $students->count() > 0)
            <table style="display: table;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Class</th>
                        <th>Division</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->Name }}</td>
                            <td>{{ $student->Age }}</td>
                            <td>{{ $student->class->ClassName ?? 'Not specified' }}</td>
                            <td>{{ $student->division->division_name ?? 'Not specified' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Back to home button -->
        <a href="{{ asset('index') }}" class="btn-home">Back to Home</a>
    </div>
</body>
</html>
