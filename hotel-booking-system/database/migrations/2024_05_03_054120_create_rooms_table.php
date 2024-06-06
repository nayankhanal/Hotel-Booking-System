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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('floor_id')
                    ->constrained()
                    ->casecadeOnDelete()
                    ->casecadeOnUpdate();
            $table->foreignId('room_class_id')
                    ->constrained()
                    ->casecadeOnDelete()
                    ->casecadeOnUpdate(); 
            $table->foreignId('room_status_id')
                    ->constrained()
                    ->casecadeOnDelete()
                    ->casecadeOnUpdate();
            $table->tinyInteger('room_number')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
