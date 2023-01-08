<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory(10)->create();   
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin12345'),
            'role_as' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('teacher12345'),
            'role_as' => 'teacher',
            'remember_token' => Str::random(10),
        ]);
    }
}
