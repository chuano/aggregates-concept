<?php

declare(strict_types=1);

namespace Comparative\Category\Application\Category\Create;

use Comparative\Category\Application\Category\CategoryDTO;
use Comparative\Category\Domain\Category\Category;
use Comparative\Category\Domain\Category\CategoryName;
use Comparative\Category\Domain\Category\CategoryRepository;
use Comparative\Shared\Domain\Uuid\Uuid;

class CreateCategoryHandler
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(CreateCategoryCommand $command): CategoryDTO
    {
        $category = new Category(new Uuid($command->getId()), new CategoryName($command->getName()));
        $this->categoryRepository->save($category);

        return CategoryDTO::fromEntity($category);
    }
}
