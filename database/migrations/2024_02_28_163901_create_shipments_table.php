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
            $table->foreignUuid('organization_id');
            $table->foreignUuid('driver_id')->nullable();
            $table->foreignUuid('broker_id')->nullable();
            $table->longText('description')->nullable();
            $table->date('pickup_date')->nullable();
            $table->date('dropoff_date')->nullable();
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
