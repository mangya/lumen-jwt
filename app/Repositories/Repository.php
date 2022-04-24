<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Repository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
    * Repository constructor.
    *
    * @param Model $model
    */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param  array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param  array  $attributes
     * @param  int    $id
     * @return Model
     */
    public function update(array $attributes, int $id): Model
    {
        $this->findOneOrFail($id)->update($attributes);

        return $this->findOneOrFail($id);
    }

    /**
     * @param int $id
     * @throws ModelNotFoundException
     */
    public function delete(int $id): bool
    {
        return $this->findOneOrFail($id)->delete();
    }

    /**
     * @param  array  $attributes
     * @param  array  $updates
     */
    public function updateBy(array $attributes, array $updates)
    {
        return $this->model
            ->where($attributes)
            ->update($updates);
    }

    /**
     * @param  array  $attributes
     */
    public function deleteBy(array $attributes)
    {
        return $this->model
            ->where($attributes)
            ->delete();
    }
}
