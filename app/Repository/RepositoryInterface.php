<?php
namespace App\Repository;

interface RepositoryInterface
{
    public function setCollection(string $collection): void;
    public function getById(string | int $id): object;
    public function all(): array;
    public function save(object $entity): bool;
}