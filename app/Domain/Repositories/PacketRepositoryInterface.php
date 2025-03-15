<?php

namespace App\Domain\Repositories;

use App\Models\Packet\Packet;

interface PacketRepositoryInterface
{
    public function findById(string $id): ?Packet;
}
