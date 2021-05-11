<?php

declare(strict_types=1);

namespace Comparative\Project\Application\Create;

class CreateProjectCommand
{
    private string $id;
    private string $number;
    private string $categoryId;

    public function __construct(string $id, int $number, string $categoryId)
    {
        $this->id = $id;
        $this->number = $number;
        $this->categoryId = $categoryId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getCategoryId(): string
    {
        return $this->categoryId;
    }
}
