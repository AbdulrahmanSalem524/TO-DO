<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\TagResource;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(TagService $tagService)
    {
        return TagResource::collection(
            $tagService->getAllTags()
        );
    }

    public function store(StoreTagRequest $request, TagService $tagService)
    {
        $tag = $tagService->createTag($request->validated());

        return new TagResource($tag);
    }
}
