<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(StoreTaskRequest $request, TaskService $taskService)
    {
//        return response()->json( $taskService->createTask($request->validated()) );

        $task = $taskService->createTask($request->validated());

        return new TaskResource($task);
    }
    public function index(TaskService $taskService)
    {
//        return response()->json($taskService->getAllTasks());
        return TaskResource::collection($taskService->getAllTasks());
    }

    public function show($id, TaskService $taskService)
    {
//        return response()->json($taskService->getTask($id));
        return new TaskResource($taskService->getTask($id));
    }

    public function update($id, UpdateTaskRequest $request, TaskService $taskService)
    {
//        return response()->json( $taskService->updateTask($id, $request->all()) );

        $task = $taskService->updateTask($id, $request->validated());

        return new TaskResource($task);
    }

    public function destroy($id, TaskService $taskService)
    {
        $taskService->deleteTask($id);
        return response()->json(['message' => 'Deleted']);
    }
}
