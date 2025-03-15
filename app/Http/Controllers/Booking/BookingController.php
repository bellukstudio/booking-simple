<?php

namespace App\Http\Controllers\Booking;

use App\Infrastructure\Repository\EloquentBookingRepository;
use App\Models\Booking\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController
{
    protected $bookingRepository;

    public function __construct(EloquentBookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function callback(Request $request)
    {
        $serverKey = config('app.midtrans.serverKey');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $booking = $this->bookingRepository->findById($request->order_id);
        if (!$booking) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if ($request->transaction_status == 'settlement') {
            $this->bookingRepository->updatePaymentStatus($request->order_id, 'paid');
        } elseif ($request->transaction_status == 'pending') {
            $this->bookingRepository->updatePaymentStatus($request->order_id, 'pending');
        } elseif ($request->transaction_status == 'expire') {
            $this->bookingRepository->updatePaymentStatus($request->order_id, 'expired');
        }

        return response()->json(['message' => 'Payment status updated']);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        // Pastikan hanya pemilik booking yang bisa mengakses
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        // Ambil snap token dari booking
        $snapToken = $booking->midtrans_order_id;

        return view('booking.payment', [
            'booking' => $booking,
            'snapToken' => $snapToken
        ]);
    }
}
