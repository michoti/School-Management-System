<?php 

namespace App\Repositories;

use App\Events\Teachers\TeacherCreatedEvent;
use App\Events\Teachers\TeacherDeletedEvent;
use App\Events\Teachers\TeacherUpdatedEvent;
use App\Exceptions\GeneralJsonException;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class TeacherRepository 
{
    public function create(array $attributes)
    {
        return DB::transaction(function()use($attributes){
            $created_teacher = Teacher::query()->create([
                'first_name' => data_get($attributes, 'first_name'),
                'second_name' => data_get($attributes, 'second_name'),
                'teacher_email' => data_get($attributes, 'teacher_email'),
                'gender' => data_get($attributes, 'gender'),
           ]);

           throw_if(!$created_teacher, GeneralJsonException::class, 'Teacher account creation unsuccessful',422);

           event(new TeacherCreatedEvent());

           return $created_teacher;
        });
        
    }

    public function update($teacher,array $attributes)
    {
         return DB::transaction(function()use($teacher, $attributes){
            $updated_teacher = $teacher->update([
                'first_name' => data_get($attributes,'first_name'),
                'second_name' => data_get($attributes,'second_name'),
                'teacher_email' => data_get($attributes,'teacher_email'),
                'gender' => data_get($attributes,'gender')
            ]);

            throw_if(!$updated_teacher, GeneralJsonException::class, 'Teacher update unsuccessful!',422);

            event(new TeacherUpdatedEvent());
            
            return $teacher;
        });
        
    }

    public function delete($teacher)
    {
        return DB::transaction(function() use($teacher) {
            $deleted = $teacher->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Teacher deleted unsuccessful!', 422);

            event(new TeacherDeletedEvent());

            return $deleted;
        });        
    }
}