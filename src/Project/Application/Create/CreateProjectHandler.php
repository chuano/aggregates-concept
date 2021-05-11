<?php

declare(strict_types=1);

namespace Comparative\Project\Application\Create;

use Comparative\Category\Domain\Category\CategoryRepository;
use Comparative\Project\Application\ProjectDTO;
use Comparative\Project\Domain\Project;
use Comparative\Project\Domain\ProjectNumber;
use Comparative\Project\Domain\ProjectRepository;
use Comparative\Shared\Domain\Uuid\Uuid;

class CreateProjectHandler
{
    private CategoryRepository $categoryRepository;
    private ProjectRepository $projectRepository;

    public function __construct(CategoryRepository $categoryRepository, ProjectRepository $projectRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->projectRepository = $projectRepository;
    }

    public function __invoke(CreateProjectCommand $command): ProjectDTO
    {
        $category = $this->categoryRepository->findById(new Uuid($command->getCategoryId()));
        $project = new Project(
            new Uuid($command->getId()),
            new ProjectNumber($command->getNumber()),
            $category
        );
        $this->projectRepository->save($project);

        return ProjectDTO::fromEntity($project);
    }
}
