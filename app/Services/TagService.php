<?php

namespace App\Services;

use App\Repositories\TagRepository;
use App\Models\Tag;

class TagService
{
    private TagRepository $tagRepo;

    public function __construct(TagRepository $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    public function getAllTags()
    {
        return $this->tagRepo->getAll();
    }

    public function createTag(array $data)
    {
        return $this->tagRepo->create($data);
    }
    public function getOrCreate(array $tags)
    {
        return collect($tags)->map(function ($tag) {

            if (is_numeric($tag)) {
                return $tag;
            }
            $existing = $this->tagRepo->findByName($tag);

            if ($existing) {
                return $existing->id;
            }

            return $this->tagRepo->create([
                'name' => $tag
            ])->id;

        })->toArray();
    }
}
