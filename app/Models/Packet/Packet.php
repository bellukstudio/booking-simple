<?php

namespace App\Models\Packet;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasUuids;

    protected $fillable = ['name','price'];
    //
}
