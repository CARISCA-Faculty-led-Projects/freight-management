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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('organisation_id');
            $table->foreignUuid('sender_id');
            $table->foreignUuid('driver_id');
            $table->string('load_id');
            $table->longText('description')->nullable();
            $table->string("amount");
            $table->string('payment_method');
            $table->date('pickup_date');
            $table->date('dropoff_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
