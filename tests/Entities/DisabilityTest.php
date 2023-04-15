<?php

namespace Tests\Entities;

use App\Entities\UserEntity;
use PHPUnit\Framework\TestCase;

class DisabilityTest extends TestCase
{
    /**
     * @dataProvider entitiesProvider
     */
    public function testItCanBeDisabled(string $entityClass): void
    {
        $entity = new $entityClass(['disabled_at' => now()]);

        $this->assertTrue($entity->isDisabled());
    }

    /**
     * @dataProvider entitiesProvider
     */
    public function testItCanBeEnabled(string $entityClass): void
    {
        $entity = new $entityClass();

        $this->assertFalse($entity->isDisabled());
    }

    public static function entitiesProvider(): array
    {
        return [
            'UserEntity' => [UserEntity::class],
        ];
    }
}
