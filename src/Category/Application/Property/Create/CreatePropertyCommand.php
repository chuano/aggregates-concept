<?php

declare(strict_types=1);

namespace Comparative\Category\Application\Property\Create;

class CreatePropertyCommand
{
    private string $categoryId;
    private string $id;
    private string $name;
    private bool $activeByDefault;

    public function __construct(string $categoryId, string $id, string $name, bool $activeByDefault)
    {
        $this->categoryId = $categoryId;
        $this->id = $id;
        $this->name = $name;
        $this->activeByDefault = $activeByDefault;
    }

    public function getCategoryId(): string
    {
        return $this->categoryId;
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
