<?php 

namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class ClassRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function() use($attributes)
        {
            $created_class = ClassRoom::query()->create([
                'section' => data_get($attributes, 'section' ),
                'grade' => data_get($attributes, 'grade'),
                'teacher_id' => data_get($attributes, 'teacher_id'),
            ]);

            throw_if(!$created_class, GeneralJsonException::class, 'Class creation error', 422);
            
            return $created_class;
        });
    }

    public function update($student, array $attributes)
    {
        return DB::transaction(function()use($student, $attributes){
            $updated_student = $student->update([
                'first_name' => data_get($attributes,'first_name'),
                'second_name' => data_get($attributes,'second_name'),
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