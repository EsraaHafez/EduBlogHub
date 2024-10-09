<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Reports</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    /* تحسين تصميم الجدول */
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
        margin-top: 20px;
    }

    .btn-home:hover {
        background-color: rgb(146, 137, 75);
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Student Reports</h1>

        <!-- نموذج البحث -->
<!-- نموذج البحث -->
<div class="search-container">
    <form action="{{ route('student-reports.search') }}" method="GET">
        <input type="text" name="full_name" placeholder="Enter Full Name (First Middle Last)" required>
        <button type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>


        <!-- رسالة عند عدم وجود بيانات تقارير -->
        @if(isset($noReports) && $noReports)
        <p class="alert">No report data found for this Student Name</p>
        @endif

        <!-- جدول التقارير -->
        @if($reports->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Grades</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                @if($report->student)
                <tr>
                    <td>{{ $report->student->Name }}</td>
                    <td>{{ $report->FromDate }}</td>
                    <td>{{ $report->ToDate }}</td>
                    <td>{{ $report->Grades }}</td>
                    <td>{{ $report->Comments }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        @else
        <p>No reports available.</p>
        @endif

        <!-- زر العودة إلى الصفحة الرئيسية -->
        <a href="{{ route('home') }}" class="btn-home">Back to Home</a>
    </div>
</body>

</html>