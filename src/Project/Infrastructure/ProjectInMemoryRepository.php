<?php

declare(strict_types=1);

namespace Comparative\Project\Infrastructure;

use Comparative\Project\Domain\Project;
use Comparative\Shared\Domain\Uuid\Uuid;

class ProjectInMemoryRepository
{
    /**
     * @var Project[]
     */
    private array $projects = [];

    public function save(Project $project): void
    {
        $this->projects[] = $project;
    }

    public function findById(Uuid $id): ?Project
    {
        foreach ($this->projects as $project) {
            if ($project->getId()->equals($id)) {
                return $project;
            }
        }
        return null;
    }
}
