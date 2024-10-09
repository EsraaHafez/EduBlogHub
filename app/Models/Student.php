<?php

// app/Models/Student.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'StudentID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'Name',
        'Age',
        'division_id',
        'ClassID',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function class()
    {
        return $this->belongsTo(Classstudents::class, 'ClassID');
    }

    public function reports()
{
    return $this->hasMany(Report::class, 'StudentID'); // تأكد من اسم العمود
}

}
 