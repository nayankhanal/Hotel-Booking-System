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
        Schema::create('room_class_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_class_id')
                    ->constrained()
                    ->casecadeOnDelete()
                    ->casecadeOnUpdate();
            $table->foreignId('feature_id')
                    ->constrained()
                    ->casecadeOnDelete()
                    ->casecadeOnUpdate(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_class_features');
    }
};
