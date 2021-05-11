<?php

declare(strict_types=1);

namespace Comparative\Project\Application;

use Comparative\Category\Application\Property\PropertyDTO;
use Comparative\Category\Domain\Property\Property;
use Comparative\Project\Domain\Project;

class ProjectDTO
{
    private string $id;
    private int $number;
    private string $category;
    /**
     * @var PropertyDTO[]
     */
    private array $proerties;

    public function __construct(string $id, int $number, string $category, array $proerties)
    {
        $this->id = $id;
        $this->number = $number;
        $this->category = $category;
        $this->proerties = $proerties;
    }

    public static function fromEntity(Project $project): self
    {
        return new self(
            $project->getId()->getValue(),
            $project->getNumber()->getValue(),
            $project->getCategory()->getName()->getValue(),
            array_map(fn(Property $p) => PropertyDTO::fromEntity($p), $project->getProperties())
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getProerties(): array
    {
        return $this->proerties;
    }
}
