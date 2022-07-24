<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'gender',
    ];

    public function classroom()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_student', 'student_id');
    }

    public function exam()
    {
        return $this->belongsToMany(Exam::class, 'exam_student', 'student_id');
    }
}
