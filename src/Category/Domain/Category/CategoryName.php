<?php

declare(strict_types=1);

namespace Comparative\Category\Domain\Category;

class CategoryName
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}