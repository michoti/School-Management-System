<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $students = Student::all();
        
        // Classroom::all()->each(function($classroom) use($students) {
        //     $classroom->students()->attach($students->random(rand(1, 9))->pluck('id')->toArray());
        // });

        foreach(Student::all() as $student)
        {
            $classroom = Classroom::inRandomOrder()->take(rand(1,8))->pluck('id')->toArray();
            $student->classroom()->attach($classroom);
        }

        
    }
}
