<?php

declare(strict_types=1);

namespace Comparative\Category\Infrastructure\Category;

use Comparative\Category\Domain\Category\Category;
use Comparative\Category\Domain\Category\CategoryRepository;
use Comparative\Shared\Domain\Uuid\Uuid;

class CategoryInMemoryRepository implements CategoryRepository
{
    /**
     * @var Category[]
     */
    private array $categories = [];

    public function save(Category $category): void
    {
        $this->categories[] = $category;
    }

    public function findById(Uuid $id): ?Category
    {
        foreach ($this->categories as $category) {
            if ($category->getId()->equals($id)) {
                return $category;
            }
        }
        return null;
    }
}
