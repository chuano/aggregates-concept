<?php

namespace Comparative\Shared\Domain\Uuid;

interface UuidProvider
{
    public function random(): Uuid;
}
