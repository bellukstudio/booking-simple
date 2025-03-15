<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('packet_id')->constrained('packets')->cascadeOnDelete();
            $table->integer('qty')->default(1);
            $table->date('date_booking');
            $table->integer('total_price');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('midtrans_order_id')->nullable();
            $table->text('payment_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
