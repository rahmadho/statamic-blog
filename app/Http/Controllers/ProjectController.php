<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    function index(Request $request) {
        return ProjectResource::collection(Project::with(['user', 'tasks'])->paginate(5));
    }
    function show(Project $project) {
        return new ProjectResource($project->loadMissing(['user', 'tasks']));
    }
    function store(Request $request) {
        $validator = \Validator::make($request->all(), [
            'user_id' => 'required',
            'title' => 'required',
            'deadline' => 'required|date',
        ], [], [
            'user_id' => 'ID user'
        ]);

        if ($validator->fails()) {
            return $this->responseUnvalidated($validator->errors());
        }

        try {
            return $this->responseSuccess(Project::create($validator->validate()));
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }
    function update(Request $request, int $project) {
        $validator = \Validator::make($request->all(), [
            'title' => ['required', Rule::unique('projects', 'title')->ignore($project)],
            'deadline' => 'required|date'
        ]);

        if ($validator->fails()) {
            return $this->responseUnvalidated($validator->errors());
        }

        try {
            $project = Project::findOrFail($project);
            $project->update($validator->validate());
            return $this->responseSuccess($project);
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }
    function delete(Request $request, int $project) {
        try {
            $project = Project::findOrFail($project);
            $project->delete();
            return $this->responseSuccess(true);
        } catch (\Throwable $th) {
            return $this->responseError($th->getMessage());
        }
    }
}
