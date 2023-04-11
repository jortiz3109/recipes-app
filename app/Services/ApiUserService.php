<?php

namespace App\Services;

use App\Contracts\EntityServiceContract;
use App\Entities\BaseEntity;
use App\Entities\UserEntity;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Throwable;

readonly class ApiUserService implements EntityServiceContract
{
    private PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::baseUrl(config('data-providers.providers.api.baseUrl'))
            ->throw(function (Response $response, RequestException $requestException) {
                match ($requestException->getCode()) {
                    SymfonyResponse::HTTP_NOT_FOUND => abort(SymfonyResponse::HTTP_NOT_FOUND, 'Resource not found'),
                    default => $requestException,
                };
            });
    }

    public function index(string $search = null): AbstractPaginator
    {
        $response = $this->client->get(
            url: 'users',
            query: [
                '_page' => Paginator::resolveCurrentPage(),
                '_limit' => request('perPage', 15)
            ]
        );

        $users = $response->collect()->mapInto(UserEntity::class);

        return new LengthAwarePaginator(
            items: $users,
            total: $response->header('X-Total-Count'),
            perPage: request('perPage', 15),
            currentPage: Paginator::resolveCurrentPage(),
            options: ['path' => Paginator::resolveCurrentPath()]
        );
    }

    /**
     * @throws Throwable
     */
    public function get(string $id): BaseEntity
    {
        $response = $this->client->get("/users/{$id}");

        return new UserEntity($response->json());
    }

    public function store(array $properties): BaseEntity
    {
        $properties['password'] = Hash::make($properties['password']);
        $this->client->post('users', $properties);

        return new UserEntity($properties);
    }

    public function update(string $id, array $properties): BaseEntity
    {
        $this->client->put("users/{$id}", $properties);

        return new UserEntity(['id' => $id] + $properties);
    }

    public function delete(string $id): bool
    {
        $response = $this->client->delete("users/{$id}");

        return $response->ok();
    }
}
