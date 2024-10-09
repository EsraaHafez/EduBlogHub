<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->title }}</title>
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
</head>

<body>
    <div class="container">
        <h1>{{ $lesson->title }}</h1>
        <p>Description: {{ $lesson->description }}</p>
        <p>Date: {{ $lesson->date }}</p>
        <p>Meeting Link: <a href="{{ $lesson->meeting_link }}" target="_blank">{{ $lesson->meeting_link }}</a></p>
    </div>
</body>

</html>
