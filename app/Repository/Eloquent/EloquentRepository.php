<?php

namespace App\Repository\Eloquent;

use App\Repository\Criteria;
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
        $this->model->fill((array)$entity);
        return $this->model->save();
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

    public function matching(Criteria $criteria): array
    {
        $builder = $this->model;

        $conditions = $criteria->getConditions();
        foreach ($conditions as $condition) {
            [ $method, $params ] = $this->translateQuery($condition);
            $builder = $builder->$method(...$params);
        }

        return (array)$builder->get()
                              ->getIterator()
                ;
    }

    /**
     * Not the best implementantion, only a simple example.
     */
    public function translateQuery(array $condition)
    {
        [$filter, $field, $value] = $condition;

        return match($filter) {
            'equal', 'equals' => [ 'where', [ $field, '=', $value ] ],
            'greater'         => [ 'where', [ $field, '>', $value ] ],
            'greaterEqual'    => [ 'where', [ $field, '>=', $value ] ],
            'lower'           => [ 'where', [ $field, '<', $value ] ],
            'lowerEqual'      => [ 'where', [ $field, '<=', $value ] ],
            'orderBy'         => [ 'orderBy', [ $field, $value === '' ? 'ASC' : 'DESC' ] ],
            'limit'           => [ 'take', [ $value ] ],
            'offset'          => [ 'skip', [ $value ] ],
        };
    }
}
