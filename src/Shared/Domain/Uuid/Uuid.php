<?php

declare(strict_types=1);

namespace Comparative\Shared\Domain\Uuid;

class Uuid
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

    public function equals(Uuid $uuid): bool
    {
        return $this->value === $uuid->getValue();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
