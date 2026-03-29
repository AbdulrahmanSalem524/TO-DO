<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Task;

class TaskRepository implements RepositoryInterface
{
    public function create(array $data)
    {
        return Task::create($data);
    }
    public function getAll()
    {
        return Task::with(['tags', 'comments'])->paginate(10);
    }

    public function getById(int $id)
    {
        return Task::with(['tags', 'comments'])->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete(int $id)
    {
        $task = Task::findOrFail($id);
        return $task->delete();
    }
}
