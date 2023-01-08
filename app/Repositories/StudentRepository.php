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
                'student_email' => data_get($attributes, 'student_email'),
                'gender' => data_get($attributes, 'gender'),
            ]);

            throw_if(!$created_student, GeneralJsonException::class, 'Student account creation error', 422);
            
            return $created_student;
        });
    }

    public function update($student, array $attributes)
    {
        return DB::transaction(function()use($student, $attributes){
            $updated_student = $student->update([
                'first_name' => data_get($attributes,'first_name'),
                'second_name' => data_get($attributes,'second_name'),
                'student_email' => data_get($attributes,'student_email'),
                'gender' => data_get($attributes,'gender')
            ]);

            throw_if(!$updated_student, GeneralJsonException::class, 'Student update unsuccessful!',422);
            
            return $student;
        });
    }

    public function delete($student)
    {
        DB::transaction(function() use($student) {
            $deleted = $student->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Student deleted unsuccessful!', 422);

            return $deleted;
        });
    }


}