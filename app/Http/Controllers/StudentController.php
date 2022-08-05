<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;

        $students = Student::query()->paginate($pageSize);

        return StudentResource::collection($students);


    }
}
