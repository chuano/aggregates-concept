<?php

declare(strict_types=1);

namespace App\Tests\Category\Application\Category\Create;

use Comparative\Category\Application\Category\Create\CreateCategoryCommand;
use Comparative\Category\Application\Category\Create\CreateCategoryHandler;
use Comparative\Category\Application\Property\Create\CreatePropertyCommand;
use Comparative\Category\Application\Property\Create\CreatePropertyHandler;
use Comparative\Category\Domain\Category\Category;
use Comparative\Category\Domain\Category\CategoryName;
use Comparative\Category\Domain\Category\CategoryRepository;
use Comparative\Category\Infrastructure\Category\CategoryInMemoryRepository;
use Comparative\Shared\Domain\Uuid\Uuid;
use Comparative\Shared\Domain\Uuid\UuidProvider;
use Comparative\Shared\Infrastructure\Uuid\UuidProviderImpl;
use PHPUnit\Framework\TestCase;

class CrateCategoryHandlerTest extends TestCase
{
    private UuidProvider $uuidProvider;
    private CategoryRepository $categoryRepository;

    public function setUp(): void
    {
        $this->uuidProvider = new UuidProviderImpl();
        $this->categoryRepository = new CategoryInMemoryRepository();
    }

    /**
     * @test
     */
    public function should_create_a_category_given_valid_data(): void
    {
        $id = $this->uuidProvider->random()->getValue();
        $name = 'Category test';
        $command = new CreateCategoryCommand($id, $name);
        $handler = new CreateCategoryHandler($this->categoryRepository);
        $result = $handler($command);

        $this->assertEquals($id, $result->getId());
        $this->assertEquals($name, $result->getName());
        $this->assertCount(0, $result->getProperties());
    }


}
