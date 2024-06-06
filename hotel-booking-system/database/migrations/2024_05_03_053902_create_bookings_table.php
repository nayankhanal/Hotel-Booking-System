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
            $table->id();
            $table->foreignId('guest_id')
                    ->constrained()
                    ->casecadeOnDelete()
                    ->casecadeOnUpdate();
            $table->foreignId('payment_status_id')
                    ->constrained()
                    ->casecadeOnDelete()
                    ->casecadeOnUpdate();
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->integer('num_adults');
            $table->integer('num_children');
            $table->decimal('booking_amount')->unsigned();
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
