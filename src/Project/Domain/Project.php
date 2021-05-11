<?php

declare(strict_types=1);

namespace Comparative\Project\Domain;

use Comparative\Category\Domain\Category\Category;
use Comparative\Category\Domain\Property\Property;
use Comparative\Shared\Domain\Uuid\Uuid;

class Project
{
    private Uuid $id;
    private ProjectNumber $number;
    private Category $category;
    /**
     * @var Property[]
     */
    private array $properties;

    public function __construct(Uuid $id, ProjectNumber $number, Category $category)
    {
        $this->id = $id;
        $this->number = $number;
        $this->category = $category;
        $this->properties = $this->getActivePropertiesFromCategory($category);
    }

    public function addProperty(Property $property): void
    {
        $this->properties[] = $property;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getNumber(): ProjectNumber
    {
        return $this->number;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    private function getActivePropertiesFromCategory(Category $category): array
    {
        return array_values(
            array_filter(
                $category->getProperties(),
                fn(Property $p) => $p->getActiveByDefault()->getValue() === true
            )
        );
    }
}
