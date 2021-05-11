<?php

namespace Comparative\Project\Domain;

use Comparative\Shared\Domain\Uuid\Uuid;

interface ProjectRepository
{
    public function save(Project $project): void;

    public function findById(Uuid $id): ?Project;
}
