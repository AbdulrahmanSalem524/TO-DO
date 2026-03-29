<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function getById(int $id);
}
