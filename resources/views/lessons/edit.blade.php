@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Lesson</h2>

    <!-- عرض الرسائل إن وجدت -->
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <!-- عرض أخطاء التحقق -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- نموذج تعديل الدرس -->
    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Lesson Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $lesson->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Lesson Description</label>
            <textarea name="description" class="form-control" rows="5"
                required>{{ old('description', $lesson->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="date">Lesson Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $lesson->date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Lesson</button>
    </form>

    <!-- زر العودة إلى صفحة الدروس -->
    <br>
    <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Back to Lessons</a>
</div>
@endsection
