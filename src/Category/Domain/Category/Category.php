<?php

declare(strict_types=1);

namespace Comparative\Category\Domain\Category;

use Comparative\Category\Domain\Property\ActiveByDefault;
use Comparative\Category\Domain\Property\Property;
use Comparative\Category\Domain\Property\PropertyName;
use Comparative\Shared\Domain\Uuid\Uuid;

class Category
{
    private array $properties;
    private Uuid $id;
    private CategoryName $name;

    public function __construct(Uuid $id, CategoryName $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->properties = [];
    }

    public function addProperty(Uuid $id, PropertyName $name, ActiveByDefault $activeByDefault): void
    {
        $this->properties[] = new Property($id, $name, $activeByDefault);
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): CategoryName
    {
        return $this->name;
    }
}
