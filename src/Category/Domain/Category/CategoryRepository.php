<?php

namespace Comparative\Category\Domain\Category;

use Comparative\Shared\Domain\Uuid\Uuid;

interface CategoryRepository
{
    public function save(Category $category): void;

    public function findById(Uuid $id): ?Category;
}
