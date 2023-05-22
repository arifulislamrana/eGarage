<?php
namespace App\Repository\BaseRepository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IBaseRepository
{
    public function update($id, $attributes);
    public function save($attributes);
    public function destroy($id): bool;
    public function find($id): Model;
    public function firstOrCreate($attributes): Model;
    public function where(...$where): Builder;
    public function with(...$with): Builder;
    public function validate($attributes);
    public function getAll(): Collection;
    public function create(array $data);
}
