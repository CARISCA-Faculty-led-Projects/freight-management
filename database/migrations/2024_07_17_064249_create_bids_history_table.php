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
            $table->foreignId('bid_id')->constrained('bids','id')->onDelete('cascade');
            $table->string('offer_from');
            $table->string('user_id');
            $table->float('offer');
            $table->text('message')->nullable();
            $table->timestamp('created_at');
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
