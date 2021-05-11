<?php

declare(strict_types=1);

namespace Comparative\Category\Domain\Property;

class ActiveByDefault
{
    private bool $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function getValue(): bool
    {
        return $this->value;
    }
}
