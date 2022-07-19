<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'grade',
        'teacher_id',
    ];

    public function students()
    {
       return $this->belongsToMany(Student::class, 'classroom_student', 'classroom_id');
    }
}
