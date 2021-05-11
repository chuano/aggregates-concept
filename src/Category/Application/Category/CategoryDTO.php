<?php

declare(strict_types=1);

namespace Comparative\Category\Application\Category;

use Comparative\Category\Application\Property\PropertyDTO;
use Comparative\Category\Domain\Category\Category;
use Comparative\Category\Domain\Property\Property;

class CategoryDTO
{
    private string $id;
    private string $name;
    /**
     * @var PropertyDTO
     */
    private array $properties;

    public function __construct(string $id, string $name, array $properties)
    {
        $this->id = $id;
        $this->name = $name;
        $this->properties = $properties;
    }

    public static function fromEntity(Category $category): self
    {
        return new self(
            $category->getId()->getValue(),
            $category->getName()->getValue(),
            array_map(fn(Property $p) => PropertyDTO::fromEntity($p), $category->getProperties())
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProperties()
    {
        return $this->properties;
    }
}
