<?php

namespace App\Domain\Repositories;

interface LoginRepositoryInterface
{
    public function login(string $email, string $password): bool;
}
