<?php

declare(strict_types=1);

namespace Comparative\Category\Application\Property\Create;

use Comparative\Category\Application\Category\CategoryDTO;
use Comparative\Category\Application\Property\PropertyDTO;
use Comparative\Category\Domain\Category\CategoryRepository;
use Comparative\Category\Domain\Property\ActiveByDefault;
use Comparative\Category\Domain\Property\PropertyName;
use Comparative\Shared\Domain\Uuid\Uuid;

class CreatePropertyHandler
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(CreatePropertyCommand $command): CategoryDTO
    {
        $category = $this->categoryRepository->findById(new Uuid($command->getCategoryId()));
        $category->addProperty(
            new Uuid($command->getId()),
            new PropertyName($command->getName()),
            new ActiveByDefault($command->isActiveByDefault())
        );
        $this->categoryRepository->save($category);

        return CategoryDTO::fromEntity($category);
    }
}
