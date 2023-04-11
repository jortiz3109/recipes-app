<?php

namespace Tests\DataProviders;

use App\Contracts\EntityServiceContract;
use App\Services\ApiUserService;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiUserServiceTest extends TestCase
{
    private EntityServiceContract $userService;

    public function testItCanListUsers(): void
    {
        $users = $this->userService->index();

        $this->assertInstanceOf(Paginator::class, $users);
        $this->assertSame($this->user->name, $users->first()->name());
    }

    public function testItCanStoreUsers(): void
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => 'test',
        ];

        $user = $this->userService->store($data);

        $this->assertSame($data['name'], $user->name());
        $this->assertSame($data['email'], $user->email());
    }

    public function testItCanGetAUser(): void
    {
        $user = $this->userService->get(1);

        $this->assertSame($this->user->name, $user->name());
        $this->assertSame($this->user->email, $user->email());
    }

    public function testItCanUpdateAUser(): void
    {
        $data = [
            'name' => fake()->name(),
            'email' => fake()->email(),
        ];

        $user = $this->userService->update(2, $data);

        $this->assertSame($data['name'], $user->name());
        $this->assertSame($data['email'], $user->email());
    }

    public function testItCanDeleteAUser():void
    {
        $response = $this->userService->delete(3);

        $this->assertTrue($response);
    }

    public function testItInterceptsNotFoundException(): void
    {
        $this->expectException(NotFoundHttpException::class);
        $this->userService->get(5);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = (object)['name' => fake()->name(), 'email' => fake()->safeEmail()];

        Http::preventStrayRequests();
        Http::fake([
            'api.test/users?_page=*&_limit=*' => Http::response(
                body: [
                    ['id' => 1, 'name' => $this->user->name, 'email' => $this->user->email]
                ],
                headers: ['X-Total-Count' => 1]),
            'api.test/users/1' =>  Http::response(
                body: ['id' => 1, 'name' => $this->user->name, 'email' => $this->user->email]
            ),
            'api.test/users/2' => Http::response(status: Response::HTTP_OK),
            'api.test/users/3' => Http::response(status: Response::HTTP_OK),
            'api.test/users/5' => Http::response(status: Response::HTTP_NOT_FOUND),
            'api.test/users' =>  Http::response(status: Response::HTTP_CREATED)
        ]);

        $this->userService = new ApiUserService();
    }
}
