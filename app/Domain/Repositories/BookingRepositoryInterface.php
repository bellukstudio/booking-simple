<?php

namespace App\Domain\Repositories;

use App\Models\Booking\Booking;

interface BookingRepositoryInterface
{
    public function create(array $data): Booking;
    public function findById(string $id): ?Booking;
    public function updatePaymentStatus(string $id, string $status): bool;
    public function updateSnapToken(string $id, string $snapToken);
}
