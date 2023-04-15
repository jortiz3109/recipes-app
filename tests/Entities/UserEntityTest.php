<?php

namespace Tests\Entities;

use App\Entities\UserEntity;
use App\Models\User;
use Tests\TestCase;

class UserEntityTest extends TestCase
{
    public static function propertyNamesProvider(): array
    {
        return [
            ['id'],
            ['name'],
            ['email'],
            ['password'],
        ];
    }

    public function testItCanBeCreated(): void
    {
        $properties = ['name' => fake()->name(), 'email' => fake()->email()];
        $user = new UserEntity($properties);
        $this->assertEqualsCanonicalizing($properties, $user->toArray());
    }

    public function testItCanBeCreatedFromAUserModel(): void
    {
        $user = User::factory()->create();
        $entity = UserEntity::createFromModel($user->setVisible(['password']));

        $this->assertEqualsCanonicalizing(
            expected: $user->toArray(),
            actual: $entity->toArray()
        );

    }

    /**
     * @dataProvider propertyNamesProvider
     */
    public function testItCanAccessToProperties(string $property): void
    {
        $properties = [
            'id' => 1,
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => fake()->password(),
        ];

        $user = new UserEntity($properties);

        $this->assertSame($properties[$property], $user->{$property}());
    }
}
