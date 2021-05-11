<?php

declare(strict_types=1);

namespace Comparative\Category\Domain\Property;

use Comparative\Shared\Domain\Uuid\Uuid;

class Property
{
    private Uuid $id;
    private PropertyName $name;
    private ActiveByDefault $activeByDefault;

    public function __construct(Uuid $id, PropertyName $name, ActiveByDefault $activeByDefault)
    {
        $this->id = $id;
        $this->name = $name;
        $this->activeByDefault = $activeByDefault;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): PropertyName
    {
        return $this->name;
    }

    public function getActiveByDefault(): ActiveByDefault
    {
        return $this->activeByDefault;
    }
}
