<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repositories\BookingRepositoryInterface;
use App\Models\Booking\Booking;

class EloquentBookingRepository implements BookingRepositoryInterface
{
    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    public function findById(string $id): ?Booking
    {
        return Booking::find($id);
    }

    public function updatePaymentStatus(string $id, string $status): bool
    {
        return Booking::where('id', $id)->update(['payment_status' => $status]);
    }

    public function updateSnapToken(string $id, string $snapToken)
    {
        return Booking::where('id', $id)->update(['midtrans_order_id' => $snapToken]);
    }
}
