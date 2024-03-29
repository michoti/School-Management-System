<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'teacher_email',
        'gender',
    ];

    public function Classroom()
    {
        return $this->hasOne(Classroom::class);
    }
}
