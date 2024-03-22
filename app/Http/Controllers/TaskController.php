<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index(Request $request) {
        return TaskResource::collection(Task::with(['project'])->get());
    }
    function show(Request $request, Task $task) {
        return new TaskResource($task->loadMissing(['user', 'project']));
    }
}
