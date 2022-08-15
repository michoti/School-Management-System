<?php 

namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentRepository 
{
    public function create(array $attributes)
    {
        return DB::transaction(function() use($attributes)
        {
            $created_student = Student::query()->create([
                'first_name' => data_get($attributes, 'first_name'),
                'second_name' => data_get($attributes, 'second_name'),
                'gender' => data_get($attributes, 'gender'),
            ]);

            throw_if(!$created_student, GeneralJsonException::class, 'Student account creation error', 422);
            
            return $created_student;
        });
    }
}