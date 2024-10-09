<?php

// app/Models/Report.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $primaryKey = 'ReportID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [ 
        'StudentID',
        'TeacherID',
        'FromDate',
        'ToDate',
        'Grades',
        'Comments',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'TeacherID');
    }
}
