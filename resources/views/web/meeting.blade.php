<!-- resources/views/meeting-page.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Join Google Meet</h2>
        @if($meetingUrl)
            <iframe src="{{ $meetingUrl }}" width="100%" height="600px" allow="camera; microphone; fullscreen" style="border:0;"></iframe>
        @else
            <p>No meeting available</p>
        @endif
    </div>
@endsection
