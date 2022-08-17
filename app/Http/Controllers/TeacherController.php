<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $pagesize = $request->page_size ?? 20;

        $teachers = Teacher::query()->paginate($pagesize);

        return TeacherResource::collection($teachers);
    }

    public function show(Teacher $teacher)
    {
        return new TeacherResource($teacher);
    }

}
