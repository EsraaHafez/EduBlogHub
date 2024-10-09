<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classstudents extends Model
{
    use HasFactory;

    protected $table = 'class';
    protected $primaryKey = 'ClassID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'ClassName',
        'TeacherID',
        'student_count',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'TeacherID');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'ClassID');
    }
}
