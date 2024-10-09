<?php

// app/Models/Schedule.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';
    protected $primaryKey = 'ScheduleID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'ClassID',
        'Subject',
        'TeacherID',
        'Time',
        'Duration',
        'Day',
    ];

    public function class()
    {
        return $this->belongsTo(Classstudents::class, 'ClassID');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'TeacherID');
    }
}
