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
        Schema::create('bids_history', function (Blueprint $table) {
            $table->id();
            $table->string('bid_id');
            $table->string('sender_id');
            $table->string('broker_id')->nullable();
            $table->string('sender_id');
            $table->string('offer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids_history');
    }
};
