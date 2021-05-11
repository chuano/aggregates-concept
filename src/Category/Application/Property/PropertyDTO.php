<?php

declare(strict_types=1);

namespace Comparative\Category\Application\Property;

use Comparative\Category\Domain\Property\Property;

class PropertyDTO
{
    private string $id;
    private string $name;
    private bool $activeByDefault;

    public function __construct(string $id, string $name, bool $activeByDefault)
    {
        $this->id = $id;
        $this->name = $name;
        $this->activeByDefault = $activeByDefault;
    }

    public static function fromEntity(Property $property): self
    {
        return new self(
            $property->getId()->getValue(),
            $property->getName()->getValue(),
            $property->getActiveByDefault()->getValue()
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

    public function isActiveByDefault(): bool
    {
        return $this->activeByDefault;
    }
}
