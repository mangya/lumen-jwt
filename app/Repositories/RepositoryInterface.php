<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function create(array $attributes): Model;

    public function update(array $attributes, int $id): Model;

    public function delete(int $id): bool;
}
