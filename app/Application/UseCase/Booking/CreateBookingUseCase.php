<?php

namespace App\Application\UseCase\Booking;

use App\Domain\Repositories\BookingRepositoryInterface;
use App\Domain\Repositories\PacketRepositoryInterface;
use App\Models\Booking\Booking;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Midtrans\Config;
use Midtrans\Snap;

class CreateBookingUseCase
{
    private BookingRepositoryInterface $bookingRepository;
    private PacketRepositoryInterface $packetRepository;

    public function __construct(
        BookingRepositoryInterface $bookingRepository,
        PacketRepositoryInterface $packetRepository
    ) {
        $this->bookingRepository = $bookingRepository;
        $this->packetRepository = $packetRepository;
    }

    public function execute(array $data): Booking
    {
        $packet = $this->packetRepository->findById($data['packet_id']);
        if (!$packet) {
            throw new InvalidArgumentException("Packet not found");
        }

        $totalPrice = $packet->price * $data['qty'];
        if ($this->isWeekend($data['date_booking'])) {
            $totalPrice += 50000;
        }

        $data['total_price'] = $totalPrice;
        $data['payment_status'] = 'pending';

        $booking = $this->bookingRepository->create($data);

        // Konfigurasi Midtrans
        Config::$serverKey = config('app.midtrans.serverKey');
        Config::$isProduction = config('app.midtrans.isProduction');
        Config::$isSanitized = config('app.midtrans.isSanitized');
        Config::$is3ds = config('app.midtrans.is3ds');

        // Buat transaksi dengan Midtrans
        $transactionDetails = [
            'transaction_details' => [
                'order_id' => $booking->id,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'user_id' => $booking->user_id,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($transactionDetails);
            $this->bookingRepository->updateSnapToken($booking->id, $snapToken);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            throw new \Exception('Gagal membuat transaksi pembayaran');
        }

        return $booking;
    }

    private function isWeekend(string $date): bool
    {
        return in_array(date('N', strtotime($date)), [6, 7]); // Sabtu & Minggu
    }
}
