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
        Schema::create('maintenance_schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('organisation_id');
            $table->string('vehicle_id');
            $table->string('status');
            $table->string('task');
            $table->date('date');
            $table->string('provider');
            $table->double('cost');
            $table->date('next_visit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_schedule');
    }
};
