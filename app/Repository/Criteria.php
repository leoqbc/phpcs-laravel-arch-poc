<?php

namespace App\Repository;

class Criteria
{
    protected array $conditions;

    public function getConditions(): array
    {
        return $this->conditions;
    }

    public function equal(string $field, string $value)
    {
        $this->conditions[] = [ 'equal', $field, $value ];
    }

    public function greater(string $field, string $value)
    {
        $this->conditions[] = [ 'greater', $field, $value ];
    }

    public function lower(string $field, string $value)
    {
        $this->conditions[] = [ 'lower', $field, $value ];
    }

    public function greaterEqual(string $field, string $value)
    {
        $this->conditions[] = [ 'greaterEqual', $field, $value ];
    }

    public function lowerEqual(string $field, string $value)
    {
        $this->conditions[] = [ 'lowerEqual', $field, $value ];
    }

    public function orderBy(string $field, string $mode = '')
    {
        $this->conditions[] = [ 'orderBy', $field, $mode ];
    }

    public function limit(int $limit)
    {
        $this->conditions[] = [ 'limit', null, $limit ];
    }

    public function offset(int $offset)
    {
        $this->conditions[] = [ 'offset', null, $offset ];
    }
}
