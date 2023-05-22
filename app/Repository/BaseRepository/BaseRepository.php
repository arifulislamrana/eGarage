<?php
namespace App\Repository\BaseRepository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements IBaseRepository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function update($id, $attributes)
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function save($attributes): bool
    {
        return $this->model->save($attributes);
    }

    public function destroy($id): bool
    {
        return $this->model->destroy ($id);
    }

    public function find($id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function firstOrCreate($attributes): Model
    {
        return $this->model->firstOrCreate($attributes);
    }

    public function where(...$where): Builder
    {
        return $this->model->where(...$where);
    }


    public function with(...$with): Builder
    {
        return $this->model->with(...$with);
    }


    public function validate($attributes)
    {
        return $this->model->validate($attributes);
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
}
