<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();

        Exam::all()->each(function ($exams) use($students){
            $exams->students()->attach($students->random(rand(1, 9))->pluck('id')->toArray());
        });
    }
}
