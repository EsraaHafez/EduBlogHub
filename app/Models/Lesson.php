<?php

// app/Models/Lesson.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // إذا كان اسم الجدول مختلفًا، يمكنك تحديده هنا
    protected $table = 'lessons'; // إذا كان اسم الجدول هو 'lessons'

    protected $fillable = [
        'title',
        'description',
        'date',
        'meeting_link',
        'video_link',
        'teacher_id',
    ];

    public function teacher()
{
    return $this->belongsTo(Teacher::class); // تأكد من وجود الـ Model الخاص بالمعلم
}

}
