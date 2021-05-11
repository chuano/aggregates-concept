<?php

declare(strict_types=1);

namespace App\Tests\Category\Application\Property\Create;

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

class CreatePropertyHandlerTest extends TestCase
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
    public function should_add_property_to_category_given_valid_data(): void
    {
        $categoryId = $this->uuidProvider->random()->getValue();
        $this->categoryRepository->save(new Category(new Uuid($categoryId), new CategoryName('Category Test')));

        $propertyId = $this->uuidProvider->random()->getValue();
        $name = 'New Property';
        $command = new CreatePropertyCommand($categoryId, $propertyId, $name, true);
        $handler = new CreatePropertyHandler($this->categoryRepository);
        $result = $handler($command);

        $this->assertCount(1, $result->getProperties());
        $this->assertEquals($propertyId, $result->getProperties()[0]->getId());
        $this->assertEquals($name, $result->getProperties()[0]->getName());
        $this->assertTrue($result->getProperties()[0]->isActiveByDefault());
    }
}
