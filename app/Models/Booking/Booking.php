<?php

namespace App\Models\Booking;

use App\Models\Packet\Packet;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasUuids;
    //


    protected $fillable = ['user_id', 'packet_id', 'qty', 'date_booking', 'total_price', 'payment_status', 'midtrans_order_id','payment_url'];

    public function packet()
    {
        return $this->belongsTo(Packet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
