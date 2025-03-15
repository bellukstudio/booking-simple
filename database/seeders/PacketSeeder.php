<?php

namespace Database\Seeders;

use App\Models\Packet\Packet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Packet::create(['name' => 'PlayStation 4', 'price' => 30000]);
        Packet::create(['name' => 'PlayStation 5', 'price' => 40000]);
    }
}
