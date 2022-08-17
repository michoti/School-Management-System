<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassResource;
use App\Models\Classroom;
use App\Repositories\ClassRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;

        $students = Classroom::query()->paginate($pageSize);

        return ClassResource::collection($students);
    }

    public function show(ClassRoom $class)
    {
        return new ClassResource($class);
    }

    public function store(Request $request, ClassRepository $repository)
    {
        $payload = $request->only(['section','grade','teacher_id']);

        $validator = Validator::make($payload, [
            'section' => 'required|max:100|min:2|string',
            'grade' => 'required|max:12|min:1|numeric',
            'teacher_id' => 'required|numeric|min:1',
        ]);

        $validator->validate();

        $created = $repository->create($payload);

        return new ClassResource($created);
        
    }
    
}
