<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Tag;

class TagRepository implements RepositoryInterface
{
    public function create(array $data)
    {
        return Tag::create($data);
    }

    public function getAll()
    {
        return Tag::all();
    }

    public function getById(int $id)
    {
        return Tag::findOrFail($id);
    }

    public function findByName(string $name)
    {
        return Tag::where('name', $name)->first();
    }
}
