<?php 

namespace App\Repositories;

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
                'gender' => data_get($attributes, 'gender'),
           ]);

           throw_if(!$created_teacher, GeneralJsonException::class, 'Teacher account creation unsuccessful',422);

           return $created_teacher;
        });
        
    }

    public function update($teacher,array $attributes)
    {
         return DB::transaction(function()use($teacher, $attributes){
            $updated_teacher = $teacher->update([
                'first_name' => data_get($attributes,'first_name'),
                'second_name' => data_get($attributes,'second_name'),
                'gender' => data_get($attributes,'gender')
            ]);

            throw_if(!$updated_teacher, GeneralJsonException::class, 'Teacher update unsuccessful!',422);
            
            return $teacher;
        });
        
    }

    public function delete($teacher)
    {
        DB::transaction(function() use($teacher) {
            $deleted = $teacher->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'Teacher deleted unsuccessful!', 422);

            return $deleted;
        });        
    }
}