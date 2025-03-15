<?php

namespace App\Livewire\Booking;

use App\Application\UseCase\Booking\CreateBookingUseCase as BookingCreateBookingUseCase;
use App\Models\Packet\Packet;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;



class BookingForm extends Component
{
    #[Validate('required|exists:packets,id')]
    public $packet_id = '';

    #[Validate('required|integer|min:1')]
    public $qty = 1;

    #[Validate('required|date')]
    public $date_booking = '';



    public function submit(BookingCreateBookingUseCase $createBookingUseCase)
    {
        $this->validate();
        try {
            $booking = $createBookingUseCase->execute([
                'packet_id' => $this->packet_id,
                'qty' => $this->qty,
                'date_booking' => $this->date_booking,
                'user_id' =>  Auth::id(),
            ]);

            return redirect()->route('booking.payment', ['id' => $booking->id]);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.booking.bookingform', [
            'packets' => Packet::all(),
        ]);
    }
}
