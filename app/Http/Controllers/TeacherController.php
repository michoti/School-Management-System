<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherUpdateRequest;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(Request $request,TeacherRepository $repository)
    {
        $payload = $request->only(['first_name','second_name','gender']);
        $validator = Validator::make($payload,[
            'first_name' => 'required|max:100|min:2|string',
            'second_name' => 'required|max:100|min:2|string',
            'gender' => 'required|string',
        ]);
        $validator->validate();
        $created_teacher = $repository->create($payload);
        return new TeacherResource($created_teacher);        
    }

    public function update(TeacherUpdateRequest $request,Teacher $teacher,TeacherRepository $repository)
    {
        $repository->update($teacher,$request->only(['first_name','second_name','gender']));
        
        return new TeacherResource($teacher);
    }

    public function destroy(Teacher $teacher, TeacherRepository $repository)
    {
        $repository->delete($teacher);

        return new JsonResponse([
            'data' => 'delete successful'
        ]);
    }

}
