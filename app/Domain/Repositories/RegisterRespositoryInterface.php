<?php

namespace App\Domain\Repositories;

use App\Models\User;

interface RegisterRespositoryInterface
{
    public function create(array $data): User;
}
