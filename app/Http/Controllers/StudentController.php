<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentUpdateRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Repositories\StudentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;

        $students = Student::query()->paginate($pageSize);

        return StudentResource::collection($students);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function store(Request $request, StudentRepository $repository)
    {
        $payload = $request->only(['first_name','second_name','gender']);

        $validator = Validator::make($payload, [
            'first_name' => 'required|max:100|min:2|string',
            'second_name' => 'required|max:100|min:2|string',
            'gender' => 'required|string',
        ]);

        $validator->validate();

        $created = $repository->create($payload);

        return new StudentResource($created);
        
    }

    public function update(StudentUpdateRequest $request,Student $student, StudentRepository $repository)
    {
        $repository->update($student,$request->only(['first_name','second_name','gender']));

        return new StudentResource($student);        
    }

    public function destroy(Student $student, StudentRepository $repository)
    {
        $repository->delete($student);

        return new JsonResponse([
            'data' => 'delete successful'
        ]);
    }

}
