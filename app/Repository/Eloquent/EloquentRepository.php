<?php

namespace App\Repository\Eloquent;

use App\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements RepositoryInterface
{
    protected Model $model;
    
    public function setCollection(string $name): void
    {
        $this->model = new $name();
    }

    public function save(object $entity): bool
    {
        return $this->model->save((array)$entity);
    }

    public function all(): array
    {
        return (array)$this->model
                        ->all()
                        ->getIterator()
               ;
    }

    public function getById(string | int $id): object
    {
        return (object)$this->model
                    ->find($id)
                    ->toArray()
                ;
    }
}
