@extends('layouts.app')

@section('content')
    <h1>Create New Lesson</h1>

    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <div>
            <label for="date">Date and Time</label>
            <input type="datetime-local" name="date" id="date" required>
        </div>

        <div>
            <label for="meeting_link">Google Meet Link (Optional)</label>
            <input type="url" name="meeting_link" id="meeting_link">
        </div>

        <div>
            <label for="video_link">Video Link (Optional)</label>
            <input type="url" name="video_link" id="video_link">
        </div>

        <button type="submit">Create Lesson</button>
    </form>
@endsection
