<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repositories\PacketRepositoryInterface;
use App\Models\Packet\Packet;

class EloquentPacketRepository implements PacketRepositoryInterface
{
    public function findById(string $id): ?Packet
    {
        return Packet::find($id);
    }
}
