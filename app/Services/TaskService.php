<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\DB;

class TaskService
{
    private TaskRepository $taskRepo;
    private TagService $tagService;

    public function __construct(TaskRepository $taskRepo, TagService $tagService) {
        $this->taskRepo = $taskRepo;
        $this->tagService = $tagService;
    }

    public function createTask(array $data)
    {
        return DB::transaction(function () use ($data) {

            $task = $this->taskRepo->create($data);

            if (isset($data['tags'])) {
                $tagIds = $this->tagService->getOrCreate($data['tags']);
                $task->tags()->sync($tagIds);
            }

            if (isset($data['comment']) && $data['comment'] !== '') {
                $task->comments()->create([
                    'body' => $data['comment']
                ]);
            }

            return $task->load(['tags', 'comments']);
        });
    }

    public function getAllTasks()
    {
        return $this->taskRepo->getAll();
    }

    public function getTask($id)
    {
        return $this->taskRepo->getById($id);
    }

    public function updateTask($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {

            $task = $this->taskRepo->update($id, $data);

            if (array_key_exists('tags', $data)) {
                $tagIds = $this->tagService->getOrCreate($data['tags']);
                $task->tags()->sync($tagIds);
            }

            if (isset($data['comment']) && $data['comment'] !== '') {
                $task->comments()->create([
                    'body' => $data['comment']
                ]);
            }

            return $task->load(['tags', 'comments']);
        });
    }

    public function deleteTask($id)
    {
        DB::transaction(function () use ($id) {
            $task = $this->taskRepo->getById($id);
            $task->tags()->detach();
            $task->comments()->delete();

            $this->taskRepo->delete($id);

        });
    }
}
