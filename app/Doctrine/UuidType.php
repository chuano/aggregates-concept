<?php

declare(strict_types=1);

namespace App\Doctrine;

use Comparative\Shared\Domain\Uuid\Uuid;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class UuidType extends StringType
{
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Uuid
    {
        return $value ? new Uuid($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value ? $value->getValue() : null;
    }
}
