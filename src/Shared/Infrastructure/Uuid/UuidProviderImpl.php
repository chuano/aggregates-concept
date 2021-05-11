<?php

declare(strict_types=1);

namespace Comparative\Shared\Infrastructure\Uuid;

use Comparative\Shared\Domain\Uuid\Uuid;
use Comparative\Shared\Domain\Uuid\UuidProvider;

class UuidProviderImpl implements UuidProvider
{
    public function random(): Uuid
    {
        return new Uuid(\Ramsey\Uuid\Uuid::uuid4()->toString());
    }
}
