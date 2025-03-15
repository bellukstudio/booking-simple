<?php


namespace App\Infrastructure\Repository;

use App\Domain\Repositories\RegisterRespositoryInterface;
use App\Models\User;

class RegisterRepositoryImpl implements RegisterRespositoryInterface
{

    public function create(array $data): User
    {
        return User::create($data);
    }
}
