<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance'; // تأكد من أن اسم الجدول صحيح
    protected $fillable = ['Date', 'Status', 'StudentID'];

  
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID');
    }
}

