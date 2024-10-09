<?php

// app/Models/Teacher.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher';
    protected $primaryKey = 'TeacherID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'Name',
        'HireDate',
        'subject_id',
        'department_id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function classes()
    {
        return $this->hasMany(Classstudents::class, 'TeacherID');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'TeacherID');
    }
}
